<?php

require_once("modelo/Ator.php");
require_once("modelo/Autor.php");
require_once("modelo/Musico.php");
require_once("dao/ArtistaDAO.php");

//Teste conexao

// require_once("util/Conexao.php");
// $con = Conexao::getCon();
// print_r($con);

do {

    print "\n\n--- CADASTRO ARTISTAS------\n";
    print "1 - Cadastrar Ator --------\n";
    print "2 - Cadastrar Autor -------\n";
    print "3 - Cadastrar Cantor ------\n";
    print "4 - Listar Artista --------\n";
    print "5 - Buscar Artista --------\n";
    print "6 - Excluir Artista -------\n";
    print "0 - Sair ------------------\n";

    $opcao = readline("Informe a opção: ");

    switch ($opcao) {
        case 1:
            $artista = new Ator();
            $artista->setNome(readline("Informe o nome do ator: "));
            $artista->setNomeArtistico(readline("Informe o nome do artístico do ator: "));
            $artista->setGeneroPrincipal(readline("Informe o gênero principal do ator: "));
            $artista->setIdade(readline("Informe a idade do ator: "));
            $artista->setTipoMidia(readline("Informe o tipo de mídia do ator: "));
            $artista->setNumParticipacoes(readline("Informe o número de participações(trabalhos) do ator: "));

            $artistaDAO = new ArtistaDAO();
            $artistaDAO->cadastrarArtista($artista);

            print "Ator cadastrado com sucesso!\n";
            break;

        case 2:
            $artista = new Autor();
            $artista->setNome(readline("Informe o nome do autor: "));
            $artista->setNomeArtistico(readline("Informe o nome do artístico do autor: "));
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
            $artista->setNome(readline("Informe o nome do músico: "));
            $artista->setNomeArtistico(readline("Informe o nome do artístico do músico: "));
            $artista->setGeneroPrincipal(readline("Informe o gênero principal do músico: "));
            $artista->setIdade(readline("Informe a idade do músico: "));
            $artista->setInstrumento(readline("Informe o tipo de instrumento do músico: "));
            $artista->setNumAlbuns(readline("Informe o número de álbuns do músico: "));

            $artistaDAO = new ArtistaDAO();
            $artistaDAO->cadastrarArtista($artista);

            print "Músico cadastrado com sucesso!\n";
            break;

        case 4:
            $artistaDAO = new ArtistaDAO();
            $artistas = $artistaDAO->listarArtistas();

            print "\nLista de artistas:\n\n";
            foreach ($artistas as $a) {
                echo $a;
            }
            break;

        case 5:

            echo "\n";
            $id = readline("Informe o ID do artista que deseja buscar: ");
            $artistaDAO = new artistaDAO();
            $artista = $artistaDAO->buscarPorId($id);
            if ($artista !== null) {
                echo "\nArtista encontrado:\n";
                echo $artista;
            } else {
                echo "\nArtista não encontrado!\n";
            }
            break;
            break;


        case 6:
            $artistaDao = new ArtistaDAO;
            $artista = $artistaDao->listarartistas();
            print "Lista de artistas:\n\n";
            foreach ($artista as $a) {
                echo $a;
            }
            do {
                echo "\n";
                $id = readline("Informe o ID que deseja excluir: ");
                $artista = $artistaDao->buscarPorId($id);
                if ($artista !== null) {
                    $artista = $artistaDao->excluirPorId($id);
                    if ($artista) {
                        echo "\nArtista " . $id . " excluído!\n";
                    } else {
                        echo "\nArtista não excluído!\n";
                    }
                    $artista = $artistaDao->listarartistas();
                    echo "\nLista dos astistas atualizada: \n";
                    foreach ($artista as $a) {
                        echo $a;
                    }
                } else {
                    echo "\nArtista não encontrado! Digite novamente.\n";
                }
            } while ($artista == null);

            break;

        case 0:
            print "Programa encerrado!\n";
            break;

        default:
            print "Opção inválida!\nDigite novamente!\n";
            break;
    }
} while ($opcao != 0);
