<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Instructor;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
        // $instructor = Instructor::find(1);

        // $response = $this
        //     ->actingAs($instructor, 'instructor')
        //     ->get('instructor/dashboard');

        // $response
        //     ->assertStatus(200)
        //     ->assertSee('Max Power')
        //     ->assertSee('Fabio Catuogno')
        //     ->assertSee('Squat')
        //     ->assertSee('Forza')
        //     ->assertSee('Massa')
        //     ->assertSee('Stripping');
    }
}
