<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('athlete_id');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->integer('type_id');
            $table->timestamps();

            $table->foreign('athlete_id')
                ->references('id')
                ->on('athletes')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('type_id')
                ->references('id')
                ->on('membership_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
