<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserUploadsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_uploads', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->string('file_name');
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
        Schema::drop('user_uploads');
    }

}
