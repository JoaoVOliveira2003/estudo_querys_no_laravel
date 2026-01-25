<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function selectDados()
    {
        /*
    |--------------------------------------------------------------------------
    | SELECT BÁSICO
    |--------------------------------------------------------------------------
    */

        // Todos os registros (objeto)
        // $dados = DB::table('clients')->get();

        // Todos os registros (array associativo)
        // $dados = DB::table('clients')->get()->map(fn($item) => (array) $item);


        /*
    |--------------------------------------------------------------------------
    | COLUNAS
    |--------------------------------------------------------------------------
    */

        // Apenas colunas específicas
        // $dados = DB::table('clients')->get(['id', 'client_name']);

        // Apenas uma coluna (array simples)
        // $dados = DB::table('clients')->pluck('client_name');

        // Exibir apenas uma coluna manualmente
        // foreach ($dados as $dado) {
        //     echo $dado->client_name . '<br>';
        // }


        /*
    |--------------------------------------------------------------------------
    | PRIMEIRO, ÚLTIMO E FIND
    |--------------------------------------------------------------------------
    */

        // Primeiro registro
        // $dados = DB::table('clients')->first();

        // Último registro
        // $dados = DB::table('clients')->get()->last();

        // Buscar por ID
        // $dados = DB::table('clients')->find(10);


        /*
    |--------------------------------------------------------------------------
    | WHERE (AND / OR)
    |--------------------------------------------------------------------------
    */

        // AND (padrão)
        // $dados = DB::table('clients')
        //     ->where('id', '>', 10)
        //     ->where('client_name', 'like', 'A%')
        //     ->get();

        // WHERE em array
        // $dados = DB::table('clients')->where([
        //     ['id', '>', 10],
        //     ['client_name', 'like', 'A%']
        // ])->get();

        // OR com agrupamento
        // $dados = DB::table('products')
        //     ->where('price', '>', 80)
        //     ->orWhere(function (Builder $query) {
        //         $query->where('product_name', 'banana')
        //               ->orWhere('product_name', 'cereja');
        //     })
        //     ->get();

        // NOT
        // $dados = DB::table('clients')->whereNot('id', '>=', 10)->get();


        /*
    |--------------------------------------------------------------------------
    | INTERVALOS E LISTAS
    |--------------------------------------------------------------------------
    */

        // Between
        // $dados = DB::table('products')->whereBetween('price', [25, 50])->get();
        // $dados = DB::table('products')->whereNotBetween('price', [25, 50])->get();

        // In
        // $dados = DB::table('products')->whereIn('id', [1, 2])->get();


        /*
    |--------------------------------------------------------------------------
    | FUNÇÕES DE AGREGADO
    |--------------------------------------------------------------------------
    */

        // $count = DB::table('products')->count();
        // $max   = DB::table('products')->max('price');
        // $min   = DB::table('products')->min('price');
        // $avg   = DB::table('products')->avg('price');
        // $sum   = DB::table('products')->sum('price');

        // dd([
        //     'count' => $count,
        //     'max'   => $max,
        //     'min'   => $min,
        //     'avg'   => $avg,
        //     'sum'   => $sum,
        // ]);


        /*
    |--------------------------------------------------------------------------
    | ORDER, LIMIT
    |--------------------------------------------------------------------------
    */

        // $dados = DB::table('clients')
        //     ->where('id', '>=', 10)
        //     ->orderBy('client_name', 'desc')
        //     ->get();

        // $dados = DB::table('clients')->limit(3)->get();


        /*
    |--------------------------------------------------------------------------
    | EXIBIÇÃO
    |--------------------------------------------------------------------------
    */

        // $this->mostrarEmTabela($dados);
    }

    public function insertDado()
    {
        $clienteNovo = [
            'client_name' => 'joao',
            'email' => 'email'
        ];
        DB::table('clients')->insert($clienteNovo);
    }

    public function insertMultiplos()
    {
        $clientes = [
            [
                'client_name' => 'Maria',
                'email' => 'maria@email.com',
            ],
            [
                'client_name' => 'Carlos',
                'email' => 'carlos@email.com',
            ],
        ];

        DB::table('clients')->insert($clientes);
    }

    public function insertGetId()
    {
        $id = DB::table('clients')->insertGetId([
            'client_name' => 'Ana',
            'email'       => 'ana@email.com',
        ]);

        dd($id);
    }

    public function updateDado()
    {
        DB::table('clients')
            ->where('id', 1)
            ->update([
                'client_name' => 'João Atualizado',
                'email' => 'joao_novo@email.com',
            ]);
    }

    public function deleteDado()
    {
        DB::table('clients')
            ->where('id', 1)
            ->delete();
    }

    public function deleteTodos()
    {
        DB::table('clients')->delete();
    }

    public function truncateTabela()
    {
        DB::table('clients')->truncate();
    }


    public function mostrarCruDados($dados)
    {
        echo '<pre>';
        print_r($dados);
        echo '<pre>';
    }

    public function mostrarEmTabela($dados)
    {
        if (empty($dados)) {
            echo 'Nenhum dado para mostrar.';
            return;
        }

        $retorno = '';
        $retorno .= '<table border="1">';

        $retorno .= '<tr>';
        foreach ($dados[0] as $key => $value) {
            $retorno .= '<th>' . htmlspecialchars($key) . '</th>';
        }
        $retorno .= '</tr>';

        foreach ($dados as $row) {
            $retorno .= '<tr>';
            foreach ($row as $valor) {
                $retorno .= '<td>' . htmlspecialchars($valor) . '</td>';
            }
            $retorno .= '</tr>';
        }

        $retorno .= '</table>';

        echo $retorno;
    }
}
