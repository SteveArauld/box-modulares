<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_root_url_redirects_to_the_default_locale(): void
    {
        $response = $this->get('/');

        $response->assertRedirect();
        $this->get($response->headers->get('Location'))->assertOk();
    }
}
