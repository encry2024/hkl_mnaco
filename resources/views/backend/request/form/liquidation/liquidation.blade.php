@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.management.inventory.asset.title') . ' | ' . trans('labels.backend.management.inventory.asset.view'))

@section('page-header')
<h1>
   {{ trans('labels.backend.management.inventory.asset.title') }}
   <small>{{ trans('labels.backend.management.inventory.asset.view') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.management.inventory.asset.view') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.management.inventory.asset.includes.partials.asset-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="panel-body">
         <div class="col-lg-3">
            <img src="/img/Logos/logo.png" alt="ealogo" height="75" width="125">
         </div>
         <div class="col-lg-9">
            <h2>EXCELASIA BUSINESS SOLUTIONS</h2>
               <label style=" margin-left: -3rem;">Unit 5 2nd Floor 463 MRP Building Barangka Drive, Plainview Mandaluyong City
               </label>
               <br><label class="col-lg-offset-2">www.excelasiasolutions.com</label>
         </div>

         <div class="row">
            <div class="col-lg-9">
               <h3 style="margin-left: 37rem">LIQUIDATION FORM</h3>
            </div>
            <div class="col-lg-3" style="border-style: groove">
               <label></font colord="red">NO.:</font></label>
               <label><font color="red"></font></label>
            </div>
         </div>

         <div class="row">
            <div class="col-lg-6"><label>Project: </label></div>
            <div class="col-lg-6"><label>Date: </label></div>
         </div>
         <div class="row">
            <div class="col-lg-6"><label>Amount: </label></div>
      </div>
      <br><br>
      <table class="table">
         <thead>
            <th>ITEM</th>
            <th>PURPOSE</th>
            <th>DURATION</th>
         </thead>
         <tbody>
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
         </tbody>
         <tfoot>
            <tr>
               <td><label>TOTAL AMOUNT DUE</label></td>
               <td></td>
            </tr>
         </tfoot>
      </table>

      <div class="row" style="border-style: groove">
         <div class="col-lg-12"><label>Prepared By: </label></div>
      </div>

      <div class="row" style="border-style: groove">
         <div class="col-lg-12"><label>Apprvoed By: </label></div>
      </div>

      <div class="row" style="border-style: groove">
      <div class="col-lg-12"><label><i>"NO RECEIPT PROVIDED SHALL BE FOR THE ACCOUNT OF THE EMPLOYEE"</i></label></div>



   </div><!-- /.box-body -->
</div><!--box-->
@endsection
