<?php 


return [

    'human_resource' => [
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
        'menu'      => 'Student',
        'icon'      => 'fa fa-sitemap ftlayer',
        'route'     => 'home',
        'submenu'   => [
            'enrollment' => [
                'route' => 'home'
            ]
        ],
    ],

];