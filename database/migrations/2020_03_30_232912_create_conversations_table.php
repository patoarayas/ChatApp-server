<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->bigIncrements('conv_id');

            $table->bigInteger("user_one_id");
            $table->bigInteger("user_two_id");
            $table->timestamps();

            // Relations
            $table->foreign("user_one_id")->references("id")->on("users");
            $table->foreign("user_two_id")->references("id")->on("users");
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
        Schema::dropIfExists('conversations');
    }
}
