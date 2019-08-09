<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'path' => 'about',
                'title' => 'About',
                'subtitle' => 'Get to know us',
                'body' => 'This is the about page content',
            ],
            [
                'path' => 'contact',
                'title' => 'Get in touch',
                'subtitle' => 'Contact sub',
                'body' => 'This is the contact page content',
            ],
            [
                'path' => 'privacy-policy',
                'title' => 'Our privacy policy',
                'subtitle' => 'Privacy policy sub',
                'body' => 'This is the privacy policy page content',
            ],
            [
                'path' => 'terms-conditions',
                'title' => 'Terms & conditions',
                'subtitle' => 'Terms & conditions sub',
                'body' => 'This is the terms & conditions page content',
            ],
        ];
        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
