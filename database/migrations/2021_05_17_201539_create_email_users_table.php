<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * CREATE TABLE IF NOT EXISTS email_users (
     *  id int auto_increment,
     *  email varchar(255) not null,
     *  opt_in tinyint(1) not null,
     *  first_name varchar(255) not null,
     *  last_name varchar(255) not null,
     *  PRIMARY_KEY (id)
     *)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->boolean('opt_in');
            $table->string('first_name');
            $table->string('last_name');
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
        Schema::dropIfExists('email_users');
    }
}
