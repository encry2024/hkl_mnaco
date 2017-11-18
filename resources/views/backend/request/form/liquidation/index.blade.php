@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.request.form.liquidation.title'))

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
   {{ trans('labels.backend.request.form.liquidation.title') }}
   <small>{{ trans('labels.backend.request.form.liquidation.list') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
   <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.backend.request.form.liquidation.list') }}</h3>

      <div class="box-tools pull-right">
         @include('backend.request.form.liquidation.includes.partials.liquidation-header-buttons')
      </div><!--box-tools pull-right-->
   </div><!-- /.box-header -->

   <div class="box-body">
      <div class="table-responsive">
         <table id="assets-table" class="table table-condensed table-hover">
            <thead>
               <tr>
                  <th>{{ trans('labels.backend.request.form.liquidation.table.id') }}</th>
                  <th>{{ trans('labels.backend.request.form.liquidation.table.project') }}</th>
                  <th>{{ trans('labels.backend.request.form.liquidation.table.prepared_by') }}</th>
                  <th>{{ trans('labels.backend.request.form.liquidation.table.approved_by') }}</th>
                  <th>{{ trans('labels.backend.request.form.liquidation.table.created_at') }}</th>
                  <th>{{ trans('labels.backend.request.form.liquidation.table.updated_at') }}</th>
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
      {!! history()->renderType('Liquidation') !!}
   </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
{{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

<script>
$(function () {
   $('#assets-table').DataTable({
      dom: 'lfrtip',
      processing: false,
      serverSide: true,
      autoWidth: false,
      ajax: {
         url: '{{ route("admin.request.form.liquidation.get") }}',
         type: 'post',
         data: {status: 1, trashed: false, category_type: 0},
         error: function (xhr, err) {
            if (err === 'parsererror')
            location.reload();
         }
      },
      columns: [
         {data: 'id',          name: '{{config('request.form.liquidations_table')}}.id'},
         {data: 'project',     name: '{{config('request.form.liquidations_table')}}.project'},
         {data: 'prepared_by', name: '{{config('request.form.liquidations_table')}}.prepared_by'},
         {data: 'approved_by', name: '{{config('request.form.liquidations_table')}}.approved_by'},
         {data: 'created_at',  name: '{{config('request.form.liquidations_table')}}.created_at'},
         {data: 'updated_at',  name: '{{config('request.form.liquidations_table')}}.updated_at'},
         {data: 'actions',     name: 'actions', searchable: false, sortable: false}
      ],
      order: [[0, "asc"]],
      searchDelay: 500
   });
});
</script>
@endsection
