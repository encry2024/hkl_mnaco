<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquidationsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('liquidations', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('approved_by');
         $table->integer('prepared_by');
         $table->string('project');
         $table->decimal('amount_given', 15, 2);
         $table->timestamps();
         $table->softDeletes();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('liquidations');
   }
}
