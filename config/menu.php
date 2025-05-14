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
        'menu'      => 'Finance',
        'icon'      => 'fa-solid fa-coins',
        'submenu'   => [
            'Collect Fees' => [
                'route' => 'under_dev'
            ],
            'Fees Type' => [
                'route' => 'under_dev'
            ],
            'Fees Group' => [
                'route' => 'under_dev'
            ],
        ],
    ],

];