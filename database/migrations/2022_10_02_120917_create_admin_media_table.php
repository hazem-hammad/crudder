<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_media', function (Blueprint $table) {
            $table->id();
            $table->string('file')->nullable();
            $table->string('readable_file')->nullable();
            $table->unsignedInteger('size')->nullable();
            $table->string('collection_name')->nullable();
            $table->json('responsive_images')->nullable();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('CASCADE');
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
        Schema::dropIfExists('admin_media');
    }
}
