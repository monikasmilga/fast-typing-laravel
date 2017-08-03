<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFtScoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ft_score', function(Blueprint $table)
		{
			$table->integer('count')->unique('count_UNIQUE');
			$table->string('id', 36)->primary();
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('level');
			$table->string('score');
			$table->string('duration')->nullable();
			$table->string('speed')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ft_score');
	}

}
