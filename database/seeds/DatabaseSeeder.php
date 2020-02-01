<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Heroine;
use App\Models\Logging;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heroine = Heroine::create([
            'name' => 'madoka kaito',
            'link_to_picture' => 'https://cdn.faptitans.com/s1/__3dc1/images/hero-all/tithero-05/x1/tithero-05-1.jpg',
            'discription' => 'katana scroolgirl ',
            'attack_type' => 'melee',
        ]);

        $heroine = Heroine::create([
            'name' => 'marika tosigawa',
            'link_to_picture' => 'https://cdn.faptitans.com/s1/__c45f/images/hero-all/tithero-134/x1/tithero-134-1.jpg',
            'discription' => 'winter girl with spear ',
            'attack_type' => 'ranged',
        ]);

        $heroine = Heroine::create([
            'name' => 'saeki chika',
            'link_to_picture' => 'https://cdn.faptitans.com/s1/__27b8/images/hero-all/tithero-142/x1/tithero-142-1.jpg',
            'discription' => 'orange haired girl druid glasses',
            'attack_type' => 'druid',
        ]);

        $heroine = Heroine::create([
            'name' => 'chiasa saike',
            'link_to_picture' => 'https://cdn.faptitans.com/s1/__cce7/images/hero-all/tithero-26/x1/tithero-26-1.jpg',
            'discription' => 'girl with scythe reaper hoodie black dress',
            'attack_type' => 'cleric',
        ]);


        Logging::create([
            'heroine' => $heroine->getKey(),
            'promoted' => true,
            'new_level' => 666,
            'promotion_received' => Carbon::now(),
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
