<?php

namespace App\Http\Controllers\Backend\Request\Form\Liquidation;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Request\Form\Liquidation\LiquidationRepository;
use App\Http\Requests\Backend\Request\Form\Liquidation\ManageLiquidationRequest;

/**
* Class LiquidationTableController.
*/
class LiquidationTableController extends Controller
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
   * @param ManageLiquidationRequest $request
   *
   * @return mixed
   */
   public function __invoke(ManageLiquidationRequest $request)
   {
      return Datatables::of($this->liquidations->getForDataTable($request->get('trashed')))
      ->escapeColumns(['project'])
      ->addColumn('actions', function ($model) {
         return $model->action_buttons;
      })
      ->withTrashed()
      ->make(true);
   }
}
