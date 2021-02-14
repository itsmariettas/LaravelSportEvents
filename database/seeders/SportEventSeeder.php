<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SportEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('sport_events')->get()->count() == 0) {

            $records = [
                [
                    'Le Tour de France',
                    Carbon::create('2021', '10', '10'),
                    2,
                    DB::table('organizers')->where('name', '=', 'Le Tour de France')->select('id')->first(),
                    DB::table('sports')->where('type', '=', 'Cycling')->select('id')->first(),
                    'https://cdn.mos.cms.futurecdn.net/dbc43d962a295cef121b2634576efc47.jpg'
                ],
                [
                    'NBA',
                    Carbon::create('2021', '02', '02'),
                    7,
                    DB::table('organizers')->where('name', '=', 'NBA')->select('id')->first(),
                    DB::table('sports')->where('type', '=', 'Basketball')->select('id')->first(),
                    'https://newscdn2.weigelbroadcasting.com/dJUEH-1573075860-150539-blog-bc_nba_abc.jpg'
                ],
                [
                    'FIFA World Cup',
                    Carbon::create('2021', '06', '07'),
                    10,
                    DB::table('organizers')->where('name', '=', 'FIFA')->select('id')->first(),
                    DB::table('sports')->where('type', '=', 'Football')->select('id')->first(),
                    'https://img.fifa.com/image/upload/t_l1/qmkit5gpe6tvsubbecrw.jpg'
                ]
            ];

            $now = date('Y-m-d H:i:s');

            for ($index = 0; $index < count($records); $index++) {
                DB::table('sport_events')->insert(
                    array(
                        'name' => $records[$index][0],
                        'start_date' => $records[$index][1],
                        'duration_in_days' => $records[$index][2],
                        'organizer_id' => $records[$index][3]->id,
                        'sport_id' => $records[$index][4]->id,
                        'image' => $records[$index][5],
                        'created_at' => $now,
                        'updated_at' => $now
                    )
                );
            }
        } else {
            echo "\r\n\e[31m Sport Events table is not empty.  \r\n ";
        }
    }
}