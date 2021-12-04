<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPageTextTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_page_text_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();
     
            // Foreign key to the main model
            
            $table->foreignid('contact_page_text_id')->constrained()->onDelete('cascade');
     
            // Actual fields you want to translate
            $table->string('title');
            $table->longText('text');
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_page_text_translations');
    }
}
