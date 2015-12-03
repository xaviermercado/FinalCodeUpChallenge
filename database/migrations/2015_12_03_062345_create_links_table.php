<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('userlinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('LinkURL');
            $table->string('Description');
			$table->integer('UserID');
			$table->integer('Rating');
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
