<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaints', function(Blueprint $table) {
           $table->foreign('users_id')->references('id')
               ->on('users');
        });

        Schema::table('vidcons', function(Blueprint $table) {
            $table->foreign('users_id')->references('id')
                ->on('users');
        });

        Schema::table('lends', function(Blueprint $table) {
            $table->foreign('users_id')->references('id')
                ->on('users');
        });

        Schema::table('lends_items', function(Blueprint $table) {
            $table->foreign('lends_id')->references('id')
                ->on('lends');
            $table->foreign('items_id')->references('id')
                ->on('items');
        });

        Schema::table('accessories', function(Blueprint $table) {
            $table->foreign('items_id')->references('id')
                ->on('items');
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
