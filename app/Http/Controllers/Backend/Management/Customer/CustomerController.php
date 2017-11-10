<?php

namespace App\Http\Controllers\Backend\Management\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\Customer\Customer;
use App\Repositories\Backend\Management\Customer\CustomerRepository;
use App\Http\Requests\Backend\Management\Customer\ManageCustomerRequest;
use App\Http\Requests\Backend\Management\Customer\StoreCustomerRequest;

class CustomerController extends Controller
{

   protected $customers;

   public function __construct(CustomerRepository $customers)
   {
      $this->customers = $customers;
   }
   /**
    * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(ManageCustomerRequest $request)
   {
      return view('backend.customer.index');
   }

   /**
    * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('backend.customer.create');
   }

   /**
    * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreCustomerRequest $request)
   {
      $this->customers->create(
      [
         'data' => $request->only(
            'company_name',
            'contact_person',
            'contact_number',
            'alternative_number',
            'address',
            'notes',
            'email'
         ),
      ]);

      return redirect()->route('admin.management.customer.index')->withFlashSuccess(trans('alerts.backend.management.customer.created'));
   }

   /**
    * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      //
   }
}