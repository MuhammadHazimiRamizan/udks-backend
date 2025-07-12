<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\Setting;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'company_name' => 'UD Keluarga Sehati',
            'company_email' => 'm.hazimi21ti@mahasiswa.pcr.ac.id',
            'company_phone' => '012345678901',
            'notification_email' => 'ramizanh99@gmail.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'prefix',
            'footer_text' => 'UD Keluarga Sehati © 2025 || Developed by <strong><a target="_blank" href="#">M. Hazimi Ramizan</a></strong>',
            'company_address' => 'Pekanbaru, Indonesia'
        ]);
    }
}
