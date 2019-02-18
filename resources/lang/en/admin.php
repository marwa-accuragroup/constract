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
        $data->wordKey => $data->name_en,


        'Change Language' => 'Change Language',
        'Arabic' => 'Arabic',
        'English' => 'English',
        'Logout' => 'Logout',
        'Home' => 'Home',
        'User & Groups' => 'User & Groups',
        'Menu' => 'Menu',
        'User groups' => 'User groups',
        'Users' => 'Users',
        'Home' => 'Home',
        'Control panel' => 'Control panel',
        'Welcom to your dashboard' => 'Welcom to your dashboard',
        'Show Data' => 'Show Data',
        'Add new item' => 'Add new item',
        'Name' => 'Name',
        'Edit' => 'Edit',
        'Delete' => 'Delete',
        'Permission' => 'Permission',
        'Save' => 'Save',
        'Cancel' => 'Cancel',
        'Edit item' => 'Edit item',
        'Group name' => 'Group name',
        'Email' => 'Email',
        'Serial No' => 'Serial No',
        'Password' => 'Password',
        'Phone' => 'Phone',
        'Icon' => 'Icon',
        'Action' => 'Action',
        //
        'Categories' => 'Projects Categories',
        'Site' => 'Site',
        'Word' => 'Word',
        'Translate' => 'Translate',
        'Arabic Translation' => 'Arabic Translation',
        'English Translation' => 'English Translation',
        'Save Changes' => 'Save Changes',
        'Edit Profile' => 'Edit Profile',
        'Cpanel' => 'Cpanel',
        'All rights reserved.' => 'All rights reserved.',
        'Hand-crafted & Made with' => 'Devloped By',
        'Accura Group' => 'Accura Group',
        'Notes' => 'Notes',
        'Contractor' => 'Contractor',
        'Supervisor' => 'Supervisor',
        'Beneficiaries' => 'Beneficiaries',
        'Projects' => 'Projects',
        'Yes' => 'Yes',
        'No' => 'No',
        'Project extensions' => 'Project extensions',
        'Official project papers' => 'Official project papers',
        'Maps and charts' => 'Maps and charts',
        'Scope of work' => 'Scope of work',
        'Electrical files' => 'Electrical files',
        'Choose' => 'Choose',
        'Finished Projects' => 'Finished Projects',
        'Details' => 'Details',

        'Logo' => 'logo',
        'Site Name' => 'Site Name',
        'Setting' => 'Setting',




    ];
}


