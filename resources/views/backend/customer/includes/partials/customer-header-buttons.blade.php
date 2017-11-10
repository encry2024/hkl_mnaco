<div class="pull-right mb-10 hidden-sm hidden-xs">
   {{ link_to_route('admin.management.customer.index', trans('menus.backend.management.inventory.customers.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
   {{ link_to_route('admin.management.customer.create', trans('menus.backend.management.inventory.customers.create'), [], ['class' => 'btn btn-success btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
   <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.management.inventory.customers.main') }} <span class="caret"></span>
      </button>

      <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.management.customer.index', trans('menus.backend.management.inventory.customers.all')) }}</li>
            <li>{{ link_to_route('admin.management.customer.create', trans('menus.backend.management.inventory.customers.create')) }}</li>
      </ul>
   </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>