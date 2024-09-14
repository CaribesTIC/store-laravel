<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Entities\GeoLocation\State;

class StatesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        State::create([
            'id' => 1,
            'description' => 'ANZOATEGUI',
            'latitud' => '10.13',
            'longitud' => '-64.72',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '8;16;20;22',
            'siex_estado' => '03  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 2,
            'description' => 'AMAZONAS',
            'latitud' => '5.21',
            'longitud' => '-66.23',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '3;16',
            'siex_estado' => '02  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 3,
            'description' => 'APURE',
            'latitud' => '7.6',
            'longitud' => '-67.43',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '2;5;8;13;16',
            'siex_estado' => '04  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 4,
            'description' => 'ARAGUA',
            'latitud' => '10.33',
            'longitud' => '-67.47',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '8;11;15;17',
            'siex_estado' => '05  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 5,
            'description' => 'BARINAS',
            'latitud' => '8.60',
            'longitud' => '-70.25',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '3;8;10;12;13;14;18',
            'siex_estado' => '06  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 6,
            'description' => 'DISTRITO CAPITAL',
            'latitud' => '10.50',
            'longitud' => '-66.90',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '11;15',
            'siex_estado' => '01  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 7,
            'description' => 'FALCON',
            'latitud' => '11.42',
            'longitud' => '-69.68',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '9;17;23;24',
            'siex_estado' => '11  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 8,
            'description' => 'GUARICO',
            'latitud' => '9.45',
            'longitud' => '-67.33',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '1;3;4;5;11;16;17;18',
            'siex_estado' => '12  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 9,
            'description' => 'LARA',
            'latitud' => '10.03',
            'longitud' => '-69.34',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '7;12;14;23;24',
            'siex_estado' => '13  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 10,
            'description' => 'MERIDA',
            'latitud' => '8.59',
            'longitud' => '-71.14',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '5;13;14;24',
            'siex_estado' => '14  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 11,
            'description' => 'MIRANDA',
            'latitud' => '10.34',
            'longitud' => '-67.02',
            'egoogle' => '', 'coordinates' => '',
            'colindante' => '4;6;1;8;15',
            'siex_estado' => '15  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 12,
            'description' => 'PORTUGUESA',
            'latitud' => '9.05',
            'longitud' => '-69.75',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '5;9;14;18',
            'siex_estado' => '18  ',
            'geo_country_id' => 206
        ]);
        
        State::create([
            'id' => 13,
            'description' => 'TACHIRA',
            'latitud' => '7.792',
            'longitud' => '-72.20',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '3;5;10;24',
            'siex_estado' => '20  ',
            'geo_country_id' => 206]
        );

        State::create([
            'id' => 14,
            'description' => 'TRUJILLO',
            'latitud' => '9.31',
            'longitud' => '-70.60',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '5;9;10;12;24',
            'siex_estado' => '21  ',
            'geo_country_id' => 206]
        );

        State::create([
            'id' => 15,
            'description' => 'VARGAS',
            'latitud' => '10.59',
            'longitud' => '-66.94',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '4;6;11',
            'siex_estado' => '24  ',
            'geo_country_id' => 206]
        );

        State::create([
            'id' => 16,
            'description' => 'BOLIVAR',
            'latitud' => '7.50',
            'longitud' => '-64.43',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '1;2;3;18;19;20',
            'siex_estado' => '07  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 17,
            'description' => 'CARABOBO',
            'latitud' => '10.16',
            'longitud' => '-67.98',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '4;7;8;18;23',
            'siex_estado' => '08  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 18,
            'description' => 'COJEDES',
            'latitud' => '9.64',
            'longitud' => '-68.58',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '5;8;9;12;17;23',
            'siex_estado' => '09  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 19,
            'description' => 'DELTA AMACURO',
            'latitud' => '9.06',
            'longitud' => '-62.05',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '16;20',
            'siex_estado' => '10  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 20,
            'description' => 'MONAGAS',
            'latitud' => '9.74',
            'longitud' => '-63.18',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '16;19',
            'siex_estado' => '16  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 21,
            'description' => 'NUEVA ESPARTA',
            'latitud' => '10.96',
            'longitud' => '-64.02',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '1;4;7;11;15;17;19;20;22;24;14',
            'siex_estado' => '17  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 22,
            'description' => 'SUCRE',
            'latitud' => '10.47',
            'longitud' => '-63.43',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '1;20;21',
            'siex_estado' => '19  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 23,
            'description' => 'YARACUY',
            'latitud' => '10.23',
            'longitud' => '-68.70',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '7;9;18;17',
            'siex_estado' => '22  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 24,
            'description' => 'ZULIA',
            'latitud' => '9.85',
            'longitud' => '-71.55',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '7;9;10;13;14',
            'siex_estado' => '23  ',
            'geo_country_id' => 206
        ]);

        State::create([
            'id' => 99,
            'description' => 'Sin descripción',
            'latitud' => '0',
            'longitud' => '0',
            'egoogle' => '',
            'coordinates' => '',
            'colindante' => '0',
            'siex_estado' => '0   ',
            'geo_country_id' => 0
        ]);
        
    }
    
}
