<?php

namespace App\Events\Backend\Management\Customer;

use Illuminate\Queue\SerializesModels;

/**
* Class AssetCreated.
*/
class CustomerCreated
{
   use SerializesModels;

   /**
   * @var
   */
   public $customer;

   /**
   * @param $customer
   */
   public function __construct($customer)
   {
      $this->customer = $customer;
   }
}
