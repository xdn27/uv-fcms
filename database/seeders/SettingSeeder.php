<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::factory()->create([
            'code' => 'site_name',
            'label' => 'Site Name',
            'content' => 'FCMS',
            'group' => 'site'
        ]);

        Setting::factory()->create([
            'code' => 'logo',
            'label' => 'Logo',
            'content' => '',
            'group' => 'site',
            'type' => 'image'
        ]);

        Setting::factory()->create([
            'code' => 'favicon',
            'label' => 'Favicon',
            'content' => '',
            'group' => 'site',
            'type' => 'image'
        ]);

        Setting::factory()->create([
            'code' => 'contact_email',
            'label' => 'Contact Email',
            'content' => '',
            'group' => 'contact',
        ]);

        Setting::factory()->create([
            'code' => 'contact_phone',
            'label' => 'Contact Phone',
            'content' => '',
            'group' => 'contact',
        ]);

        // Setting::factory()->create([
        //     'code' => 'mail_host',
        //     'label' => 'Mail Host',
        //     'content' => '127.0.0.1',
        //     'group' => 'mail'
        // ]);

        // Setting::factory()->create([
        //     'code' => 'mail_username',
        //     'label' => 'Mail Username',
        //     'content' => '',
        //     'group' => 'mail'
        // ]);

        // Setting::factory()->create([
        //     'code' => 'mail_password',
        //     'label' => 'Mail Password',
        //     'content' => '',
        //     'group' => 'mail'
        // ]);

        // Setting::factory()->create([
        //     'code' => 'mail_from_address',
        //     'label' => 'Mail From Address',
        //     'content' => '',
        //     'group' => 'mail'
        // ]);

        // Setting::factory()->create([
        //     'code' => 'mail_from_name',
        //     'label' => 'Mail From NAme',
        //     'content' => '',
        //     'group' => 'mail'
        // ]);
    }
}
