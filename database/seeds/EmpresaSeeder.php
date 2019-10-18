<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert(['estado_id' => 3, 'nome_fantasia' => 'Americanas', 'cnpj' => 'xx.xxx.xxx/xxxx-xx']);
        DB::table('empresas')->insert(['estado_id' => 8, 'nome_fantasia' => 'Ponto Frio', 'cnpj' => '12.xxx.xxx/xxxx-xx']);
        DB::table('empresas')->insert(['estado_id' => 18, 'nome_fantasia' => 'Saraiva', 'cnpj' => '32.xxx.xxx/xxxx-xx']);
        DB::table('empresas')->insert(['estado_id' => 14, 'nome_fantasia' => 'Casas bahia', 'cnpj' => '51.xxx.xxx/xxxx-xx']);
    }
}
