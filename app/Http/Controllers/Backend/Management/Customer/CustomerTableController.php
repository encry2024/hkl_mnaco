<?php

namespace App\Http\Controllers\Backend\Management\Customer;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Management\Customer\CustomerRepository;
use App\Http\Requests\Backend\Management\Customer\ManageCustomerRequest;

/**
* Class AssetTableController.
*/
class CustomerTableController extends Controller
{

   /**
   * @var CustomerRepository    
   */
   protected $customers;

   /**
   * @param CustomersRepository   $customers
   */
   public function __construct(CustomerRepository $customers)
   {
      $this->customers = $customers;
   }

   /**
   * @param ManageAssetRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageCustomerRequest $request)
   {
      return Datatables::of($this->customers->getForDataTable($request->get('trashed')))
      ->addColumn('actions', function ($model) {
         return $model->action_buttons;
      })
      ->withTrashed()
      ->make(true);
   }
}
