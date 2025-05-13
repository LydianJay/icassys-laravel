<?php 


return [

    'human_resource' => [
        'menu'      => 'Human Resource',
        'icon'      => 'fa fa-sitemap ftlayer',
        'submenu'   => [
            'Department' => [
                'route' => 'department'
            ],
            'Designation' => [
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