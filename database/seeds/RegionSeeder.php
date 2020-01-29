<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $regions = [
            [1,'Arica y Parinacota','XV'],
            [2,'Tarapacá','I'],
            [3,'Antofagasta','II'],
            [4,'Atacama','III'],
            [5,'Coquimbo','IV'],
            [6,'Valparaiso','V'],
            [7,'Metropolitana de Santiago','RM'],
            [8,'Libertador General Bernardo O\'Higgins','VI'],
            [9,'Maule','VII'],
            [10,'Biobío','VIII'],
            [11,'La Araucanía','IX'],
            [12,'Los Ríos','XIV'],
            [13,'Los Lagos','X'],
            [14,'Aisén del General Carlos Ibáñez del Campo','XI'],
            [15,'Magallanes y de la Antártica Chilena','XII'],
            [16,'Ñuble','XVI']
        ];

        $regions = array_map(function($region) use ($now) {
            return [
                'id' => $region[0],
                'name' => $region[1],
                'ordinal' => $region[2],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $regions);

        \DB::table('regions')->insert($regions);
    }
}
