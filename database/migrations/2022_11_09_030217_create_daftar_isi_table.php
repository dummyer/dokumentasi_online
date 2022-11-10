<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarIsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_isi', function (Blueprint $table) {
            $table->id();
            $table->integer('sidebar_id')->unsigned();
            $table->foreign('sidebar_id')->references('id')->on('sidebars');
            $table->string('title')->unique();
            $table->boolean('is_parent')->default(true);
            $table->integer('parent_id')->nullable();
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('daftar_isi');
    }
}
