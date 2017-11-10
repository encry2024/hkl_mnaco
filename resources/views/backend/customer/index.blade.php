@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.management.inventory.customer.title'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.management.inventory.customer.title') }}
   <small>{{ trans('labels.backend.management.inventory.customer.availables') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.management.inventory.customer.availables') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.customer.includes.partials.customer-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="customers-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.management.inventory.customer.table.id') }}</th>
                  <th>{{ trans('labels.backend.management.inventory.customer.table.company_name') }}</th>
                  <th>{{ trans('labels.backend.management.inventory.customer.table.contact_number') }}</th>
                  <th>{{ trans('labels.backend.management.inventory.customer.table.contact_person') }}</th>
                  <th>{{ trans('labels.backend.management.inventory.customer.table.created_at') }}</th>
                  <th>{{ trans('labels.backend.management.inventory.customer.table.updated_at') }}</th>
                  <th>{{ trans('labels.general.actions') }}</th>
               </tr>
            </thead>
         </table>
      </div><!--table-responsive-->
   </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-info">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
      <div class="box-tools pull-right">
         <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box tools -->
   </div><!-- /.box-header -->
   <div class="box-body">
      {!! history()->renderType('Customer') !!}
   </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
{{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

<script>
$(function () {
   $('#customers-table').DataTable({
      dom: 'lfrtip',
      processing: true,
      serverSide: true,
      autoWidth: false,
      ajax: {
         url: '{{ route("admin.management.customer.get") }}',
         type: 'post',
         data: {trashed: false}
      },
      columns: [
         {data: 'id',               name: '{{config('customer.customers_table')}}.id'},
         {data: 'company_name',     name: '{{config('customer.customers_table')}}.company_name'},
         {data: 'contact_person',   name: '{{config('customer.customers_table')}}.contact_person'},
         {data: 'contact_number',   name: '{{config('customer.customers_table')}}.contact_number'},
         {data: 'created_at',       name: '{{config('customer.customers_table')}}.created_at'},
         {data: 'updated_at',       name: '{{config('customer.customers_table')}}.updated_at'},
         {data: 'actions',          name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });
});
</script>
@endsection