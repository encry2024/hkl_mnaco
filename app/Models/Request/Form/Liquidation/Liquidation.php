<?php

namespace App\Models\Request\Form\Liquidation;

use Illuminate\Database\Eloquent\Model;
use App\Models\Request\Form\Liquidation\Traits\Attribute\LiquidationAttribute;
use App\Models\Request\Form\Liquidation\Traits\Relationship\LiquidationRelationship;
use App\Models\Request\Form\Liquidation\Traits\Scope\LiquidationScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liquidation extends Model
{
   use LiquidationAttribute,
   LiquidationRelationship,
   SoftDeletes;

   /**
   * The database table used by the model.
   *
   * @var string
   */
   protected $table;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['project', 'amount_given'];

   /**
    * @var array
    */
   protected $dates = ['deleted_at'];

   /**
    * @param array $attributes
    */
   public function __construct(array $attributes = [])
   {
      parent::__construct($attributes);
      $this->table = config('request.form.liquidations_table');
   }
}
