<?php

use App\Translate;

$allWords = Translate::all();
foreach ($allWords as $data) {

    return [

        /*
   |--------------------------------------------------------------------------
   | Authentication Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines are used during authentication for various
   | messages that we need to display to the user. You are free to modify
   | these language lines according to your application's requirements.
   |
   */


        'Change Language' => 'تغير اللغه',
        'Arabic' => 'اللغه العربيه',
        'English' => 'اللغه الانجليزيه',
        'Logout' => 'تسجيل الخروج',
        'Home' => 'الرئيسيه',
        'User & Groups' => 'المجموعات & المستخدمين',
        'Menu' => 'القوائم',
        'User groups' => 'مجموعات المستخدمين',
        'Users' => 'المستخدمين',
        'Home' => 'الرئيسيه',
        'Control panel' => 'لوحه التحكم',
        'Welcom to your dashboard' => 'اهلا بك فى لوحه التحكم الخاصه بك ..',
        'Show Data' => 'عرض البيانات',
        'Add new item' => 'اضافه جديد',
        'Name' => 'الاسم',
        'Edit' => 'تعديل',
        'Delete' => 'حذف',
        'Permission' => 'الصلاحيات',
        'Save' => 'حفظ',
        'Cancel' => 'الغاء',
        'Edit item' => 'تعديل عنصر',
        'Group name' => 'اسم المجموعه',
        'Email' => 'البريد الالكترونى',
        'Serial No' => 'الرقم التسلسلى',
        'Password' => 'كلمه المرور',
        'Phone' => 'رقم الهاتف',
        'Icon' => 'الايقونه',
        'Action' => 'العمليات',
        //
        'Categories' => 'اقسام المشروعات',
        'Site' => 'المواقع',
        'Word' => 'الكلمه',
        'Translate' => 'الترجمه',
        'Arabic Translation' => ' الترجمه العربى',
        'English Translation' => 'الترجمه الانجليزى ',
        'Save Changes' => 'حفظ التعديلات ',
        'Edit Profile' => 'تعديل حسابى ',
        'Cpanel' => 'لوحه التحكم',
        'All rights reserved.' => 'جميع الحقوق محفوظه.',
        'Hand-crafted & Made with' => 'تطوير شركه',
        'Accura Group' => 'اكيورا جروب',
        'Notes' => 'ملاحظات',
        'Contractor' => 'المقاولين',
        'Supervisor' => 'الجهات المشرفه',
        'Beneficiaries' => 'الجهات المستفيده',
        'Projects' => 'المشاريع',
        'Yes' => 'نعم',
        'No' => 'لا',
        'Project extensions' => 'ملحقات المشروع',
        'Official project papers' => 'اوراق المشروع الرسميه (العقود)',
        'Maps and charts' => 'الخرائط والمخططات  ',
        'Scope of work' => 'وصف العمل  ',
        'Electrical files' => 'الملفات الخاصه بالكهرباء ',
        'Choose' => 'اختر',
        'Finished Projects' => 'المشاريع المنتهيه',
        'Details' => 'التفاصيل',
        'Logo' => 'الشعار',
        'Site Name' => 'اسم الموقع ',
        'Setting' => 'الاعدادات',
        'ProjectElectrical' => 'قسم الكهرباء',
        'No Data Found' => 'لا يوجد بيانات',
        'contractorName' => 'اسم المقاول',
        'finalValue' => 'القيمه النهائيه',
        'endDate' => 'تاريخ الانتهاء',
        'beneficiaries' => 'الجهات المستفيده',
        'workCat' => 'اقسام طلبات العمل ',
        'workRequest' => 'طلبات العمل ',
        'requestNo' => 'رقم الطلب',
        'bidderNo' => 'رقم المناقصه ',
        'address' => 'العنوان',
        'price' => 'المبلغ',
        'balanceItem' => 'بند الموازنه ',
        'days' => 'مده التنفيذ',
        'workApplication' => 'مناقصات طلبات العمل',
        'fileNo' => 'رقم الملف',
        'applicationNo' => 'رقم المناقصه',
        'closeDate' => 'تاريخ الاغلاق',
        'projectNoReq' => 'رقم طلب وحده المشاريع',
        'areaNo' => 'رقم طلب وحده المساحه والتخطيط',
        'MoveProject' => 'نقل المشروع ',


        $data->wordKey => $data->name_ar,

    ];
}


