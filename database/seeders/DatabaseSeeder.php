<?php

namespace Database\Seeders;

use App\Models\event_type;
use App\Models\location;
use App\Models\User;
use App\Models\user_status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        user_status::create([
            'status' => 'admin'
        ]);

        user_status::create([
            'status' => 'guest'
        ]);

        user_status::create([
            'status' => 'client'
        ]);

        user_status::create([
            'status' => 'registration'
        ]);

        event_type::create([
            'name' => 'Marriage'
        ]);

        event_type::create([
            'name' => 'Birthday'
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'hunx.13@gmail.com',
            'phone' => '0895330129055',
            'password' => bcrypt('password'),
            'user_status_id' => '1'
        ]);

        location::create([
            'venue' => 'Bambuden III',
            'address' => 'Jln. Gunung Latimojong',
            'googleAPI' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7992650158562!2d119.41755011528728!3d-5.135999053387506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd57c1c6127f%3A0xf86a52cbbd049cf3!2sBambuden%203%20(New%20Bambuden)!5e0!3m2!1sid!2sid!4v1637416549606!5m2!1sid!2sid',
            'link' => 'https://goo.gl/maps/Gw3VuFycxYVar3Pm7'
        ]);

        location::create([
            'venue' => 'Upperhills',
            'address' => 'Jln. Metro Tanjung Bunga',
            'googleAPI' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.656602456615!2d119.39989891528737!3d-5.158833853562919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d0dca1cf797%3A0x15a4ebc6aa0744fa!2sUpperHills%20Convention%20Hall!5e0!3m2!1sid!2sid!4v1637416633312!5m2!1sid!2sid',
            'link' => 'https://goo.gl/maps/F4cnpYJdqeeq6apn8'
        ]);
    }
}
