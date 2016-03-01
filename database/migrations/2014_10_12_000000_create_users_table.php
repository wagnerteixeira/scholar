<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->boolean('admin');
			$table->rememberToken();
			$table->timestamps();
		});

		if (env('APP_DEBUG') == true){
		// Insert some stuff
		    DB::table('users')->insert(
		        array(
		        	'name' => 'Wagner Teixeira',
		            'email' => 'wagnerbernardesteixeira@gmail.com',
		            'password' => \Hash::make("1"),
		            'admin' => true,
		        )
		    );
		    // Insert some stuff
		    DB::table('users')->insert(
		        array(
		        	'name' => 'Sanye Caroline',
		            'email' => 'sanyecaroline@gmail.com',
		            'password' => \Hash::make("1"),
		            'admin' => true,
		        )
		    );

		    // Insert some stuff
		    DB::table('users')->insert(
		        array(
		        	'name' => 'Tulio Gaudencio',
		            'email' => 'tgresende@gmail.com',
		            'password' => \Hash::make("1"),
		            'admin' => true,
		        )
		    );
		}
		else
		{
			DB::table('users')->insert(
		        array(
		        	'name' => 'Administrador',
		            'email' => 'admin@admin.com',
		            'password' => \Hash::make("Senha123"),
		            'admin' => true,
		        )
		    );
		}

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
