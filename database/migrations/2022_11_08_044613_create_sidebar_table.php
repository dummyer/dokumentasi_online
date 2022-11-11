<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidebarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebars', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->boolean('is_parent')->default(true);
            $table->string('link_code')->nullable();
            $table->integer('parent_id')->nullable();
            $table->boolean('is_direct')->default(false);
            $table->boolean('is_scroll')->default(false);
            $table->boolean('is_show')->default(true);
            $table->integer('version_id')->unsigned()->nullable();
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
        Schema::dropIfExists('sidebars');
    }
}
