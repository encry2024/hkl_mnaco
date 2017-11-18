<?php

return [

   /*
   |--------------------------------------------------------------------------
   | History Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines contain strings associated to the
   | system adding lines to the history table.
   |
   */

   'backend' => [
      'none'            => 'There is no recent history.',
      'none_for_type'   => 'There is no history for this type.',
      'none_for_entity' => 'There is no history for this :entity.',
      'recent_history'  => 'Recent History',

      'request' => [
         'form' => [
            'liquidation' => [
               'created' => 'created Liquidation Form',
               'deleted' => 'deleted Liquidation Form',
               'updated' => 'updated Liquidation Form',
               'restored' => 'restored Liquidation Form',
               'permanently_deleted' => 'permanently deleted Liquidation Form',
            ]
         ]
      ],

      'management'   => [
         'inventory' => [
            'customer' => [
               'created' => 'created customer',
               'deleted' => 'deleted customer',
               'updated' => 'updated customer',
               'restored' => 'restored customer',
               'permanently_deleted' => 'permanently deleted customer',
            ],
            'asset'  => [
               'created' => 'created asset',
               'deleted' => 'deleted asset',
               'updated' => 'updated asset',
               'restored'=> 'restored asset',
               'permanently_deleted' => 'permanently deleted asset'
            ],

            'category'  => [
               'created' => 'created category',
               'deleted' => 'deleted category',
               'updated' => 'updated category',
               'restored'=> 'restored category',
               'permanently_deleted' => 'permanently deleted category'
            ],
         ]
      ],

      'roles' => [
         'created' => 'created role',
         'deleted' => 'deleted role',
         'updated' => 'updated role',
      ],

      'users' => [
         'changed_password'    => 'changed password for user',
         'confirmed' => 'confirmed user',
         'created'             => 'created user',
         'deactivated'         => 'deactivated user',
         'deleted'             => 'deleted user',
         'deleted_social'      => 'deleted social account',
         'permanently_deleted' => 'permanently deleted user',
         'updated'             => 'updated user',
         'unconfirmed' => 'un-confirmed user',
         'reactivated'         => 'reactivated user',
         'restored'            => 'restored user',
      ],
   ],
];
