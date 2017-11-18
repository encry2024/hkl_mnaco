<?php

namespace App\Repositories\Backend\Request\Form\Liquidation;

use App\Models\Request\Form\Liquidation\Liquidation;
use App\Models\Request\Form\Liquidation\LiquidationForm;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Request\Form\Liquidation\LiquidationCreated;
use App\Events\Backend\Request\Form\Liquidation\LiquidationDeleted;
use App\Events\Backend\Request\Form\Liquidation\LiquidationUpdated;
use App\Events\Backend\Request\Form\Liquidation\LiquidationRestored;
use App\Events\Backend\Request\Form\Liquidation\LiquidationPermanentlyDeleted;
use Auth;

/**
* Class LiquidationRepository.
*/
class LiquidationRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Liquidation::class;

   /**
   * @param int  $status
   * @param bool $trashed
   *
   * @return mixed
   */
   public function getForDataTable($status = 1, $trashed = false, $category_type = 0)
   {
      /**
      * Note: You must return deleted_at or the Liquidation getActionButtonsAttribute won't
      * be able to differentiate what buttons to show for each row.
      */
      $dataTableQuery = $this->query();

      if ($trashed == 'true') {
         return $dataTableQuery->onlyTrashed();
      }

      return $dataTableQuery;
   }

   /**
   * @param array $input
   */
   public function create($input)
   {
      $data = $input['data'];
      $liquidation_form_data = $input['liquidationFormData'];
      $dataIncrementor = 0;

      $liquidation = $this->createLiquidationStub($data);

      DB::transaction(function () use ($liquidation, $data, $liquidation_form_data, $dataIncrementor) {

         if($liquidation->save()) {
            while($dataIncrementor != $data['total_requested_item']) {
               // $testArr[] = [
               //    'liquidation_id'  => $liquidation->id,
               //    'amount'          => $liquidation_form_data['amount'][$dataIncrementor],
               //    'purpose'         => $liquidation_form_data['purpose'][$dataIncrementor],
               //    'receipt'         => $liquidation_form_data['receipt'][$dataIncrementor],
               //    'created_at'      => date('Y-m-d h:i:s'),
               //    'updated_at'      => date('Y-m-d h:i:s'),
               // ];
               // $dataIncrementor++;

               LiquidationForm::insert([
                  'liquidation_id'  => $liquidation->id,
                  'amount'          => $liquidation_form_data['amount'][$dataIncrementor],
                  'purpose'         => $liquidation_form_data['purpose'][$dataIncrementor],
                  'receipt'         => $liquidation_form_data['receipt'][$dataIncrementor],
                  'created_at'      => date('Y-m-d h:i:s'),
                  'updated_at'      => date('Y-m-d h:i:s')
               ]);

               $dataIncrementor++;
            }

            // dd($testArr);

            event(new LiquidationCreated($liquidation));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.request.form.liquidation.create_error'));
      });
   }

   /**
   * @param Model $liquidation
   * @param array $input
   *
   * @return bool
   * @throws GeneralException
   */
   public function update(Model $liquidation, array $input)
   {
      $data = $input['data'];

      $liquidation->project            = $data['project'];
      $liquidation->amount_provided    = $data['amount_provided'];

      DB::transaction(function () use ($liquidation, $data) {
         if ($liquidation->save()) {
            event(new LiquidationUpdated($liquidation));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.request.form.liquidation.update_error'));
      });
   }

   /**
   * @param Model $liquidation
   *
   * @throws GeneralException
   *
   * @return bool
   */
   public function delete(Model $liquidation)
   {
      $liquidation->update(['status' => 2]);

      if ($liquidation->delete()) {
         // Change status to 2 (Deleted Liquidation)
         event(new LiquidationDeleted($liquidation));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.request.form.liquidation.delete_error'));
   }

   /**
   * @param Model $liquidation
   *
   * @throws GeneralException
   */
   public function forceDelete(Model $liquidation)
   {
      if (is_null($liquidation->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.request.form.liquidation.delete_first'));
      }

      DB::transaction(function () use ($liquidation) {
         if ($liquidation->forceDelete()) {
            event(new LiquidationPermanentlyDeleted($liquidation));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.request.form.liquidation.delete_error'));
      });
   }

   /**
   * @param Model $liquidation
   *
   * @throws GeneralException
   *
   * @return bool
   */
   public function restore(Model $liquidation)
   {
      if (is_null($liquidation->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.request.form.liquidation.cant_restore'));
      }

      $liquidation->update(['status' => 1]);
      if ($liquidation->restore()) {
         // Change deleted asset status to 1 (Ready to Deploy)
         event(new LiquidationRestored($liquidation));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.request.form.liquidation.restore_error'));
   }

   /**
   * @param  $input
   *
   * @return mixed
   */
   protected function createLiquidationStub($input)
   {
      $liquidation                  = self::MODEL;
      $liquidation                  = new $liquidation;
      $liquidation->project         = $input['project'];
      $liquidation->amount_provided = $input['amount_provided'];
      $liquidation->prepared_by     = Auth::user()->id;
      $liquidation->approved_by     = 0;

      return $liquidation;
   }
}
