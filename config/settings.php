<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Settings Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default settings store that gets used while
    | using this settings library.
    |
    | Supported: "json", "database"
    |
    */
    'store' => 'database',

    /*
    |--------------------------------------------------------------------------
    | JSON Store
    |--------------------------------------------------------------------------
    |
    | If the store is set to "json", settings are stored in the defined
    | file path in JSON format. Use full path to file.
    |
    */
    'path' => storage_path().'/settings.json',

    /*
    |--------------------------------------------------------------------------
    | Database Store
    |--------------------------------------------------------------------------
    |
    | The settings are stored in the defined file path in JSON format.
    | Use full path to JSON file.
    |
    */
    // If set to null, the default connection will be used.
    'connection' => null,
    // Name of the table used.
    'table' => 'settings',
    // If you want to use custom column names in database store you could
    // set them in this configuration
    'keyColumn' => 'key',
    'valueColumn' => 'value',

    /*
    |--------------------------------------------------------------------------
    | Cache settings
    |--------------------------------------------------------------------------
    |
    | If you want all setting calls to go through Laravel's cache system.
    |
    */
    'enableCache' => false,
    // Whether to reset the cache when changing a setting.
    'forgetCacheByWrite' => true,
    // TTL in seconds.
    'cacheTtl' => 15,

    /*
    |--------------------------------------------------------------------------
    | Default Settings
    |--------------------------------------------------------------------------
    |
    | Define all default settings that will be used before any settings are set,
    | this avoids all settings being set to false to begin with and avoids
    | hardcoding the same defaults in all 'Settings::get()' calls
    |
    */
    'defaults' => [
        'phone' => '+7 (000) 000-00-00',
        'address' => 'ММДЦ Москва Сити, \n улица несуществующая, 1',
        'title' => '',
        'meta_description' => '',
        'menu_top' => [
            [
                'link' => '#',
                'title' => 'О компании'
            ], [
                'link' => '#',
                'title' => 'Доставка и сборка'
            ], [
                'link' => '#',
                'title' => 'Оплата'
            ], [
                'link' => '#',
                'title' => 'Наши работы'
            ], [
                'link' => '#',
                'title' => 'Контакты'
            ], [
                'link' => '#',
                'title' => 'Блог'
            ],
        ],
        'menu_main' => [
            [
                'link' => '#',
                'title' => 'Руководителям'
            ], [
                'link' => '#',
                'title' => 'Персоналу'
            ], [
                'link' => '#',
                'title' => 'Переговорные \nи конференц залы'
            ], [
                'link' => '#',
                'title' => 'Мягкая зона'
            ], [
                'link' => '#',
                'title' => 'Приемные'
            ], [
                'link' => '#',
                'title' => 'Зонирование \nи шумоподавление'
            ], [
                'link' => '#',
                'title' => 'Сервис'
            ],
        ],
        'menu_footer' => [
            'column1' => [
                [
                    'link' => '#',
                    'title' => 'О компании'
                ], [
                    'link' => '#',
                    'title' => 'Доставка и сборка'
                ], [
                    'link' => '#',
                    'title' => 'Оплата'
                ], [
                    'link' => '#',
                    'title' => 'Наши работы'
                ], [
                    'link' => '#',
                    'title' => 'Контакты'
                ],
            ],
            'column2' => [
                [
                    'link' => '#',
                    'title' => 'Дизайнерам и архитекторам'
                ], [
                    'link' => '#',
                    'title' => 'Дизайн проект'
                ], [
                    'link' => '#',
                    'title' => 'Госзаказчикам'
                ], [
                    'link' => '#',
                    'title' => 'Блог'
                ],
            ],
            'column3' => [
                [
                    'link' => '#',
                    'title' => 'Руководителям'
                ], [
                    'link' => '#',
                    'title' => 'Персоналу'
                ], [
                    'link' => '#',
                    'title' => 'Переговорные и конференц залы'
                ], [
                    'link' => '#',
                    'title' => 'Мягкая зона'
                ],
            ],
            'column4' => [
                [
                    'link' => '#',
                    'title' => 'Приемные'
                ], [
                    'link' => '#',
                    'title' => 'Зонирование и шумоподавление'
                ], [
                    'link' => '#',
                    'title' => 'Сервисы'
                ],
            ]
        ]
    ]
];
