<?php

namespace App\Models\Request\Form\Liquidation\Traits\Attribute;

/**
* Class LiquidationAttribute.
*/
trait LiquidationAttribute
{
   /**
   * @return string
   */
   public function getShowButtonAttribute()
   {
      return '<a href="'.route('admin.request.form.liquidation.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getEditButtonAttribute()
   {
      return '<a href="'.route('admin.request.form.liquidation.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getDeleteButtonAttribute()
   {
      return '<a href="'.route('admin.request.form.liquidation.destroy', $this).'"
      data-method="delete"
      data-trans-button-cancel="'.trans('buttons.general.cancel').'"
      data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
      data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
      class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getRestoreButtonAttribute()
   {
      return '<a href="'.route('admin.request.form.liquidation.restore', $this).'" name="restore_asset" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.management.inventory.asset.restore_asset').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getDeletePermanentlyButtonAttribute()
   {
      return '<a href="'.route('admin.request.form.liquidation.delete-permanently', $this).'" name="delete_asset_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.management.inventory.asset.delete_permanently').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getActionButtonsAttribute()
   {
      if ($this->trashed()) {
         return $this->restore_button.$this->delete_permanently_button;
      }

      return
      $this->show_button.
      $this->edit_button.
      $this->delete_button;
   }
}
