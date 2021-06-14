<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('category')->nullable();
            $table->string('specialization')->nullable();
            $table->string('emotions')->nullable();
            $table->integer('age')->nullable();
            $table->string('title', 60)->nullable();
            $table->longText('shortdescription', 150)->nullable();
            $table->longText('description')->nullable();
            $table->string('profileimg')->nullable();
            $table->string('urlsId')->nullable();
            $table->integer('colorId')->nullable();
            $table->string('imgColors')->nullable();
            $table->boolean('paid')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
