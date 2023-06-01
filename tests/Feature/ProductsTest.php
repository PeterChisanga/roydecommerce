<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    
    use RefreshDatabase;

    public function homepage_contains_empty_table(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);

        // $response_assertSee(__(key:"No products found"));
    }

    public function homepage_contains_non_empty_table(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);

        // $response_assertSee(__(key:"No products found"));
    }
}
