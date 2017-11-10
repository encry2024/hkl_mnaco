<?php

namespace App\Http\Requests\Backend\Management\Customer;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreCustomerRequest.
   */
class StoreCustomerRequest extends Request
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      return access()->hasPermission(['view-backend']);
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
      return [
         'company_name'       => 'required|max:191',
         'contact_number'     => ['required|min:11|max:12', Rule::unique('customers')],
         'contact_person'     => 'required|max:50',
         'alternative_number' => 'min:7|max:12',
         'email'              => ['required', 'email', 'max:191', Rule::unique('customers')],
         'address'            => 'required|max:191',
         'notes'              => 'max:100'
      ];
   }
}
