<?php

use App\Models\Request\Form\Liquidation\Liquidation;
use App\Models\Request\Form\Liquidation\LiquidationForm;

return [
   'form' => [

      /**
       * Liquidation Model
       *
       * Points to Liquidation table
       */
      'liquidation'        => Liquidation::class,
      'liquidations_table' => 'liquidations',

      /**
       * Liquidation Form Model
       *
       * Points to Liquidation Form table
       * Used for Liquidation Model Relationship
       */
      'liquidation_form'   => LiquidationForm::class,
      'liquidation_forms_table'  => 'liquidation_forms'
   ]
];