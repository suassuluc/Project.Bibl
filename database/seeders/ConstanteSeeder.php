<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dadosManuais = [
            ['nome' => 'Livro', 'codigo' => 1, 'constante' => 'Tipologia', 'status' => true, 'arquivos' => false],
            ['nome' => 'Processo', 'codigo' => 2, 'constante' => 'Tipologia', 'status' => true, 'arquivos' => false],
            ['nome' => 'Revista/Periódico', 'codigo' => 3, 'constante' => 'Tipologia', 'status' => true, 'arquivos' => true],
            ['nome' => 'Dissertação/Tese', 'codigo' => 5, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Monografia', 'codigo' => 6, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'CD', 'codigo' => 8, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Catálogo', 'codigo' => 9, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'guia', 'codigo' => 10, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Caderno De Resumos', 'codigo' => 11, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Guia de Diretrizes', 'codigo' => 12, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Programa', 'codigo' => 13, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Guia de Protocolo', 'codigo' => 14, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Projetos', 'codigo' => 15, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Cursos', 'codigo' => 16, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Relatório de Atividade', 'codigo' => 17, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Atlas', 'codigo' => 18, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Anais', 'codigo' => 19, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Regionalismo', 'codigo' => 20, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Solicitações', 'codigo' => 21, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'DVD', 'codigo' => 22, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Periódico', 'codigo' => 23, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Documentos/Oficios', 'codigo' => 24, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Kit de Livros Fapema', 'codigo' => 25, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Retiradas de Livros Para Consultores', 'codigo' => 26, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Livros Para Consultores', 'codigo' => 27, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Coletânea', 'codigo' => 28, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Livros Para atender reuniões', 'codigo' => 29, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Oficios/documentos DAF', 'codigo' => 30, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Memória Permanete Livros', 'codigo' => 31, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'convênio', 'codigo' => 32, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Documentos jurídicos/contratos Fapema', 'codigo' => 33, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Documentos jurídicos finalizados', 'codigo' => 34, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'oficios e notificações', 'codigo' => 35, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Atas', 'codigo' => 36, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'livro Digital', 'codigo' => 37, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Enciclopedia', 'codigo' => 38, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Livros Eventos Externos', 'codigo' => 39, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ['nome' => 'Curso', 'codigo' => 40, 'constante' => 'Tipologia', 'status' => false, 'arquivos' => true],
            ///
            ['nome' => 'Português', 'codigo' => 1, 'constante' => 'Idioma', 'status' => false, 'arquivos' => false],
            ['nome' => 'ingles', 'codigo' => 2, 'constante' => 'Idioma', 'status' => false, 'arquivos' => false],
            ['nome' => 'Espanhol', 'codigo' => 3, 'constante' => 'Idioma', 'status' => false, 'arquivos' => false],
            ///
            ['nome' => 'Informática', 'codigo' => 1, 'constante' => 'Assunto', 'status' => false, 'arquivos' => true],
            ['nome' => 'Humanas', 'codigo' => 2, 'constante' => 'Assunto', 'status' => false, 'arquivos' => true],
            ['nome' => 'Ciência', 'codigo' => 3, 'constante' => 'Assunto', 'status' => false, 'arquivos' => true],
            ['nome' => 'Ciência da Informação', 'codigo' => 4, 'constante' => 'Assunto', 'status' => false, 'arquivos' => true],
            ['nome' => 'Documentação', 'codigo' => 5, 'constante' => 'Assunto', 'status' => false, 'arquivos' => true],
            ['nome' => 'Biblioteconomia', 'codigo' => 6, 'constante' => 'Assunto', 'status' => false, 'arquivos' => true],
            ['nome' => 'Teologia', 'codigo' => 7, 'constante' => 'Assunto', 'status' => false, 'arquivos' => true],
            ['nome' => 'Ciências Sociais', 'codigo' => 8, 'constante' => 'Assunto', 'status' => false, 'arquivos' => true],

        ];

        foreach ($dadosManuais as $dado) {
            DB::table('constante')->updateOrInsert(
                ['nome' => $dado['nome'], 'codigo' => $dado['codigo']],
                $dado
            );
        }
    }
}
