<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
       $table->string('locale')->index();

       // Foreign key to the main model
       $table->unique(['categories_id', 'locale']);
       $table->foreignid('categories_id')->constrained()->onDelete('cascade');

       // Actual fields you want to translate
       $table->string('name');
       $table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_translations');
    }
}
