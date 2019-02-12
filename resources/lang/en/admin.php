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


        $data->wordKey => $data->name_en

    ];
}


