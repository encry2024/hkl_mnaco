<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquidationFormsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('liquidation_forms', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('liquidation_id')->unsigned();
         $table->decimal('amount', 15, 2);
         $table->string('purpose');
         $table->boolean('receipt');
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
      Schema::dropIfExists('liquidation_forms');
   }
}
