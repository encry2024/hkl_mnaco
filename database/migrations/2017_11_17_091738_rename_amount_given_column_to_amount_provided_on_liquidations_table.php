<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAmountGivenColumnToAmountProvidedOnLiquidationsTable extends Migration
{
   /**
      * Run the migrations.
      *
      * @return void
      */
   public function up()
   {
      Schema::table('liquidations', function (Blueprint $table) {
         $table->renameColumn('amount_given', 'amount_provided');
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
         $table->renameColumn('amount_provided', 'amount_given');
      });
   }
}
