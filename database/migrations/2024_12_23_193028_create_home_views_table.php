<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_views', function (Blueprint $table) {
            $table->id();

            $table->string('title1section')->nullable();
            $table->text('description1section')->nullable();
            $table->string('url_image1section')->nullable();

            $table->string('title2section')->nullable();
            $table->text('description2section')->nullable();
            $table->string('url_image2section')->nullable();

            $table->string('title3section')->nullable();
            $table->text('description3section')->nullable();
            $table->string('url_image3section')->nullable();

            $table->string('title4section')->nullable();
            $table->text('description4section')->nullable();
            $table->string('url_image4section')->nullable();

            $table->string('title5section')->nullable();
            $table->text('description5section')->nullable();
            $table->string('url_image5section')->nullable();

            $table->string('title6section')->nullable();
            $table->text('description6section')->nullable();
            $table->string('url_image6section')->nullable();

            $table->string('title7section')->nullable();
            $table->text('description7section')->nullable();
            $table->string('url_image7section')->nullable();

            $table->string('title8section')->nullable();
            $table->text('one_description8section')->nullable();
            $table->text('two_description8section')->nullable();
            $table->string('url_image8section')->nullable();

            $table->string('subtitle9section')->nullable();
            $table->string('title9section')->nullable();
            $table->text('one_description9section')->nullable();
            $table->text('two_description9section')->nullable();

            $table->string('title10section')->nullable();
            $table->text('description10section')->nullable();
            $table->string('url_image10section')->nullable();

            $table->string('title11section')->nullable();
            $table->text('description11section')->nullable();
            $table->string('url_image11section')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_views');
    }
};
