<?php

namespace App\Http\Controllers\Backend\Request\Form\Liquidation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Request\Form\Liquidation\LiquidationRepository;
use App\Http\Requests\Backend\Request\Form\Liquidation\ManageLiquidationRequest;
use App\Http\Requests\Backend\Request\Form\Liquidation\StoreLiquidationRequest;

class LiquidationController extends Controller
{
   /**
   * @var LiquidationRepository
   */
   protected $liquidations;

   /**
    * @param LiquidationRepository $liquidations
      */
   public function __construct(LiquidationRepository $liquidations)
   {
      $this->liquidations = $liquidations;
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('backend.request.form.liquidation.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(ManageLiquidationRequest $request)
   {
      return view('backend.request.form.liquidation.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StoreLiquidationRequest $request)
   {
      $this->liquidations->create(
         [
            'data' => $request->only(
               'project',
               'amount_provided',
               'prepared_by',
               'total_requested_item'
            ),
            'liquidationFormData' => $request->only(
               'amount',
               'purpose',
               'receipt'
            )
         ]
      );

      return redirect()->route('admin.request.form.liquidation.index')->withFlashSuccess(trans('alerts.backend.request.form.liquidation.created'));
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
