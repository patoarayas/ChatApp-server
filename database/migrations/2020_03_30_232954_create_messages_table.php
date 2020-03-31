<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {

            $table->bigIncrements('message_id');
            $table->bigInteger("conv_id");
            $table->bigInteger("user_id");
            $table->string("content");

            // Localization
            $table->string("loc_latitude");
            $table->string("loc_longitude");
            $table->string("loc_error");

            $table->timestamps();

            // Relations
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("conv_id")->references("conv_id")->on("conversations");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
