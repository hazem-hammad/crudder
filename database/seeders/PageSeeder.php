<?php

namespace Database\Seeders;

use App\Models\Page\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
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
                'id' => 1,
                'name' => json_encode(['en' => 'Terms and conditions', 'ar' => 'الشروط والاحكام']),
                'slug' => 'terms-and-conditions',
            ],
            [
                'id' => 2,
                'name' => json_encode(['en' => 'Return policy', 'ar' => 'سياسية الاسترجاع']),
                'slug' => 'return-policy',

            ],
            [
                'id' => 3,
                'name' => json_encode(['en' => 'Privacy policy', 'ar' => 'سياسية الخصوصية']),
                'slug' => 'privacy-policy',
            ],
            [
                'id' => 4,
                'name' => json_encode(['en' => 'faq', 'ar' => 'الأسئلة الشائعة']),
                'slug' => 'faq',
            ],
            [
                'id' => 5,
                'name' => json_encode(['en' => 'About us', 'ar' => 'من نحن']),
                'slug' => 'about-us',
            ],
        ];

        // create pages
        foreach ($pages as $page) {
            $existPage = Page::query()->where('id', $page['id'])->first();
            if ($existPage) {
                $existPage->update(['name' => $page['name'], 'slug' => $page['slug']]);
            } else {
                Page::query()->create(['id' => $page['id'], 'name' => $page['name'], 'slug' => $page['slug']]);
            }
        }
    }
}
