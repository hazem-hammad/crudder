<?php

namespace Database\Seeders;

use App\Models\Label\Label;
use Illuminate\Database\Seeder;

class ProductLabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = [
            [
                'id' => 1,
                'name' => json_encode(['en' => 'Hot', 'ar' => 'حار']),
            ],
            [
                'id' => 2,
                'name' => json_encode(['en' => 'New', 'ar' => 'جديد']),
            ],
            [
                'id' => 3,
                'name' => json_encode(['en' => 'Sale', 'ar' => 'تخفيض']),
            ],
        ];

        // create labels
        foreach ($labels as $label) {
            $existLabel = Label::query()->where('id', $label['id'])->first();
            if ($existLabel) {
                $existLabel->update([
                    'name' => $label['name'],
                ]);
            } else {
                Label::query()->create([
                    'id' => $label['id'],
                    'name' => $label['name'],
                ]);
            }
        }

    }
}
