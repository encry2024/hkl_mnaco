<?php

namespace App\Models\Request\Form\Liquidation\Traits\Relationship;

/**
* Class LiquidationRelationship.
*/
trait LiquidationRelationship
{
   public function liquidation_forms()
   {
      return $this->belongsTo(config('request.form.liquidation_form'));
   }
}
