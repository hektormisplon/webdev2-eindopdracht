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
        'body' => $faker->sentence(200)
      ],
      [
        'path' => 'contact',
        'title' => 'Contact',
        'subtitle' => 'Get in touch',
        'body' => $faker->sentence(200)
      ],
      [
        'path' => 'privacy-policy',
        'title' => 'Privacy policy',
        'subtitle' => 'Our privacy policy',
        'body' => "
          <p>It is Creunit's policy to respect your privacy regarding any information we may collect while operating our website. This Privacy Policy applies to <a href='http://www.creunite.com/'>www.creunite.com/</a> (hereinafter, 'us', 'we', or 'www.creunite.com/'). We respect your privacy and are committed to protecting personally identifiable information you may provide us through the Website. We have adopted this privacy policy ('Privacy Policy') to explain what information may be collected on our Website, how we use this information, and under what circumstances we may disclose the information to third parties. This Privacy Policy applies only to information we collect through the Website and does not apply to our collection of information from other sources.</p>
          <p>This Privacy Policy, together with the Terms and conditions posted on our Website, set forth the general rules and policies governing your use of our Website. Depending on your activities when visiting our Website, you may be required to agree to additional terms and conditions.</p>
          <h5>Website Visitors</h5>
          <p>Like most website operators, Creunit collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. Creunit's purpose in collecting non-personally identifying information is to better understand how Creunit's visitors use its website. From time to time, Creunit may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>
          <p>Creunit also collects potentially personally-identifying information like Internet Protocol (IP) addresses for logged in users and for users leaving comments on http://www.creunite.com/ blog posts. Creunit only discloses logged in user and commenter IP addresses under the same circumstances that it uses and discloses personally-identifying information as described below.</p>
          <h5>Gathering of Personally-Identifying Information</h5>
          <p>Certain visitors to Creunit's websites choose to interact with Creunit in ways that require Creunit to gather personally-identifying information. The amount and type of information that Creunit gathers depends on the nature of the interaction. For example, we ask visitors who sign up for a blog at http://www.creunite.com/ to provide a username and email address.</p>
          <h5>Security</h5>
          <p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>
          <h5>Cookies</h5>
          <p>To enrich and perfect your online experience, Creunit uses 'Cookies', similar technologies and services provided by others to display personalized content, appropriate advertising and store your preferences on your computer.</p>
          <p>A cookie is a string of information that a website stores on a visitor's computer, and that the visitor's browser provides to the website each time the visitor returns. Creunit uses cookies to help Creunit identify and track visitors, their usage of http://www.creunite.com/, and their website access preferences. Creunit visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using Creunit's websites, with the drawback that certain features of Creunit's websites may not function properly without the aid of cookies.</p>
          <p>By continuing to navigate our website without changing your cookie settings, you hereby acknowledge and agree to Creunit's use of cookies.</p>		
          "
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
