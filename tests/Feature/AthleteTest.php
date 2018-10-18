<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Athlete;
use App\Membership;
use App\MembershipType;

class AthleteTest extends TestCase
{
    use RefreshDatabase;

    protected $athlete;
    protected $membershipType;
    protected $membership;

    protected function setUp() {
        parent::setUp();

        $this->athlete = Athlete::create([
            'first_name' => 'Nuovo',
            'last_name' => 'Atleta',
            'birth_date' => Carbon::createFromFormat('d/m/Y', '12/12/1990'),
            'email' => 'email@email.com',
            'password' => Hash::make('password'),
            'gender' => 'M',
            'height' => '175',
            'notes' => 'staminchia',
            'instructor_id' => null
        ]);

        $this->membershipType = MembershipType::create([
            'name' => 'monthly',
            'validity' => 30,
            'price' => 35
        ]);

        $this->membership = Membership::create([
            'athlete_id' => $this->athlete->id,
            'type_id' => $this->membershipType->id,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays($this->membershipType->validity)
        ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDashboard()
    {
        $response = $this
            ->actingAs($this->athlete, 'athlete')
            ->get('/dashboard');

        $response
            ->assertStatus(200)
            ->assertSee('Nuovo Atleta')
            ->assertSee('MEMBERSHIP')
            ->assertSee('WORKOUT')
            ->assertSee('BODY MEASUREMENTS')
            ->assertViewHasAll([
                'athlete' => $this->athlete,
                'membership',
                'workout',
                'weightMeasurements'
            ]);
    }
}
