<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('team');
            $table->timestamps();
        });
        DB::table('teams')->insert([
            ['team' => 'Arsenal F.C'], 
          ['team' => 'Aston Villa'], 
          ['team' => 'AFC Bournemouth'],
          ['team' => 'Brighton & Hove Albion'],
          ['team' => 'Burnley'], 
          ['team' => 'Chelsea F.C'], 
          ['team' => 'Crystal Palace'],
          ['team' => 'Everton'],
          ['team' => 'Leicester City'],
          ['team' => 'Liverpool F.C'],
          ['team' => 'Manchester City'],
          ['team' => 'Manchester United'],
          ['team' => 'Newcastle United'],
          ['team' => 'Norwich City'],
          ['team' => 'Sheffield United'],
          ['team' => 'Southampton'],
          ['team' => 'Tottenham Hotspur'],
          ['team' => 'Watford'],
          ['team' => 'West Ham United'], 
          ['team' => 'Wolverhampton Wanderer']           
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
