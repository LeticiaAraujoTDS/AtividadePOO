<?php

require_once("modelo/Ator.php");
require_once("modelo/Autor.php");
require_once("modelo/Musico.php");
require_once("dao/ArtistaDAO.php");

//Teste conexao

/*require_once("util/Conexao.php");
$con = Conexao::getCon();
print_r($con);*/

do {
    
    print "\n\n--- CADASTRO ARTISTAS------------\n";
print "1 - Cadastrar Ator --------\n";
print "2 - Cadastrar Autor --------\n";
print "3 - Cadastrar Cantor --------\n";
print "4 - Listar Artista --------------\n";
print "5 - Buscar Artista --------------\n";
print "6 - Excluir Artista -------------\n";
print "0 - Sair ------------------------\n";

$opcao = readline("Informe a opção: ");

switch ($opcao) {
    case 1:
        $artista = new Ator();
        $artista->setNome(readline("Informe o nome do ator: "));
        $artista->setNomeArtistico(readline("Informe o nome do artistico do ator: "));
        $artista->setGeneroPrincipal(readline("Informe o gênero principal do ator: "));
        $artista->setIdade(readline("Informe a idade do ator: "));
        $artista->setTipoMidia(readline("Informe o tipo de midia do ator: "));
        $artista->setNumParticipacoes(readline("Informe o número de participações de ator: "));

        $artistaDAO = new ArtistaDAO();
        $artistaDAO->cadastrarArtista($artista);

        print "Ator cadastrado com sucesso!\n";
        break;

    case 2:
        $artista = new Autor();
        $artista->setNome(readline("Informe o nome do autor: "));
        $artista->setNomeArtistico(readline("Informe o nome do artistico do autor: "));
        $artista->setGeneroPrincipal(readline("Informe o gênero principal do autor: "));
        $artista->setIdade(readline("Informe a idade do autor: "));
        $artista->setNumObras(readline("Informe o número de obras do autor: "));
        $artista->setObraMaisFamosa(readline("Informe a obra mais famosa do autor: "));

        $artistaDAO = new ArtistaDAO();
        $artistaDAO->cadastrarArtista($artista);

        print "Autor cadastrado com sucesso!\n";
        break;

    case 3:
        $artista = new Musico();
        $artista->setNome(readline("Informe o nome do musico: "));
        $artista->setNomeArtistico(readline("Informe o nome do artistico do musico: "));
        $artista->setGeneroPrincipal(readline("Informe o gênero principal do musico: "));
        $artista->setIdade(readline("Informe a idade do musico: "));
        $artista->setInstrumento(readline("Informe o tipo de instrumento do musico: "));
        $artista->setNumAlbuns(readline("Informe o número de albuns do musico: "));

        $artistaDAO = new ArtistaDAO();
        $artistaDAO->cadastrarArtista($artista);

        print "Musico cadastrado com sucesso!\n";
        break;

    case 4:
        $artistaDAO = new ArtistaDAO();
        $artistas = $artistaDAO->listarArtistas();

        print "Lista de artistas:\n\n";
        foreach ($artistas as $a) {
          print $a;
        }
        break;

           

    case 5:
        break;

    case 0:
        print "Programa encerrado!\n";
        break;

    default:
        print "Opção inválida!\n";
        break;
}

} while ($opcao != 0);