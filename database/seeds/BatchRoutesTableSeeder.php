<?php

use Illuminate\Database\Seeder;
use App\BatchRoute;

class BatchRoutesTableSeeder extends Seeder
{
    protected $routes = [
        [
            'Acrylic-Ba',
            'R-Acrylic Bail Monogram',
            '10',
            'Chain Metal Color,Chain length,Monogram Color,Monogram Size,Monogram',
        ],
        [
            'Acrylic-BB',
            'R-Acrylic Bail Block Monogram',
            '10',
            'Chain Metal Color,Chain length,Monogram Color,Monogram Size,Monogram',
        ],
        [
            'Acrylic-Bk',
            'R-Acrylic Block Monogram',
            '10',
            'Chain Metal Color,Chain length,Monogram Color,Monogram Size,Monogram',
        ],
        [
            'Acrylic-G',
            'R-Acrylic General',
            '10',
            'Enter Personalization up to 15 Characters,Please Enter Four Digits Year',
        ],
        [
            'Acrylic-M',
            'R-Acrylic Monogram',
            '10',
            'Chain Metal Color,Chain length,Monogram Color,Monogram Size,Monogram',
        ],
        [
            'Acrylic-MM',
            'R-ACRYLIC-MODERN-MONO-BAIL',
            '15',
            'Chain Metal Color,Chain length',
        ],
        [
            'Acrylic-N',
            'R-Acrylic Name Plate',
            '10',
            'Chain Metal Color,Chain length',
        ],
        [
            'AP-T220',
            'S-AP-T220 Pilliow Sublimation',
            '20',
            'Choose QTY,Enter Personalization 1 up to 10 character',
        ],
        [
            'BLOCK-CUFF',
            'J-BLOCK-CUFF',
            '30',
            'Chain length,Metal Color,Chain Type,',
        ],
        [
            'CGD-002613',
            'H-CGD-002613 Dog tag',
            '20',
            '',
        ],
        [
            'CGD-002912',
            'H-CGD-002912 Picture',
            '0',
            'Personalize First Line Up to 20 Letters,Personalize Second Line Up to 20 Letters',
        ],
        [
            'CGD-003151',
            'H-HOUSE CHOPSTICKS',
            '20',
            '',
        ],
        [
            'CGD-003672',
            'H-CGD-003672 Golf Pen',
            '5',
            '',
        ],
        [
            'CGD-023076',
            'H-CGD-023076 Baby bank',
            '5',
            'Personalize First Line Up to 20 Letters,Personalize Second Line Up to 20 Letters',
        ],
        [
            'CGD-069461',
            'R-CGD-069461 Red Laser Route',
            '10',
            'Monogram',
        ],
        [
            'CGD-56491',
            'H-CGD-56491 Pen set',
            '5',
            '',
        ],
        [
            'CHRMBRACLT',
            'J-CHARM BRACELET - JEWELRY',
            '20',
            'Charm 1 1,Charm 2 2,Charm 3 3,Enter # of Personalized Charms,Style,Enter Initial',
        ],
        [
            'Circle50',
            'J-Circle of Life 50',
            '50',
            'Chain length,Metal Color,Chain Type,',
        ],
        [
            'DM-53331',
            'R-DM-53331-MN Red Laser Route',
            '10',
            'Monogram',
        ],
        [
            'DM-G1351-I',
            'R-DM-G1351-I-1 Red Laser Route',
            '10',
            '',
        ],
        [
            'DM-G5000',
            'S-MEN TSHIRTS',
            '20',
            'Enter # of Kids,Select t-shirt size,Enter name 1 up to 10 letters,Enter name 2 up to 10 letters,Select kid design 1 1,Select kid design 2 2,Enter Father\'s name up to 10 letters',
        ],
        [
            'DM-TOT28',
            'S-DM-TOT28 SUBLIMATION',
            '20',
            '',
        ],
        [
            'DM-TOT3772',
            'DM-TOT3772 SUBLIMATION',
            '10',
            '',
        ],
        [
            'DMD-5450-B',
            'S-KIDS TSHIRS',
            '20',
            '',
        ],
        [
            'DMD-5450-G',
            'S-GIRLS TSHIRTS',
            '20',
            'Select Size,Enter Personalization up to 15 characters',
        ],
        [
            'DMD-5450-m',
            'S-DMD-5450 SUBLIMATION TEEN BOY',
            '20',
            'Select Size,Enter Personalization up to 15 characters,Enter Year,Enter Year up to 4 Characters',
        ],
        [
            'DW-2400B-G',
            'S-DW-2400B-GD KIDS-LONG SLEEVE',
            '10',
            'Color,Select Size,Style,Enter Personalization up to 12 characters',
        ],
        [
            'EMBRODERY',
            'EMBRODERY',
            '10',
            'Choose Thread Color,Monogram,Select Scarf Color',
        ],
        [
            'EN003-Bl2',
            'H-EN003-Bl2 Sunblast circle',
            '20',
            '',
        ],
        [
            'FC-A1168-C',
            'R-FC-A1168-C Red Laser Route',
            '10',
            'Enter Initial',
        ],
        [
            'FC-J40014',
            'R-FC-J40014 Red Laser Route',
            '10',
            'Enter First Line Personalization up to 12 characters,Enter Second Line Personalization up to 12 characters,Enter Third Line Personalization up to 12 characters',
        ],

    ];

    public function run ()
    {
        foreach ( $this->routes as $value ) {
            $i = 0;
            $batch_route = new BatchRoute();
            $batch_route->batch_code = $value[$i++];
            $route_name = $value[$i - 1];
            $batch_route->batch_route_name = $value[$i++];
            $batch_route->batch_max_units = $value[$i++];
            $batch_route->batch_options = $value[$i++];
            $batch_route->save();

            $number_of_stations = rand(1, 7);
            $end = 66-$number_of_stations;
            $start_from = rand( 1, $end);
            $batch_route->stations()
                        ->attach(range($start_from, $start_from + $number_of_stations - 1));
        }
    }
}
