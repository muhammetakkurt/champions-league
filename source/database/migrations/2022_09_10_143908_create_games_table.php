<?php

use App\Enums\GameTypeEnum;
use App\Models\Fixture;
use App\Models\Team;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('home_goal');
            $table->integer('away_goal');
            $table->enum('status', GameTypeEnum::values())
                ->default(GameTypeEnum::DRAWN->name)
                ->index();
            $table->foreignIdFor(Team::class, 'home_team_id');
            $table->foreignIdFor(Team::class, 'away_team_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
