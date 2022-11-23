<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateHomeSettings extends SettingsMigration
{
    public function up(): void
    {
//    public array $featured_products;
        $this->migrator->add('home.meta_title', '');
        $this->migrator->add('home.meta_description', '');
        $this->migrator->add('home.meta_icon', '');
        $this->migrator->add('home.heading', 'Оснащение офисов под ключ. Офисные решения');
        $this->migrator->add('home.text', 'Офисы с правильным расположением кресел, стульев, столов для переговоров производят благоприятное впечатление на клиентов, создают комфортную для работы обстановку. На оснащение офисов нужно обратить особое внимание, ведь оно влияет на состояние каждого работника. Для развития компании в нужном направлении, увеличения прибыли, получения нестандартных, креативных решений от сотрудников необходимо сделать все возможное, чтобы рабочее пространство было оформлено с удобством. Все офисные решения в «Мир Кабинетов» направлены на создание стильной эстетики в помещении, привлечения новых клиентов, партнеров, стабильных и ценных работников.');
        $this->migrator->add('home.banners', [
            [
                'title' => 'КАБИНЕТЫ ДЛЯ \nПЕРВЫХ ЛИЦ КОМПАНИИ',
                'text' => 'Создадим проект и 3d визуализацию вашего кабинета',
                'link' => '#',
                'image' => '/dist/images/home-default-banner0.jpg'
            ]
        ]);
        $this->migrator->add('home.featured_products', [
            [
                'group' => '',
                'products' => []
            ]
        ]);
    }
}
