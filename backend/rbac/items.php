<?php
return [
    '/admin/*' => [
        'type' => 2,
    ],
    '/fix/*' => [
        'type' => 2,
    ],
    '/service/*' => [
        'type' => 2,
    ],
    '/supply/*' => [
        'type' => 2,
    ],
    'pms_fix' => [
        'type' => 2,
        'description' => 'จัดการงานซ่อม',
        'children' => [
            '/fix/*',
        ],
    ],
    'pms_admin' => [
        'type' => 2,
        'description' => 'ผู้ดูแลระบบ',
        'children' => [
            '/admin/*',
        ],
    ],
    'pms_supply' => [
        'type' => 2,
        'description' => 'งานพัสดุ',
        'children' => [
            '/supply/*',
        ],
    ],
    'pms_service' => [
        'type' => 2,
        'description' => 'งานบริการ',
        'children' => [
            '/service/*',
        ],
    ],
    'administrator' => [
        'type' => 1,
        'description' => 'บทบาท admin',
        'children' => [
            'pms_admin',
        ],
    ],
    'it' => [
        'type' => 1,
        'description' => 'บทบาทงาน IT',
        'children' => [
            'pms_fix',
        ],
    ],
    'service' => [
        'type' => 1,
        'description' => 'บริการ',
        'children' => [
            'pms_service',
        ],
    ],
    'supply' => [
        'type' => 1,
        'description' => 'พัสดุ',
        'children' => [
            'pms_supply',
        ],
    ],
];
