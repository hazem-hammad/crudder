<?php

namespace Database\Seeders;

use App\Models\CountryCode\CountryCode;
use Illuminate\Database\Seeder;

class CountryCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countryCodes = [
            [
                'id' => 1,
                'country_name' => json_encode(['en' => 'qatar', 'ar' => 'قطر']),
                'code' => '974',
                'regex' => '^(?:[0-9]+)?$',
                'flag' => 'assets/admin/media/flags/qatar.png',
            ],
            [
                'id' => 2,
                'country_name' => json_encode(['en' => 'egypt', 'ar' => 'مصر']),
                'code' => '20',
                'regex' => '^1[0-5]\d{1,8}$',
                'flag' => 'assets/admin/media/flags/egy.png',
            ],
        ];

        // create brands
        foreach ($countryCodes as $countryCode) {
            $existCode = CountryCode::query()->where('id', $countryCode['id'])->first();
            if ($existCode) {
                $existCode->update([
                    'country_name' => $countryCode['country_name'],
                    'code' => $countryCode['code'],
                    'flag' => $countryCode['flag'],
                    'regex' => $countryCode['regex'],
                ]);
            } else {
                CountryCode::query()->create([
                    'id' => $countryCode['id'],
                    'country_name' => $countryCode['country_name'],
                    'code' => $countryCode['code'],
                    'flag' => $countryCode['flag'],
                    'regex' => $countryCode['regex'],
                ]);
            }
        }
    }
}
