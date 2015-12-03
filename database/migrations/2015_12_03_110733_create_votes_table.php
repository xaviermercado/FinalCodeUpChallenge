<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('uservotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('LinkID');
			$table->integer('UserID');
			$table->integer('RatingValue');
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
        //
    }
}
