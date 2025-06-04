<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicitacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $licitacao = [
            ['codigo_uasg' => '3354', 'numero_pregao' => '45345/08', 'objeto' => 'Descrição do objeto1' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '1234', 'numero_pregao' => '68575/08', 'objeto' => 'Descrição do objeto2' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '3324', 'numero_pregao' => '87546/08', 'objeto' => 'Descrição do objeto3' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '7665', 'numero_pregao' => '25457/08', 'objeto' => 'Descrição do objeto4' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '9835', 'numero_pregao' => '44354/08', 'objeto' => 'Descrição do objeto5' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '6378', 'numero_pregao' => '12345/08', 'objeto' => 'Descrição do objeto6' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '4535', 'numero_pregao' => '23426/08', 'objeto' => 'Descrição do objeto7' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '6666', 'numero_pregao' => '93414/08', 'objeto' => 'Descrição do objeto8' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '5555', 'numero_pregao' => '85635/08', 'objeto' => 'Descrição do objeto9' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '4444', 'numero_pregao' => '46267/08', 'objeto' => 'Descrição do objeto10' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '3333', 'numero_pregao' => '35424/08', 'objeto' => 'Descrição do objeto11' , 'data_proposta' => '2025-06-01 02:55:18'],
            ['codigo_uasg' => '2222', 'numero_pregao' => '34356/08', 'objeto' => 'Descrição do objeto12' , 'data_proposta' => '2025-06-01 02:55:18'],
        ];

        DB::table('licitacao')->insert($licitacao);
    }
}
