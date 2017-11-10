<?php

namespace App\Models\Management\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Management\Customer\Traits\Attribute\CustomerAttribute;

class Customer extends Model
{
    use CustomerAttribute, SoftDeletes;

   protected $table;

   //
   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('customer.customers_table');
   }
}
