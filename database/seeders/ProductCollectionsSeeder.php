<?php

namespace Database\Seeders;

use App\Models\Collection\Collection;
use App\Models\Label\Label;
use Illuminate\Database\Seeder;

class ProductCollectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            [
                'id' => 1,
                'name' => json_encode(['en' => 'New Arrival', 'ar' => 'وصول جديد']),
            ],
            [
                'id' => 2,
                'name' => json_encode(['en' => 'Best Sellers', 'ar' => 'الأفضل مبيعًا']),
            ],
            [
                'id' => 3,
                'name' => json_encode(['en' => 'Special Offer', 'ar' => 'عرض خاص']),
            ],
        ];

        // create collections
        foreach ($collections as $collection) {
            $existCollection = Collection::query()->where('id', $collection['id'])->first();
            if ($existCollection) {
                $existCollection->update([
                    'name' => $collection['name'],
                ]);
            } else {
                Collection::query()->create([
                    'id' => $collection['id'],
                    'name' => $collection['name'],
                ]);
            }
        }

    }
}
