<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('file_path')->nullable();
            $table->string('title')->nullable();
            $table->text('intro')->nullable();
            $table->text('description')->nullable();
            $table->integer('num_of_pages')->nullable();
            $table->string('pub_date')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('ISBN13')->nullable();
            $table->text('other_authors')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('author_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('books');
    }
}
