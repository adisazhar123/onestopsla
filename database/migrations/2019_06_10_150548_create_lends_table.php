<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id');
            $table->string("name", 255);
            $table->string("nip", 255);
            $table->text('description');
            $table->string('item_type', 255);
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->string('usage_type', 255);
            $table->integer("individuals_quantity")->nullable();
            $table->string('controlled_by', 255)->nullable();
            $table->string('driver', 255)->nullable();
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('lends');
    }
}
