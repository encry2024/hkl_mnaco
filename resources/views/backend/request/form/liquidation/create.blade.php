@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.request.form.liquidation.title') . ' | ' . trans('labels.backend.request.form.liquidation.view'))

@section('page-header')
<h1>
   {{ trans('labels.backend.request.form.liquidation.title') }}
   <small>{{ trans('labels.backend.request.form.liquidation.create') }}</small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.request.form.liquidation.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.request.form.liquidation.create') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.request.form.liquidation.includes.partials.liquidation-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="form-group">
         {{ Form::label('project', trans('validation.attributes.backend.request.form.liquidation.project'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('project', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.request.form.liquidation.project')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('amount_provided', trans('validation.attributes.backend.request.form.liquidation.amount_provided'),
         ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('amount_provided', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.request.form.liquidation.amount_provided')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('date', trans('validation.attributes.backend.request.form.liquidation.date'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('date', date('F d, Y'), ['class' => 'form-control', 'maxlength' => '191', 'disabled' => 'disabled', 'placeholder' => trans('validation.attributes.backend.request.form.liquidation.date')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <div class="form-group">
         {{ Form::label('prepared_by', trans('validation.attributes.backend.request.form.liquidation.prepared_by'), ['class' => 'col-lg-2 control-label']) }}

         <div class="col-lg-10">
            {{ Form::text('prepared_by', $logged_in_user->full_name, ['class' => 'form-control', 'maxlength' => '191', 'readonly' => 'readonly', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.request.form.liquidation.prepared_by')]) }}
         </div><!--col-lg-10-->
      </div><!--form control-->

      <br>

      <div class="table-responsive">
         <div class="form-inline">
            <div class="form-group">
               {{ Form::label('total_requested_item', 'Total of Requested Item:', ['class' => 'control-label', 'style' => 'margin-left: 2rem; font-size: 12px;', 'autocomplete' => 'off']) }}
               {{ Form::text('total_requested_item', 1, ['class' => 'form-control input-sm', 'style' => 'margin-bottom: -1rem; margin-left: 0.5rem;', 'maxlength' => '191', 'readonly' => 'readonly', 'autofocus' => 'autofocus', 'placeholder' => 'Total of Requested Item']) }}
            </div><!--form control-->
            <a class="btn btn-success btn-sm pull-right" id="add_request_button">Add Request</a>
         </div>
         <br>
         <table id="assets-table" class="table table-condensed table-striped">
            <thead>
               <tr>
                  <th class="col-lg-3" style="text-align: center;">{{ trans('labels.backend.request.form.liquidation.form.table.amount') }}</th>
                  <th class="col-lg-3" style="text-align: center;">{{ trans('labels.backend.request.form.liquidation.form.table.purpose') }}</th>
                  <th class="col-lg-3" style="text-align: center;">{{ trans('labels.backend.request.form.liquidation.form.table.receipt') }}</th>
                  <th class="col-lg-1" style="text-align: center;">Action</th>
               </tr>
            </thead>

            <tbody id="request-field">
               <tr id="request-container">
                  <td class=" text-center">
                     <input type="text" id="amount_field" class="form-control" name="amount[]">
                  </td>
                  <td class=" text-center">
                     <input type="text" id="purpose_field" class="form-control" name="purpose[]">
                  </td>
                  <td class=" text-center">
                     <select id="receipt_field" class="form-control" name="receipt[]">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                     </select>
                  </td>
                  <td class=" text-center">
                     <a class="btn btn-danger btn-sm" id="remove_request_button"><i class="fa fa-remove"></i></a>
                  </td>
               </tr>
            </tbody>
         </table>
      </div><!--table-responsive-->
   </div><!--box-->

   <div class="box box-info">
      <div class="box-body">
         <div class="pull-left">
            {{ link_to_route('admin.request.form.liquidation.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
         </div><!--pull-left-->

         <div class="pull-right">
            {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
         </div><!--pull-right-->

      <div class="clearfix"></div>
   </div><!-- /.box-body -->
</div><!--box-->

{{ Form::close() }}
@endsection

@section('after-scripts')
   {{ Html::script('js/backend/request/form/liquidation/scripts.js') }}
@endsection