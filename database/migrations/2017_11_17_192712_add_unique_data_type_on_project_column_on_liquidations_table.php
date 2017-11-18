<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueDataTypeOnProjectColumnOnLiquidationsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('liquidations', function (Blueprint $table) {
         $table->string('project')->unique()->change();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('liquidations', function (Blueprint $table) {
         $table->string('project')->change();
      });
   }
}
