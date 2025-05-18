<?php 


return [

    [
        'menu'      => 'Human Resource',
        'icon'      => 'fa fa-sitemap ftlayer',
        'submenu'   => [
            'Staff' => [
                'route' => 'staff'
            ],
            'Department' => [
                'route' => 'department'
            ],
            'Role' => [
                'route' => 'designation'
            ],
           
            
        ],
    ],


    [
        'menu'      => 'Student Information',
        'icon'      => 'fa-solid fa-graduation-cap',
        'submenu'   => [
            'Students' => [
                'route' => 'student'
            ],
            
            
        ],
    ],


    [
        'menu'      => 'Fees',
        'icon'      => 'fa-solid fa-coins',
        'submenu'   => [
            'Collect Fees' => [
                'route' => 'under_dev'
            ],
            'Fees Type' => [
                'route' => 'fee_type'
            ],
            'Fees Group' => [
                'route' => 'fee_group'
            ],
        ],
    ],


    [
        'menu'      => 'Academics',
        'icon'      => 'fa-solid fa-book-open',
        'submenu'   => [
            'Classes' => [
                'route' => 'under_dev'
            ],
        ],
    ],


    [
        'menu'      => 'Permission',
        'icon'      => 'fa-solid fa-lock-open',
        'submenu'   => [
            'User Permission' => [
                'route' => 'userpermission'
            ],
            
            'Role Permission' => [
                'route' => 'role_permission'
            ],
        ],
    ],
];