<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('catalog:set-featured-order')]
#[Description('Assign featured_position to match the exact "Nuestros productos destacados" order shown on the reference site box-modulares.es')]
class CatalogSetFeaturedOrder extends Command
{
    /**
     * Product names (Spanish), in the exact order they appear on box-modulares.es.
     *
     * @var array<int, string>
     */
    private const ORDERED_NAMES = [
        'Astilladora con remolque EuroCentauro Algeciras gasolina 13 HP',
        'Remolque para caballos Pferdeanhänger Böckmann Portax L SKA WCF',
        'Cobertizo para herramientas SkyLight Palram 1,85 x 3,05 m gris',
        'Astilladora de leña Zeppelin ESASTTR08Z 22 toneladas',
        'Portamáquina Gourdon CP35 340 x 165 cm 3500 kg PTAC',
        'Astilladora de leña EuroCentauro TPS35T 35 TN',
        'Minidumper a batería Zeppelin Rhinoceros XN500E 500 Kg',
        'Caseta de metal Cuarzo Europa 172x196x84 cm – 1,44 m²',
        'Casa Móvil Tarifa, 20 m²',
        'Bestway Piscina Rigida Adulto con Depurador 366×76 cm Jardin 56681',
        'Remolque van para caballo y medio de color azul',
        'Astilladora de leña Zeppelin ESASTTR07Z 20 Tn',
        'Generador eléctrico Gasolina Genergy Izoard-S 15000W',
        'Palet de leña de roble LEÑAS LEGUA de 225 kg',
        'Remolque portacoches de competición alta gama',
        'Bandeja multitransporte boro bop 737h 1300 kgs',
        'Techos para terrazas de aluminio Sierra Palram – Canopia 3 x 4,25 m gris',
        'Carretilla oruga eléctrica Geo Italy MD 500 ECO 660 W',
        'Chalet de la Selva Negra 2 habitaciones 2 nichos',
        'Generador eléctrico gasolina Kompak K10000TE-T 10 kVA',
        'Piscina desmontable de acero blanco redonda GRE Ø 4,6 x 1,2 m',
        'Conjunto marrón de technoratán con puffs Bari',
        'Techos para terrazas de aluminio Sierra Palram – Canopia 2,3 x 4,6 m gris',
        'Minidumper eléctrico Zeppelin ES71826 48V',
    ];

    public function handle(): int
    {
        $matched = 0;
        $unmatched = [];
        $matchedIds = [];

        foreach (self::ORDERED_NAMES as $position => $name) {
            $product = Product::query()->where('name->es', $name)->first();

            if (! $product) {
                $product = Product::query()->where('name->es', 'LIKE', "%{$name}%")->first();
            }

            if (! $product) {
                $unmatched[] = $name;

                continue;
            }

            $product->update(['featured_position' => $position + 1]);
            $matchedIds[] = $product->id;
            $matched++;
        }

        Product::query()
            ->whereNotIn('id', $matchedIds)
            ->update(['featured_position' => null]);

        $this->info("Matched {$matched}/".count(self::ORDERED_NAMES).' product(s).');

        foreach ($unmatched as $name) {
            $this->warn("No match found for: {$name}");
        }

        return self::SUCCESS;
    }
}
