<?php

namespace Database\Seeders;

use App\Models\University;
use Carbon\Carbon;
use http\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed canadian universities
        $response_canada_uni = Http::get('http://universities.hipolabs.com/search?country=Canada');
        $canada_universities = $response_canada_uni->json();
        foreach ($canada_universities as $canada_university) {
            $d = $canada_university['name'];
            University::create([
                'name' => $canada_university['name'],
                'province' => $canada_university['state-province'],
                'country' => $canada_university['alpha_two_code'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // seed US universities
        $response_us_uni = Http::get('http://universities.hipolabs.com/search?country=United%20States');
        $us_universities = $response_us_uni->json();
        foreach ($us_universities as $us_university) {
            University::create([
                'name' => $us_university['name'],
                'province' => $us_university['state-province'],
                'country' => $us_university['alpha_two_code'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
