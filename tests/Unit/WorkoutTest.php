<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Athlete;
use App\Workout;

class WorkoutTest extends TestCase
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

    public function testAssignedWorkouts()
    {
        $this->assertEmpty(Workout::assignedWorkouts()->get());
        
        $workout = Workout::create([
            'name' => 'workout', 
            'athlete_id' => $this->athlete->id, 
            'start_date' => Carbon::now(), 
            'end_date' => Carbon::now()->addMonth(), 
            'type_id' => null
        ]);

        $this->assertEquals(count(Workout::assignedWorkouts()->get()), 1);
    }

    public function testPredefinedWorkouts()
    {
        $this->assertEmpty(Workout::predefinedWorkouts()->get());

        $workout = Workout::create([
            'name' => 'workout', 
            'athlete_id' => null, 
            'start_date' => Carbon::now(), 
            'end_date' => Carbon::now()->addMonth(), 
            'type_id' => null
        ]);

        $this->assertEquals(count(Workout::predefinedWorkouts()->get()), 1);
    }
}
