<?php

use App\Page;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PagesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    $pages = [
      [
        'path' => 'about',
        'title' => 'About',
        'subtitle' => 'Get to know us',
        'body' => $faker->sentence(20)
      ],
      [
        'path' => 'contact',
        'title' => 'Contact',
        'subtitle' => 'Get in touch',
        'body' => $faker->sentence(20)
      ],
      [
        'path' => 'privacy-policy',
        'title' => 'Privacy policy',
        'subtitle' => 'Our privacy policy',
        'body' => $faker->sentence(20)
      ],
      [
        'path' => 'terms-conditions',
        'title' => 'Terms & conditions',
        'subtitle' => 'Our terms and conditions',
        'body' => $faker->sentence(80)
      ],
    ];
    foreach ($pages as $page) {
      Page::create($page);
    }
  }
}
