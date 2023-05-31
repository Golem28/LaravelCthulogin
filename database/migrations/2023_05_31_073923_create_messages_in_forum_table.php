<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesInForumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_in_forum', function (Blueprint $table) {
            $table->unsignedInteger('message_id');
            $table->unsignedInteger('forum_id');

            $table->primary(['message_id', 'forum_id']);

            $table->foreign('forum_id')->references('id')->on('forums')->onDelete('cascade');
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages_in_forum');
    }
}
