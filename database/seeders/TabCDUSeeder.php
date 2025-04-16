<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TabCDUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cduData = [
            // Seção 0 - Generalidades
            ['nome' => 'Ciência e Conhecimento. Organização. Informática. Informação. Documentação. Biblioteconomia. Instituições. Publicações', 'codigo' => '0', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Prolegómenos. Fundamentos do conhecimento e da cultura. Propadéutica', 'codigo' => '00', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Bibliografia e bibliografias. Catálogos', 'codigo' => '01', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Biblioteconomia', 'codigo' => '02', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Obras gerais de referência', 'codigo' => '030', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Publicações periódicas, periódicos', 'codigo' => '050', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Organizações em geral', 'codigo' => '06', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Jornais. Imprensa', 'codigo' => '070', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Poligrafias. Obras de autoria colectiva', 'codigo' => '08', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Manuscritos. Obras raras e notáveis', 'codigo' => '09', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            // Seção 1 - Filosofia. Psicologia
            ['nome' => 'Filosofia. Psicologia', 'codigo' => '1', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Natureza e âmbito da filosofia', 'codigo' => '101', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Metafísica', 'codigo' => '11', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Metafísica especial', 'codigo' => '122/129', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Filosofia da mente e do espírito. Metafísica da vida espiritual', 'codigo' => '13', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Sistemas e pontos de vista filosóficos', 'codigo' => '14', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Psicologia', 'codigo' => '159.9', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Lógica. Epistemologia. Teoria do conhecimento. Metodologia da lógica', 'codigo' => '16', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Filosofia moral. Ética. Filosofia prática', 'codigo' => '17', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            // Seção 2 - Religião. Teologia
            ['nome' => 'Religião. Teologia', 'codigo' => '2', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Teoria e filosofia da religião. Natureza da religião. Fenômeno da religião', 'codigo' => '2-1', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Provas da religião', 'codigo' => '2-2', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Pessoas na religião', 'codigo' => '2-3', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Atividades religiosas. Práticas religiosas', 'codigo' => '2-4', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Veneração. Culto. Rituais e cerimônias', 'codigo' => '2-5', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Processos em religião', 'codigo' => '2-6', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Organização e administração religiosa', 'codigo' => '2-7', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Religiões segundo as suas características', 'codigo' => '2-8', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'História da fé, religião, denominação ou igreja', 'codigo' => '2-9', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Sistemas religiosos. Religiões e crenças religiosas', 'codigo' => '21/29', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Religiões pré-históricas e primitivas', 'codigo' => '21', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Religiões originárias do Extremo Oriente', 'codigo' => '22', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Religiões originárias do sub-continente indiano. Hinduísmo em sentido lato', 'codigo' => '23', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Budismo', 'codigo' => '24', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Religiões da antiguidade. Cultos e religiões menores', 'codigo' => '25', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Judaísmo', 'codigo' => '26', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Cristianismo. Igrejas e denominações cristãs', 'codigo' => '27', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Islamismo', 'codigo' => '28', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Movimentos espirituais modernos', 'codigo' => '29', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            // Seção 3 - Ciências Sociais
            ['nome' => 'Métodos das ciências sociais', 'codigo' => '303', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Questões sociais. Prática social. Prática cultural. Modo de vida (Lebensweise)', 'codigo' => '304', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Estudos do gênero', 'codigo' => '305', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Sociografia. Estudos descritivos da sociedade (qualitativos e quantitativos)', 'codigo' => '308', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Estatística como ciência. Teoria estatística', 'codigo' => '311', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Sociedade', 'codigo' => '314/316', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Política', 'codigo' => '32', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Economia. Ciência econômica', 'codigo' => '33', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Direito. Jurisprudência', 'codigo' => '34', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Administração pública. Governo. Assuntos militares', 'codigo' => '35', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Proteção das necessidades materiais e mentais da vida. Serviço social. Ajuda social. Segurança social. Habitação. Consumo. Seguros', 'codigo' => '36', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Educação', 'codigo' => '37', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Antropologia cultural. Etnologia. Etnografia. Usos e costumes. Tradições. Modo de vida. Folclore', 'codigo' => '39', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            // Seção 5 - Matemática. Ciências Naturais
            ['nome' => 'Ciência ambiental. Conservação dos recursos naturais. Ameaças ao ambiente e proteção contra as mesmas', 'codigo' => '502/504', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Matemática', 'codigo' => '51', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Astronomia. Astrofísica. Investigação espacial. Geodésia', 'codigo' => '52', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Física', 'codigo' => '53', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Química. Cristalografia. Mineralogia', 'codigo' => '54', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Ciências da terra. Ciências geológicas', 'codigo' => '55', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Paleontologia', 'codigo' => '56', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Ciências biológicas em geral', 'codigo' => '57', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Botânica', 'codigo' => '58', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Zoologia', 'codigo' => '59', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            // Seção 6 - Ciências Aplicadas. Medicina. Tecnologia
            ['nome' => 'Biotecnologia', 'codigo' => '60', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Ciências médicas', 'codigo' => '61', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Engenharia. Tecnologia em geral', 'codigo' => '62', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Agricultura. Ciências agrárias e técnicas relacionadas. Silvicultura. Explorações agrícolas. Exploração da vida selvagem', 'codigo' => '63', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Economia doméstica. Ciência doméstica', 'codigo' => '64', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Indústrias da comunicação e dos transportes. Contabilidade. Gestão de empresas. Relações públicas', 'codigo' => '65', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Tecnologia química. Indústrias químicas e relacionadas', 'codigo' => '66', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Indústria, artes industriais e ofícios diversos', 'codigo' => '67', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Indústrias, artes e ofícios de artigos acabados ou montados', 'codigo' => '68', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Indústria da construção. Materiais para construção. Procedimentos e práticas de construção', 'codigo' => '69', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            // Seção 7 - Arte. Recreação. Entretenimento. Desporto
            ['nome' => 'Subdivisões auxiliares especiais para teoria, técnicas, periódicos, estilos e apresentação da arte', 'codigo' => '7.01/.09', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Planejamento territorial, físico. Planejamento regional, urbano e rural. Paisagens, parques, jardins', 'codigo' => '71', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Arquitetura', 'codigo' => '72', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Artes plásticas', 'codigo' => '73', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Desenho. Design. Artes e ofícios aplicados', 'codigo' => '74', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Pintura', 'codigo' => '75', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Artes gráficas. Gravura', 'codigo' => '76', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Fotografia e processos similares', 'codigo' => '77', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Música', 'codigo' => '78', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Divertimentos. Espetáculos. Jogos. Desportos', 'codigo' => '79', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            // Seção 8 - Língua. Linguística. Literatura
            ['nome' => 'Questões gerais referentes à linguística e à literatura. Filologia', 'codigo' => '80', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Linguística e línguas', 'codigo' => '81', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Literatura', 'codigo' => '82', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            // Seção 9 - Geografia. Biografia. História
            ['nome' => 'Arqueologia. Pré-história. Vestígios culturais. Estudos regionais', 'codigo' => '902/908', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Geografia. Exploração da terra e de países. Viagens. Geografia regional', 'codigo' => '91', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'Estudos biográficos. Genealogia. Heráldica. Bandeiras', 'codigo' => '92', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
            ['nome' => 'História', 'codigo' => '93/94', 'constante' => 'Assunto', 'status' => true, 'arquivos' => false],
        ];
        foreach ($cduData as $data) {
            DB::table('constante')->updateOrInsert(
                ['nome' => $data['nome'], 'constante' => 'Assunto'],
                [
                    'nome' => $data['nome'],
                    'codigo' => $data['codigo'],
                    'constante' => $data['constante'],
                    'status' => $data['status'],
                    'arquivos' => $data['arquivos'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
