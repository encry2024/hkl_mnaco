<?php
Route::group([ 
   'prefix' => 'form',
   'as' =>   'form.',
   'namespace' => 'Form'
], function() {

   Route::group([

      'namespace' => 'Purchase'

   ], function()  {
      Route::resource('purchase', 'FormController');
   });

});
