<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Labels Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines are used in labels throughout the system.
   | Regardless where it is placed, a label can be listed here so it is easily
   | found in a intuitive way.
   |
   */

   'general' => [
      'all'     => 'All',
      'yes'     => 'Yes',
      'no'      => 'No',
      'custom'  => 'Custom',
      'actions' => 'Actions',
      'active'  => 'Active',
      'buttons' => [
         'save'   => 'Save',
         'update' => 'Update',
      ],
      'hide'              => 'Hide',
      'inactive'          => 'Inactive',
      'none'              => 'None',
      'show'              => 'Show',
      'toggle_navigation' => 'Toggle Navigation',
   ],

   'backend' => [
      'request' => [
         'form' => [
            'liquidation'  => [
               'title'  => 'Request Form - Liquidation Form',

               'list'   => 'Liquidation Form List',

               'create' => 'Create Liquidation Form',
               'edit'   => 'Edit Liquidation Form',
               'delete' => 'Deleted Liquidation Form',
               'view'   => 'View all Liquidation Form',

               'table' => [
                  'id'           => 'ID',
                  'project'      => 'Project',
                  'date'         => 'Date',
                  'amount_provided' => 'Amount Provided',
                  'prepared_by'  => 'Prepared By',
                  'approved_by'  => 'Approved By',
                  'created_at'   => 'Date Added',
                  'updated_at'   => 'Last Updated'
               ],

               'tabs' => [
                  'titles' => [
                     'overview' => 'Overview',
                     'history'  => 'History',
                  ],

                  'content' => [
                     'overview' => [
                        'id'           => 'ID',
                        'project'      => 'Project',
                        'date'         => 'Date',
                        'amount_provided' => 'Amount Provided',
                        'prepared_by'  => 'Prepared By',
                        'approved_by'  => 'Approved By',
                        'created_at'   => 'Date Added',
                        'updated_at'   => 'Last Updated'
                     ],
                  ],
               ],

               'form'   => [
                  'table' => [
                     'date'         => 'Date',
                     'amount'       => 'Amount',
                     'purpose'      => 'Purpose',
                     'receipt'      => 'Receipt(Y/N)',
                     'created_at'   => 'Date Added',
                     'updated_at'   => 'Last Updated'
                  ],
               ]
            ]
         ]
      ],

      'management' => [
         'inventory' => [
            'title'  => 'Inventory Management',
            'customer' => [
               'title' => 'Customer Management',

               'availables'   => 'Customer List',

               'create'    => 'Create Customer',
               'edit'      => 'Edit Customer',
               'view'      => 'View Customer',
               'all'       => 'All Customer',
               'deleted'   => 'Deleted Customer',

               'table' => [
                  'id'                 => 'ID',
                  'company_name'       => 'Company Name',
                  'contact_person'     => 'Contact Person',
                  'contact_number'     => 'Contact Number',
                  'alternative_number' => 'Alternative Number',
                  'email'              => 'E-mail',
                  'address'            => 'Address',
                  'notes'              => 'Notes',
                  'created_at'         => 'Date Added',
                  'updated_at'         => 'Last Updated'
               ],

               'tabs' => [
                  'titles' => [
                     'overview' => 'Overview',
                     'history'  => 'History',
                  ],

                  'content' => [
                     'overview' => [
                        'name'            => 'Name',
                        'type'            => 'Asset Type',
                        'serial_number'   => 'Serial Number',
                        'eas_tag'         => 'ExcelAsia Tag',
                        'status'          => 'Asset Status',
                        'created_at'      => 'Date Created',
                        'updated_at'      => 'Last Updated'
                     ],
                  ],
               ],
            ],

            'asset'  => [
               'title'  => 'Asset Management',
               'create' => 'Create Asset',
               'edit'   => 'Edit Asset',
               'view'   => 'View Assets',
               'all'    => 'All Assets',
               'deleted'=> 'Deleted Assets',

               'active'  => 'Ready to Deploy',
               'inactive'  => 'Deployed',

               'table'  => [
                  'name'            => 'Name',
                  'category'        => 'Asset Category',
                  'serial_number'   => 'Serial Number',
                  'eas_tag'         => 'ExcelAsia Tag',
                  'status'          => 'Asset Status',
                  'created_at'      => 'Date Created',
                  'updated_at'      => 'Last Updated',
                  'actions'         => 'Actions',
               ],

               'tabs' => [
                  'titles' => [
                     'overview' => 'Overview',
                     'history'  => 'History',
                  ],

                  'content' => [
                     'overview' => [
                        'name'            => 'Name',
                        'category'        => 'Asset Category',
                        'serial_number'   => 'Serial Number',
                        'eas_tag'         => 'ExcelAsia Tag',
                        'status'          => 'Asset Status',
                        'created_at'      => 'Date Created',
                        'updated_at'      => 'Last Updated',
                        'actions'         => 'Actions',
                     ],
                  ],
               ],
            ],

            'category'  => [
               'title'  => 'Category Management',
               'create' => 'Create Category',
               'edit'   => 'Edit Category',
               'view'   => 'View :category Category',
               'all'    => 'All Categories',
               'deleted'=> 'Deleted Categories',

               'active'  => 'Ready to Deploy',
               'inactive'  => 'Deployed',

               'table'  => [
                  'name'            => 'Name',
                  'number_of_assets'=> 'Total Assets',
                  'created_at'      => 'Date Created',
                  'updated_at'      => 'Last Updated',
                  'actions'         => 'Actions'
               ],

               'tabs' => [
                  'titles' => [
                     'overview' => 'Overview',
                     'history'  => 'History',
                  ],

                  'content' => [
                     'overview' => [
                        'name'            => 'Name',
                        'created_at'      => 'Date Created',
                        'updated_at'      => 'Last Updated'
                     ],
                  ],
               ],
            ],
         ]
      ],

      'access' => [
         'roles' => [
            'create'     => 'Create Role',
            'edit'       => 'Edit Role',
            'management' => 'Role Management',

            'table' => [
               'number_of_users' => 'Number of Users',
               'permissions'     => 'Permissions',
               'role'            => 'Role',
               'sort'            => 'Sort',
               'total'           => 'role total|roles total',
            ],
         ],

         'users' => [
            'active'              => 'Active Users',
            'all_permissions'     => 'All Permissions',
            'change_password'     => 'Change Password',
            'change_password_for' => 'Change Password for :user',
            'create'              => 'Create User',
            'deactivated'         => 'Deactivated Users',
            'deleted'             => 'Deleted Users',
            'edit'                => 'Edit User',
            'management'          => 'User Management',
            'no_permissions'      => 'No Permissions',
            'no_roles'            => 'No Roles to set.',
            'permissions'         => 'Permissions',

            'table' => [
               'confirmed'      => 'Confirmed',
               'created'        => 'Created',
               'email'          => 'E-mail',
               'id'             => 'ID',
               'last_updated'   => 'Last Updated',
               'name'           => 'Name',
               'first_name'     => 'First Name',
               'last_name'      => 'Last Name',
               'no_deactivated' => 'No Deactivated Users',
               'no_deleted'     => 'No Deleted Users',
               'roles'          => 'Roles',
               'social' => 'Social',
               'total'          => 'user total|users total',
            ],

            'tabs' => [
               'titles' => [
                  'overview' => 'Overview',
                  'history'  => 'History',
               ],

               'content' => [
                  'overview' => [
                     'avatar'       => 'Avatar',
                     'confirmed'    => 'Confirmed',
                     'created_at'   => 'Created At',
                     'deleted_at'   => 'Deleted At',
                     'email'        => 'E-mail',
                     'last_updated' => 'Last Updated',
                     'name'         => 'Name',
                     'first_name'   => 'First Name',
                     'last_name'    => 'Last Name',
                     'status'       => 'Status',
                  ],
               ],
            ],

            'view' => 'View User',
         ],
      ],
   ],

   'frontend' => [

      'auth' => [
         'login_box_title'    => 'Login',
         'login_button'       => 'Login',
         'login_with'         => 'Login with :social_media',
         'register_box_title' => 'Register',
         'register_button'    => 'Register',
         'remember_me'        => 'Remember Me',
      ],

      'contact' => [
         'box_title' => 'Contact Us',
         'button' => 'Send Information',
      ],

      'passwords' => [
         'forgot_password'                 => 'Forgot Your Password?',
         'reset_password_box_title'        => 'Reset Password',
         'reset_password_button'           => 'Reset Password',
         'send_password_reset_link_button' => 'Send Password Reset Link',
      ],

      'macros' => [
         'country' => [
            'alpha'   => 'Country Alpha Codes',
            'alpha2'  => 'Country Alpha 2 Codes',
            'alpha3'  => 'Country Alpha 3 Codes',
            'numeric' => 'Country Numeric Codes',
         ],

         'macro_examples' => 'Macro Examples',

         'state' => [
            'mexico' => 'Mexico State List',
            'us'     => [
               'us'       => 'US States',
               'outlying' => 'US Outlying Territories',
               'armed'    => 'US Armed Forces',
            ],
         ],

         'territories' => [
            'canada' => 'Canada Province & Territories List',
         ],

         'timezone' => 'Timezone',
      ],

      'user' => [
         'passwords' => [
            'change' => 'Change Password',
         ],

         'profile' => [
            'avatar'             => 'Avatar',
            'created_at'         => 'Created At',
            'edit_information'   => 'Edit Information',
            'email'              => 'E-mail',
            'last_updated'       => 'Last Updated',
            'name'               => 'Name',
            'first_name'         => 'First Name',
            'last_name'          => 'Last Name',
            'update_information' => 'Update Information',
         ],
      ],

   ],
];
