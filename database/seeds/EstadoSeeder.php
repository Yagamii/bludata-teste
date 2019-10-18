<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert(['nome' => 'Acre', 'sigla' => 'AC']);
        DB::table('estados')->insert(['nome' => 'Alagoas', 'sigla' => 'AL']);
        DB::table('estados')->insert(['nome' => 'Amazonas', 'sigla' => 'AM']);
        DB::table('estados')->insert(['nome' => 'Amapá', 'sigla' => 'AP']);
        DB::table('estados')->insert(['nome' => 'Bahia', 'sigla' => 'BA']);
        DB::table('estados')->insert(['nome' => 'Ceará', 'sigla' => 'CE']);
        DB::table('estados')->insert(['nome' => 'Distrito Federal', 'sigla' => 'DF']);
        DB::table('estados')->insert(['nome' => 'Espírito Santo', 'sigla' => 'ES']);
        DB::table('estados')->insert(['nome' => 'Goiás', 'sigla' => 'GO']);
        DB::table('estados')->insert(['nome' => 'Maranhão', 'sigla' => 'MA']);
        DB::table('estados')->insert(['nome' => 'Minas Gerais', 'sigla' => 'MG']);
        DB::table('estados')->insert(['nome' => 'Mato Grosso do Sul', 'sigla' => 'MS']);
        DB::table('estados')->insert(['nome' => 'Mato Grosso', 'sigla' => 'MT']);
        DB::table('estados')->insert(['nome' => 'Pará', 'sigla' => 'PA']);
        DB::table('estados')->insert(['nome' => 'Paraiba', 'sigla' => 'PB']);
        DB::table('estados')->insert(['nome' => 'Pernambuco', 'sigla' => 'PE']);
        DB::table('estados')->insert(['nome' => 'Piauí', 'sigla' => 'PI']);
        DB::table('estados')->insert(['nome' => 'Paraná', 'sigla' => 'PR']);
        DB::table('estados')->insert(['nome' => 'Rio de Janeiro', 'sigla' => 'RJ']);
        DB::table('estados')->insert(['nome' => 'Rio Grande do Norte', 'sigla' => 'RN']);
        DB::table('estados')->insert(['nome' => 'Rondônia', 'sigla' => 'RO']);
        DB::table('estados')->insert(['nome' => 'Roraima', 'sigla' => 'RR']);
        DB::table('estados')->insert(['nome' => 'Rio Grande do Sul', 'sigla' => 'RS']);
        DB::table('estados')->insert(['nome' => 'Santa Catarina', 'sigla' => 'SC']);
        DB::table('estados')->insert(['nome' => 'Sergipe', 'sigla' => 'SE']);
        DB::table('estados')->insert(['nome' => 'São Paulo', 'sigla' => 'SP']);
        DB::table('estados')->insert(['nome' => 'Tocantins', 'sigla' => 'TO']);

    }
}
