<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'supplier' => [
        'title'          => 'Supplier',
        'title_singular' => 'Supplier',
    ],
    'setting' => [
        'title'          => 'Setting',
        'title_singular' => 'Setting',
    ],
    'tasks' => [
        'title'          => 'Tasks',
        'title_singular' => 'Tasks',
    ],
    'invoice' => [
        'title'          => 'Invoice',
        'title_singular' => 'Invoice',
        'fields'=>[
            'simple_invoice'=>'Taxable Invoice',
            'returned_invoice'=>'Returned Invoice number',
        ]

    ],
    'bank' => [
        'title'          => 'Banks',
        'title_singular' => 'Banks',

    ],
    'clients' => [
        'title'          => 'Clients',
        'title_singular' => 'Clients',
        'fields'         => [
            'sale'=>'Credit Invoice',
            'currency'=>'SAR',
            'address_ar'=>'Address arabic',
            'active'=>'Active',


            'machine_num'=>'machine number',
            'roles'=>'Terms and conditions for the devices used',
            'police'=>'Return and exchange policy',
            'box_honer'=>'cashier',

            'date_of_supply'=>'Date of supply',

            'building_num'=>'Building Number',
            'street_name'=>'Street Name',
            'street'=>'Street',
            'disincit'=>'District',
            'city'=>'City',
            'addidtional_address'=>'Additional address number',
            'another_id'=>'Another ID',
            'zipCode'=>'Country Zip Code',
            'nickname'=>'Account Name',
            'nickname_ar'=>'Account Name Arabic',

            'bank_name'=>'Bank Name',
            'banks'=>'Banks',

            'iban'=>'Iban',
            'account_number'=>'Number',
            'Beneficiary Name'=>'Beneficiary Name',
            'tax'                => 'Added tax rate',
            'today_rate'=>'Daily Rate',
            'OverTime Hours'=>'OverTime Hours',
            'OverTime Rate'=>'OverTime Rate',
            'OverTime Amount'=>'OverTime Amount',
            'Pay by Bank Transfer to below bank details'=>'Pay by Bank Transfer to below bank details',
            'Bank Name'=>'Bank Name',
            'Account No'=>'Account No',
            'IBAN No'=>'IBAN No',
            'Absence Days'=>'Absence Days',
            'Absence Rate'=>'Absence Rate',

            'working'=>'Working Days',
            'add_more'=>'Add more',
            'remove'=>'Remove',
            'print'=>'Print',
            'user'=>'User',
            'date'=>'Issue Date',
            'date_of_returned'=>'Invoice Date',
            'tax_rate'=>'Vat 15%',
            'search'=>'Search',
            'total_letters'=>'Total In Letters',

            'month'=>'Month',
            'project'=>'Station',
            'total_amount'=>'Invoice total excl. VAT',
            'total_amount_table'=>'total excl. VAT',

            'total'=>'Invoice total Incl. VAT',
            'total_table'=>'Total Incl. VAT',

            'client'=>'Client',

            'supplier'=>'Supplier',

            'projects'=>'Projects',
            'choose'=>'choose',
            'details'=>'Details',
            'users'=>'Users',
            'id'                => 'ID',
            'id_helper'         => ' ',
            'suppliers'=>'Suppliers',
            'name'             => 'Name',
            'Absence Amount'             => 'Absence Amount',
            'additional'=> 'additional',
            'Absence'=> 'Absence',

            'start_date'=>'Start Date',
            'end_date'=>'End Date',
            'clients'=>'Clients',
            'name_ar'             => 'Arabic Name',
            'bank_name_ar'=>'Bank Name Arabic',

            'types'=>'Project Types',
            'cities'=>'Cities',
            'from'             => 'From',
            'to'             => 'To',
            'days'             => 'Working Days',
            'Saturday'=>'Saturday',
            'Sunday'=>'Sunday',
            'Monday'=>'Monday',
            'Tuesday'=>'Tuesday',
            'Wednesday'=>'Wednesday',
            'Thursday'=>'Thursday',
            'Friday'=>'Friday',
            'phone'      => 'Phone',
            'email'      => 'Email',
            'address'      => 'Address',
            'tax_number'      => 'Tax Number',
            'tax_number_supplier'      => 'Tax Number for Supplier',
            'tax_number_client'      => 'Tax Number for Client',
            'invoice_id'=>'Invoice Num',
            'VAT Registration Certificate'=>'VAT Registration Certificate',
            'Hereby, The General Authority of Zakat & Tax (GAZT) certifies that the taxpayer below is
VAT registered on 19/04/2022'=>'Hereby, The General Authority of Zakat & Tax (GAZT) certifies that the taxpayer below is
VAT registered on 19/04/2022',
            'Taxpayer Name'=>'Taxpayer Name',
            'VAT Registration Number'=>'Tax ID No',
            'Effective Registration Date'=>'Effective Registration Date',
            'Taxpayer Address'=>'Taxpayer Address',

            'number'=>'Number',
            'appointments_count' => 'Appointments',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],


    'service' => [
        'title'          => 'service',
        'title_singular' => 'service',
        'fields'         => [
            'update'=>'update',
            'name'=>'Name',
            'image'=>'Image',
            'description'=>'Description',
            'create'=>'Create',
            'id'=>'ID',
            'price'=>'Price',
            'edit'=>'Edit',
            'services_id' => 'Services',
        ],

    ],


    'addon' => [
        'title'          => 'Addons',
        'title_singular' => 'Addon',
        'fields'         => [
            'update'=>'update',
            'name'=>'Name',
            'create'=>'Create',
            'id'=>'ID',
            'price'=>'Price',
            'icon'=>'icon',
            'active'=>'active',
            'edit'=>'Edit',
        ],

    ],


    'category' => [
        'title'          => 'category',
        'title_singular' => 'category',
        'fields'         => [
            'update'=>'update',
            'name'=>'Name',
            'image'=>'Image',
            'description'=>'Description',
            'create'=>'Create',
            'id'=>'ID',
            'edit'=>'Edit'
        ],

    ],




    'gallery' => [
        'title'          => 'Gallery',
        'title_singular' => 'Gallery',
        'fields'         => [
            'update'=>'update',
            'name'=>'Name',
            'image'=>'Image',
            'create'=>'Create',
            'id'=>'ID',
            'edit'=>'Edit',
            'petcategory'=>'Pet Category',
        ],

    ],


    'slider' => [
        'title'          => 'Sliders',
        'title_singular' => 'Slide',
        'fields'         => [  
            'photo' => 'Slider',
            'title' => 'Title',
            'body' => 'Body',
            'link' => 'link',
            'button_name' => 'Button Name',
        ],

    ],

    'aboutus' => [
        'title'          => 'About Us',
        'title_singular' => 'About Us',
        'fields'         => [
            'update'=>'update',
            'name'=>'Name',
            'image_about_us'=>'Image About Us',
            'image_our_service'=>'Image Our Services',
            'image_easy_quick'=>'Image Easy & quick',
            'image_client_reviews'=>'Image Client Reviews',
            'image_packages'=>'Image Packeges',
            'image_contact'=>'Image Contact',  
            'image_login'=>'Image Login',  
            'create'=>'Create',
            'id'=>'ID',
            'edit'=>'Edit',
            'mission'=>'Mission',
            'vision'=>'Vision',
            'description'=>'Description', 
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'googleplus' => 'GooglePlus', 
            'count_to_loyalty' => 'Count To Loyalty', 
            'appointment_count' => 'Number Of Appointment at the same Hour', 
            'package_loyalty' => 'Package Loyalty', 
            'logo' => 'Logo',
        ],



    ],

    'package' => [
        'title'          => 'Packages',
        'title_singular' => 'Package',
        'fields'         => [
            'update'=>'update',
            'name'=>'Name',
            'image'=>'Image',
            'create'=>'Create',
            'id'=>'ID',
            'edit'=>'Edit',
            'smallprice'=>'Small size',
            'midprice'=>'Medium size',
            'hiprice'=>'High size',
            'vision'=>'Vision',
            'description'=>'Description',
        ],

    ],


    'contact' => [
        'title'          => 'Contact',
        'title_singular' => 'Contact',
        'fields'         => [
            'name'=>'Name',
            'email'=>'Email',
            'subject'=>'Subject',
            'message'=>'Message',
            'id'=>'ID',
        ],

    ],


    'comments' => [
        'title'          => 'Comment',
        'title_singular' => 'Comments',
        'fields'         => [
            'name'=>'Name',
            'email'=>'Email',
            'comment'=>'Comment',
            'appointment'=>'Appointment',
            'id'=>'ID',
            'status'=>'Status',
            'suspend'=>'Suspend',
            'publish'=>'Publish',
        ],

    ],

    'appointment' => [
        'title'          => 'Appointment',
        'title_singular' => 'Appointment',
        'fields'         => [
            'package'=>'Package',
            'comment'=>'Comment',
            'todayappointments'=>'Today\'s Appointments', 
            'name'=>'Name',
            'email'=>'Email',
            'address'=>'Address',
            'date'=>'Date',
            'id'=>'ID',
            'status'=>'Status',
            'active'=>'Active',
            'assigned'=>'Assigned',
            'employee'=>'Employee',
            'employees'=>'Employees',
            'done'=>'Done',
            'choose'=>'Choose',
            'petname'=>'Pet Info',
            'time'=>'Time',
            'size'=>'Size',
            'price'=>'Price',
            'client'=>'Client',
            'addons'=>'Addons',
            'created_at'=>'Created At',

        ],

    ],


    'projects' => [
        'title'          => 'Projects',
        'title_singular' => 'Projects',
        'fields'         => [
        ],
    ],
    'cities' => [
        'title'          => 'Cities',
        'title_singular' => 'Cities',
        'fields'         => [
        ],
    ],
    'workingday' => [
        'title'          => 'Working Day',
        'title_singular' => 'Working Day',
        'fields'         => [
        ],
    ],
    'customers' => [
        'title'          => 'Customers',
        'title_singular' => 'Customers',
        'fields'         => [
        ],
    ],
    'types' => [
        'title'          => 'Project Types',
        'title_singular' => 'Project Types',
        'fields'         => [
        ],
    ],
    'contract' => [
        'title'          => 'Contract Terms',
        'title_singular' => 'Contract Terms',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'             => 'Name',
            'name_ar'      => 'Arabic Name',
            'email'      => 'Email',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],

    'employee' => [
        'title'          => 'Employees',
        'title_singular' => 'Employee',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],

    'returnedInvoice' => [
        'returned_invoice_number'          => 'Returned Number',
        'returned_invoice_date' => 'Returned Date',
    ],
];
