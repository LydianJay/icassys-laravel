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
            'Permission' => [
                'route' => 'under_dev'
            ]
            
        ],
    ],


    [
        'menu'      => 'Student Information',
        'icon'      => 'fa-solid fa-graduation-cap',
        'submenu'   => [
            'Students' => [
                'route' => 'student'
            ],
            // 'Enrollment' => [
            //     'route' => 'under_dev'
            // ],
            
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
                'route' => 'under_dev'
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

];