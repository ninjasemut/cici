<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('bookings', function (Blueprint $table) {
      $table->id();
      $table->date("tanggal");
      $table->string("nama");
      $table->foreignId("ruangan_id")->constrained("ruangan")->onDelete("cascade");
      $table->time("jam_mulai");
      $table->time("jam_selesai");
      $table->string("agenda");
      $table->string("status")->default("dipesan")->nullable();
      $table->integer("jumlah");
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
    Schema::dropIfExists('bookings');
  }
};
