<?php

namespace App\Http\Requests\Backend\Request\Form\Liquidation;

use App\Http\Requests\Request;

/**
* Class StoreLiquidationRequest.
*/
class StoreLiquidationRequest extends Request
{
   /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
   public function authorize()
   {
      return access()->allow('view-backend');
   }

   /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
   public function rules()
   {
      return [
         'project'      => 'required|max:191',
         'amount_provided' => 'required',
         'amount'  => 'required',
         'purpose' => 'required',
         'receipt' => 'required'
      ];
   }
}
