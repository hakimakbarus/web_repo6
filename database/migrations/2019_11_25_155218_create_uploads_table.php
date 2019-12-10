<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user')->nullable();
            $table->integer('id_cat')->nullable();
            $table->string('judul')->nullable();
            $table->string('file')->nullable();
            $table->string('pengarang')->nullable();
            $table->string('institusi')->nullable();
            $table->string('abstrak')->nullable();
            $table->integer('view_count')->nullable();
            $table->integer('download_count')->nullable();
            $table->integer('year')->nullable();
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
        Schema::dropIfExists('uploads');
    }
}
