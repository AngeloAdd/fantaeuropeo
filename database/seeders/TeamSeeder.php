<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Turchia',
            'img' => 'flags/turchia.svg',
            'sk' => 'TUR'
        ]);
        Team::create([
            'name' => 'Italia',
            'img' => 'flags/italia.svg',
            'sk' => 'ITA'
        ]);
        Team::create([
            'name' => 'Galles',
            'img' => 'flags/galles.svg',
            'sk' => 'WAL'
        ]);
        Team::create([
            'name' => 'Svizzera',
            'img' => 'flags/svizzera.svg',
            'sk' => 'SUI'
        ]);
        Team::create([
            'name' => 'Danimarca',
            'img' => 'flags/danimarca.svg',
            'sk' => 'DEN'
        ]);
        Team::create([
            'name' => 'Finlandia',
            'img' => 'flags/finlandia.svg',
            'sk' => 'FIN'
        ]);
        Team::create([
            'name' => 'Belgio',
            'img' => 'flags/belgio.svg',
            'sk' => 'BEL'
        ]);
        Team::create([
            'name' => 'Russia',
            'img' => 'flags/russia.svg',
            'sk' => 'RUS'
        ]);
        Team::create([
            'name' => 'Olanda',
            'img' => 'flags/olanda.svg',
            'sk' => 'NED'
        ]);
        Team::create([
            'name' => 'Ucraina',
            'img' => 'flags/ucraina.svg',
            'sk' => 'UKR'
        ]);
        Team::create([
            'name' => 'Austria',
            'img' => 'flags/austria.svg',
            'sk' => 'AUT'
        ]);
        Team::create([
            'name' => 'Macedonia del Nord',
            'img' => 'flags/mdn.svg',
            'sk' => 'MKD'
        ]);
        Team::create([
            'name' => 'Inghilterra',
            'img' => 'flags/inghilterra.svg',
            'sk' => 'ENG'
        ]);
        Team::create([
            'name' => 'Croazia',
            'img' => 'flags/croazia.svg',
            'sk' => 'CRO'
        ]);
        Team::create([
            'name' => 'Scozia',
            'img' => 'flags/scozia.svg',
            'sk' => 'SCO'
        ]);
        Team::create([
            'name' => 'Rep. Ceca',
            'img' => 'flags/repceca.svg',
            'sk' => 'CZE'
        ]);
        Team::create([
            'name' => 'Spagna',
            'img' => 'flags/spagna.svg',
            'sk' => 'ESP'
        ]);
        Team::create([
            'name' => 'Svezia',
            'img' => 'flags/svezia.svg',
            'sk' => 'SWE'
        ]);
        Team::create([
            'name' => 'Polonia',
            'img' => 'flags/polonia.svg',
            'sk' => 'POL'
        ]);
        Team::create([
            'name' => 'Slovacchia',
            'img' => 'flags/slovacchia.svg',
            'sk' => 'SVK'
        ]);
        Team::create([
            'name' => 'Ungheria',
            'img' => 'flags/ungheria.svg',
            'sk' => 'HUN'
        ]);
        Team::create([
            'name' => 'Portogallo',
            'img' => 'flags/portogallo.svg',
            'sk' => 'POR'
        ]);
        Team::create([
            'name' => 'Francia',
            'img' => 'flags/francia.svg',
            'sk' => 'FRA'
        ]);
        Team::create([
            'name' => 'Germania',
            'img' => 'flags/germania.svg',
            'sk' => 'GER'
        ]);
    }
}
