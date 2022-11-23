<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', '');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.phone', '+7(800) 888-88-88');
        $this->migrator->add('general.address', 'Какой то адрес\n ул.Несуществующая дом 2');
        $this->migrator->add('general.menu_top', [
            [
                'icon' => '',
                'link' => '#',
                'title' => 'О компании'
            ], [
                'icon' => '',
                'link' => '#',
                'title' => 'Доставка и сборка'
            ], [
                'icon' => '',
                'link' => '#',
                'title' => 'Оплата'
            ], [
                'icon' => '',
                'link' => '#',
                'title' => 'Наши работы'
            ], [
                'icon' => '',
                'link' => '#',
                'title' => 'Контакты'
            ], [
                'icon' => '',
                'link' => '#',
                'title' => 'Блог'
            ],
        ]);
        $this->migrator->add('general.menu_main', [
            [
                'icon' => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
                'link' => '#',
                'title' => 'Руководителям'
            ], [
                'icon' => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
                'link' => '#',
                'title' => 'Персоналу'
            ], [
                'icon' => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
                'link' => '#',
                'title' => 'Переговорные\nи конференц залы'
            ], [
                'icon' => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',

                'link' => '#',
                'title' => 'Мягкая зона'
            ], [
                'icon' => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',

                'link' => '#',
                'title' => 'Приемные'
            ], [
                'icon' => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',

                'link' => '#',
                'title' => 'Зонирование\nи шумоподавление'
            ], [
                'icon' => '<svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',

                'link' => '#',
                'title' => 'Сервисы'
            ]
        ]);
        $this->migrator->add('general.menu_footer', [
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
                    'title' => 'Переговорные \nи конференц залы'
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
                    'title' => 'Зонирование и \nшумоподавление'
                ], [
                    'link' => '#',
                    'title' => 'Сервисы'
                ],
            ]
        ]);
    }
}
