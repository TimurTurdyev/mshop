<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', '');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.phone', '');
        $this->migrator->add('general.address', '');
        $this->migrator->add('general.menu_top', []);
        $this->migrator->add('general.menu_main', []);
        $this->migrator->add('general.menu_footer', [
            'column1' => [],
            'column2' => [],
            'column3' => [],
            'column4' => []
        ]);
    }
}
