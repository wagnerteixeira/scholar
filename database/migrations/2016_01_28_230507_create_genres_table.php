<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('genres', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('genre');
			//$table->timestamps();
		});

		if (env('APP_DEBUG') == true){
			$i = 0;
			for ($i=0; $i<1000; $i++){
				DB::table('genres')->insert(
			        array(
			        	'genre' => 'Genero '.$i,
			        )
			    );
		    }

		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('genres');
	}

}
