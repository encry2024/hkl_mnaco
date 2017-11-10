<?php

namespace App\Repositories\Backend\Management\Customer;

use App\Models\Management\Customer\Customer;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Management\Customer\CustomerCreated;
use App\Events\Backend\Management\Customer\CustomerDeleted;
use App\Events\Backend\Management\Customer\CustomerUpdated;
use App\Events\Backend\Management\Customer\CustomerRestored;
use App\Events\Backend\Management\Customer\CustomerPermanentlyDeleted;

/**
* Class CustomerRepository.
*/
class CustomerRepository extends BaseRepository
{
   /**
   * Associated Repository Model.
   */
   const MODEL = Customer::class;

   /**
   * @param        $permissions
   * @param string $by
   *
   * @return mixed
   */
   public function getForDataTable($trashed = false)
   {
      /**
      * Note: You must return deleted_at or the User getActionButtonsAttribute won't
      * be able to differentiate what buttons to show for each row.
      */
      $dataTableQuery = $this->query();

      if ($trashed == 'true') {
         return $dataTableQuery->onlyTrashed();
      }

      return $dataTableQuery;
   }

   public function create($input)
   {
      $data = $input['data'];

      $customer = $this->createCustomerStub($data);

      DB::transaction(function () use ($customer, $data) {
         if ($customer->save()) {
            event(new CustomerCreated($customer));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.customers.create_error'));
      });
   }

   public function update(Model $customer, array $input)
   {
      $data = $input['data'];

      $customer->company_name = $data['company_name'];
      $customer->contact_name = $data['contact_name'];
      $customer->contact_number = $data['contact_number'];
      $customer->alternative_number = $data['alternative_number'];
      $customer->address = $data['address'];
      $customer->email = $data['email'];
      $customer->notes = $data['notes'];

      DB::transaction(function () use ($customer, $data) {
         if ($customer->save()) {
            event(new CustomerUpdated($customer));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.customers.update_error'));
      });
   }

   protected function createCustomerStub($input)
   {
      $customer = self::MODEL;
      $customer = new $customer;
      $customer->company_name = $input['company_name'];
      $customer->contact_name = $input['contact_name'];
      $customer->contact_number = $input['contact_number'];
      $customer->alternative_number = $input['alternative_number'];
      $customer->email = $input['email'];
      $customer->notes = $input['notes'];

      return $customer;
   }

   public function delete(Model $customer)
   {
      if ($customer->delete()) {
         event(new CustomerDeleted($customer));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.customer.delete_error'));
   }

   public function forceDelete(Model $customer)
   {
      if (is_null($customer->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.customers.delete_first'));
      }

      DB::transaction(function () use ($customer) {
         if ($customer->forceDelete()) {
            event(new CustomerPermanentlyDeleted($customer));

            return true;
         }

         throw new GeneralException(trans('exceptions.backend.customers.delete_error'));
      });
   }

   public function restore(Model $customer)
   {
      if (is_null($customer->deleted_at)) {
         throw new GeneralException(trans('exceptions.backend.customers.cant_restore'));
      }

      if ($customer->restore()) {
         event(new CustomerRestored($customer));

         return true;
      }

      throw new GeneralException(trans('exceptions.backend.customers.restore_error'));
   }
}
