<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('title', 20)->nullable();
            $table->string('logo')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('address', 200);
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('behance')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('footer');
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
        Schema::dropIfExists('websites');
    }
}
