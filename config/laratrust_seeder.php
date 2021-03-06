<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'student' => 'c,r,u,d',
            'professor' => 'c,r,u,d',
            'payment' => 'c,r,u,d',
            'profile' => 'c,r,u,d'
        ],
        'professor' => [
            'student' => 'c,r,u,d',
            'payment' => 'r,u',
            'profile' => 'r,u'
        ],
        'student' => [
            'payment' => 'r,u',
            'profile' => 'r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
