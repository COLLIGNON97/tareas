<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    /**#
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nombre_categoria' => 'Personal']);
        DB::table('categorias')->insert(['nombre_categoria' => 'Escuela']);

        /*Categoria::create([
            'nombre_categoria' => 'Personal'
        ]);*/
    }
}
