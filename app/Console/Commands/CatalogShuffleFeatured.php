<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('catalog:shuffle-featured')]
#[Description('Assign a one-time random featured_position to every product, so the homepage "Nuestros productos destacados" grid shows a fixed cross-category mix instead of alphabetical order, without re-shuffling on every page load')]
class CatalogShuffleFeatured extends Command
{
    public function handle(): int
    {
        $ids = Product::query()->pluck('id')->shuffle();

        $bar = $this->output->createProgressBar($ids->count());
        $bar->start();

        foreach ($ids->values() as $position => $id) {
            Product::query()->where('id', $id)->update(['featured_position' => $position + 1]);
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("Shuffled featured_position for {$ids->count()} product(s).");

        return self::SUCCESS;
    }
}
