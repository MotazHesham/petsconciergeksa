<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'projects' => [
        'title'          => 'المشاريع',
        'title_singular' => 'المشاريع',
        'fields'         => [
        ],
    ],
    'supplier' => [
        'title'          => 'الموردين',
        'title_singular' => 'الموردين',
    ],
    'cities' => [
        'title'          => 'المدن',
        'title_singular' => 'المدن',
        'fields'         => [
        ],
    ],
    'customers' => [
        'title'          => 'العملاء',
        'title_singular' => 'العملاء',
        'fields'         => [
        ],
    ],
    'types' => [
        'title'          => 'انواع المشاريع',
        'title_singular' => 'انواع المشاريع',
        'fields'         => [
        ],
    ],
    'workingday' => [
        'title'          => 'أيام العمل',
        'title_singular' => 'أيام العمل',
        'fields'         => [
        ],
    ],
    'setting' => [
        'title'          => 'الاعدادات',
        'title_singular' => 'الاعدادات',

    ],
    'tasks' => [
        'title'          => 'مهام',
        'title_singular' => 'مهام',

    ],
    'invoice' => [
        'title'          => 'الفاتورة',
        'title_singular' => 'الفاتورة',
        'fields'=>[
            'simple_invoice'=>'فاتورة ضريبية',
            'returned_invoice'=>'مرتجع فاتورة رقم',
        ]

    ],
    'bank' => [
        'title'          => 'الحسابات البنكية',
        'title_singular' => 'الحسابات البنكية',

    ],
    'clients' => [
        'title'          => 'العملاء',
        'title_singular' => 'العملاء',
        'fields'         => [
            'sale'=>'فاتورة : مبیعات آجلة',
            'currency'=>'ريال سعودي',
            'address_ar'=>'العنوان عربي',
            'active'=>'مفعل',

            'machine_num'=>'رقم الماكينة',
            'roles'=>'الشروط و الأحكام للأجهزه المستخدمه',
            'police'=>'سياسة الإرجاع والاأستبدال',
            'box_honer'=>'امين الصندوق',

            'date_of_supply'=>'تاريخ التوريد',
            'building_num'=>'رقم المبني',
            'street_name'=>'اسم الشارع',
            'street'=>'الشارع',
            'disincit'=>'الحي',
            'city'=>'المدينة',
            'addidtional_address'=>'الرقم الاضافي للعنون',
            'another_id'=>'معرف اخر',
            'zipCode'=>'البلد الرمز البريدي',
            'bank_name'=>'اسم البنك',
            'bank_name_ar'=>'اسم البنك عربي',
            'nickname'=>'اسم الحساب',
            'nickname_ar'=>'اسم الحساب عربي',
            'iban'=>'ايبان',
            'account_number'=>'رقم الحساب',
            'banks'=>'الحسابات البنكية',
            'suppliers'=>'الموردين',
            'tax'                => 'نسبة الضرائب  المضافة',
            'today_rate'=>'معدل سعر اليوم',
            'details'=>'التفاصيل',
            'user'=>'المستخدم',
            'search'=>'بحث',
            'total'=>'الاجمالي شامل الضریبة المضافة',
            'OverTime Amount'=>'اجمالي الاضافي',
            'Pay by Bank Transfer to below bank details'=>'الدفع عن طريق التحويل المصرفي إلى التفاصيل المصرفية أدناه',
            'Bank Name'=>'اسم البنك',
            'client'=>'العميل',

            'Account No'=>'رقم الحساب',
            'IBAN No'=>'رقم الايبان',
            'OverTime Hours'=>'عدد ساعات الاضافي',
            'OverTime Rate'=>'معدل الساعة الاضافية',
            'total_letters'=>'المبلغ بالحروف',
            'tax_rate'=>'ضريبة القيمة المضافة 15%',
            'date'=>'تاريخ الاصدار',
            'date_of_returned'=>'تاريخ الفاتورة',
            'total_amount'=>'الاجمالي بدون الضریبة المضافة',
            'month'=>'الشهر',
            'projects'=>'المحطة',
            'users'=>'ا لمستخدمين',
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name_ar'             => 'الاسم ع',
            'types'=>'نوع المشروع',
            'cities'=>'المدن',
            'name'             => 'الاسم',
            'Absence Days'=>'عدد ايام الغياب',
            'Absence Rate'=>'معدل ساعة الغياب',
            'Absence Amount'             => 'اجمالي الغياب',
            'additional'             => 'الاضافي',
            'Absence'             => 'الغياب',
            'VAT Registration Certificate'=>'شهادة تسجيل في ضريبة القيمة المضافة',
            'Hereby, The General Authority of Zakat & Tax (GAZT) certifies that the taxpayer below is
VAT registered on 19/04/2022'=>'تشهد الهيئة العامة للزكاة والدخل بأن المكلف أدناه مسجل في ضريبة القيمة المضافة
 2022/04/19 بتاريخ',
            'Taxpayer Name'=>'اسم المكلف',
            'VAT Registration Number'=>'رقم التعريف الضريبي',
            'Effective Registration Date'=>'تاريخ نفاد التسجيل',
            'Taxpayer Address'=>'عنوان المكلف',

            'from'             => 'من',
            'to'             => 'الي',
            'days'             => 'ايام العمل',
            'Saturday'=>' السبت',
            'Sunday'=>'الأحد',
            'Monday'=>'الاثنين',
            'Tuesday'=>'الثلاثاء',
            'address'      => 'العنوان',
            'tax_number'      => 'الرقم الضريبي',
            'tax_number_supplier'      => 'الرقم الضريبي للمورد',
            'tax_number_client'      => 'الرقم الضريبي للعميل',
            'Beneficiary Name'=>'اسم المستفيد',

            'invoice_id'=>'رقم الفاتورة',
            'Wednesday'=>'الأربعاء',
            'Thursday'=>'الخميس',
            'working'=>'ايام العمل',
            'add_more'=>'اضافة المزيد',
            'project'=>'المشروع',
            'supplier'=>'المورد',

            'remove'=>'حذف',
            'print'=>'طباعه',
            'Friday'=>' الجمعة',
            'start_date'=>'بداية التاريخ',
            'clients'=>'العملاء',
            'end_date'=>'نهاية التاريخ',
            'phone'      => 'الهاتف',
            'appointments_count'      => 'الحجوزات',
            'email'      => 'البريد الالكتروني',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

    'service' => [
        'title'          => 'الخدمات',
        'title_singular' => 'الخدمات',
        'fields'         => [
            'update'=>'تحديث',
            'name'=>'الاسم',
            'image'=>'الصوره',
            'description'=>'الوصف',
            'create'=>'اضافه',
            'id'=>'ID',
            'price'=>'السعر',
            'services_id' => 'الخدمات',
            'edit'=>'تعديل'
        ],

    ],


    'addon' => [
        'title'          => 'الاضافات',
        'title_singular' => 'اضافه',
        'fields'         => [
            'update'=>'تحديث',
            'name'=>'الاسم',
            'create'=>'اضافه',
            'id'=>'ID',
            'price'=>'السعر',
            'icon'=>'icon',
            'active'=>'نشر',
            'edit'=>'تعديل'
        ],

    ],


    'category' => [
        'title'          => 'الانواع',
        'title_singular' => 'الانواع',
        'fields'         => [
            'update'=>'تحديث',
            'name'=>'الاسم',
            'image'=>'الصوره',
            'description'=>'الوصف',
            'create'=>'اضافه',
            'id'=>'ID',
            'edit'=>'تعديل'
        ],

    ],

    'comments' => [
        'title'          => 'التعليقات',
        'title_singular' => 'التعليقات',
        'fields'         => [
            'update'=>'update',
            'name'=>'الاسم',
            'comment'=>'التعليق',
            'status'=>'الحالة',
            'suspend'=>'معلق',
            'publish'=>'نشر',

        ],

    ],


    'gallery' => [
        'title'          => 'معرض الصور',
        'title_singular' => 'معرض الصور',
        'fields'         => [
            'update'=>'تحديث',
            'name'=>'الاسم',
            'image'=>'الصوره',
            'description'=>'الوصف',
            'create'=>'اضافه',
            'id'=>'ID',
            'edit'=>'تعديل',
            'petcategory'=>'نوع الحيوان'
        ],

    ],


    'slider' => [
        'title'          => 'سلايدر',
        'title_singular' => 'سلايد',
        'fields'         => [  
            'photo' => 'السلايد',
            'title' => 'العنوان',
            'body' => 'المحتوي',
            'button_name' => 'Button Name',
            'link' => 'link',
        ],

    ],
    'aboutus' => [
        'title'          => 'اعرف عنا',
        'title_singular' => 'اعرف عنا',
        'fields'         => [
            'update'=>'تحديث',
            'name'=>'الاسم',
            'image_about_us'=>'صورة  About Us',
            'image_our_service'=>'صورة Our Services',
            'image_easy_quick'=>'صورة  Easy & quick',
            'image_client_reviews'=>'صورة Client Reviews',
            'image_packages'=>'صورة  Packeges',
            'image_contact'=>'صورة  Contact',  
            'image_login'=>'صورة Login',  
            'descripton'=>'الوصف',
            'create'=>'اضافه',
            'id'=>'ID',
            'edit'=>'تعديل',
            'mission'=>'المهمه',
            'vision'=>'الرؤيه',
            'phone' => 'رقم الهاتف',
            'email' => 'البريد الألكتروني',
            'address' => 'العنوان',
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
        'title'          => 'الباقات',
        'title_singular' => 'باقه',
        'fields'         => [
            'update'=>'تحديث',
            'name'=>'الاسم',
            'image'=>'الصوره',
            'description'=>'الوصف',
            'create'=>'اضافه',
            'id'=>'ID',
            'edit'=>'تعديل',
            'smallprice'=>'حجم صغير',
            'midprice'=>'حجم وسط',
            'hiprice'=>'حجم كبير',
            'vision'=>'الرؤيه',
        ],

    ],

    'contact' => [
        'title'          => 'الرسائل',
        'title_singular' => 'الرسائل',
        'fields'         => [
            'name'=>'الاسم',
            'email'=>'الايميل',
            'subject'=>'العنوان',
            'message'=>'الرساله',
            'id'=>'ID',
        ],

    ],

    'appointment' => [
        'title'          => 'الحجز',
        'title_singular' => 'الحجوزات',
        'fields'         => [
            'comment'=>'تعليق',
            'todayappointments'=>'حجوزات اليوم',
            'package'=>'الباقة',
            'name'=>'الاسم',
            'email'=>'الايميل',
            'address'=>'العنوان',
            'date'=>'التاريخ',
            'id'=>'ID',
            'status'=>'الحاله',
            'active'=>'جاري',
            'done'=>'تم',
            'assigned'=>'موجهه',
            'employee'=>'موظف',
            'employees'=>'موظفين',
            'choose'=>'اختار',
            'petname'=>'الحيوان',
            'time'=>'الوقت',
            'size'=>'الحجم',
            'price'=>'السعر',
            'client'=>'العميل',
            'addons'=>'الاضافات',
            'created_at'=>'Created At',
        ],
    ],

    'contract' => [
        'title'          => 'شروط العقد',
        'title_singular' => 'شروط العقد',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'             => 'الاسم ',
            'name_ar'      => 'الاسم بالعربي',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
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
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
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
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
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
        'title'          => 'الموظفين',
        'title_singular' => 'موظف',
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
        'returned_invoice_number'          => 'رقم المرتجع',
        'returned_invoice_date' => 'تاريخ المرتجع',
    ],
];
