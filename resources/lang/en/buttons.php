<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Buttons Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines are used in buttons throughout the system.
   | Regardless where it is placed, a button can be listed here so it is easily
   | found in a intuitive way.
   |
   */

   'backend' => [
      'request' => [
         'form' => [
            'liquidation' => [
               'restore_liquidation' => 'Restore Liquidation Form Request',
               'delete_permanently' => 'Delete Liquidation Form Request permanently'
            ]
         ]
      ],

      'management' => [
         'inventory'  => [
            'customer' => [
               'restore_customer' => 'Restore Customer',
               'delete_permanently' => 'Delete Permanently',
            ],
            'asset'   => [
               'restore_asset'       => 'Restore Asset',
               'delete_permanently'  => 'Delete Permanently'
            ],

            'category'   => [
               'restore_category'    => 'Restore Category',
               'delete_permanently'  => 'Delete Permanently',
               'associate_assets'    => 'Associate Assets'
            ]
         ]
      ],

      'access' => [
         'users' => [
            'activate'           => 'Activate',
            'change_password'    => 'Change Password',
            'clear_session'         => 'Clear Session',
            'confirm'             => 'Confirm',
            'deactivate'         => 'Deactivate',
            'delete_permanently' => 'Delete Permanently',
            'login_as'           => 'Login As :user',
            'resend_email'       => 'Resend Confirmation E-mail',
            'restore_user'       => 'Restore User',
            'unconfirm'             => 'Un-confirm',
            'unlink' => 'Unlink',
         ],
      ],
   ],

   'emails' => [
      'auth' => [
         'confirm_account' => 'Confirm Account',
         'reset_password'  => 'Reset Password',
      ],
   ],

   'general' => [
      'cancel' => 'Cancel',
      'continue' => 'Continue',

      'crud' => [
         'create' => 'Create',
         'delete' => 'Delete',
         'edit'   => 'Edit',
         'update' => 'Update',
         'view'   => 'View',
      ],

      'save' => 'Save',
      'view' => 'View',
   ],
];
