<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Athlete;
use App\Workout;
use App\Membership;
use App\MembershipType;

class AthleteTest extends TestCase
{

    use RefreshDatabase;

    protected $athlete;

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
    }
    
    public function testActiveMembership()
    {

        $this->assertNull($this->athlete->activeMembership());

        $membershipType = MembershipType::create([
            'name' => 'monthly',
            'validity' => 30,
            'price' => 35
        ]);

        $membership = Membership::create([
            'athlete_id' => $this->athlete->id,
            'type_id' => $membershipType->id,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays($membershipType->validity)
        ]);

        $this->assertEquals($membership->id, $this->athlete->activeMembership()->id);

        $newMembership = Membership::create([
            'athlete_id' => $this->athlete->id,
            'type_id' => $membershipType->id,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays($membershipType->validity)
        ]);

        $this->assertEquals($newMembership->id, $this->athlete->activeMembership()->id);
    }

    public function testActiveWorkout() {
        $this->assertNull($this->athlete->currentWorkout());

        $workout = Workout::create([
            'name' => 'workout', 
            'athlete_id' => $this->athlete->id, 
            'start_date' => Carbon::now(), 
            'end_date' => Carbon::now()->addMonth(), 
            'type_id' => null
        ]);

        $this->assertEquals($workout->id, $this->athlete->currentWorkout()->id);

        $newWorkout = Workout::create([
            'name' => 'nuovo', 
            'athlete_id' => $this->athlete->id, 
            'start_date' => Carbon::now(), 
            'end_date' => Carbon::now()->addMonth(), 
            'type_id' => null
        ]);

        $this->assertEquals($newWorkout->id, $this->athlete->currentWorkout()->id);
    }
}
