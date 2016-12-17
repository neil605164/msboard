<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('secret');
            $table->rememberToken();
            $table->timestamps();

        });

        //當資料表欄位需增加時，可以使用這個方式
        //或者直接在create的函釋內增加
        //最後再執行php artisan migrate:refresh --seed
        //可以看這一個網址的還原遷移https://laravel.tw/docs/5.2/migrations#modifying-columns
        /*Schema::table('users', function($table){
            $table->string('secret');
        });*/
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
