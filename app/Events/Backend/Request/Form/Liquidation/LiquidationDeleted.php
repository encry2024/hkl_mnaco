<?php

namespace App\Events\Backend\Request\Form\Liquidation;

use Illuminate\Queue\SerializesModels;

/**
* Class LiquidationDeleted.
*/
class LiquidationDeleted
{
   use SerializesModels;

   /**
   * @var
   */
   public $liquidation;

   /**
   * @param $liquidation
   */
   public function __construct($liquidation)
   {
      $this->liquidation = $liquidation;
   }
}
