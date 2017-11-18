<?php

Route::group([
   'prefix'    => 'request/form',
   'as'        => 'request.form.',
   'namespace' => 'Request\Form'
], function() {

   Route::group([
      'namespace' => 'Liquidation'
   ], function() {

      Route::post('liquidation/get', 'LiquidationTableController')->name('liquidation.get');

      Route::resource('liquidation', 'LiquidationController');

   });

});
