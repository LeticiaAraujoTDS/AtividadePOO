<?php 
require_once("modelo/Artista.php");
require_once("modelo/Ator.php");
require_once("modelo/Autor.php");
require_once("modelo/Musico.php");

require_once("util/Conexao.php");

class ArtistaDAO {

    //Método para cadastrar um artista
    public function cadastrarArtista(Artista $artista) {
        $sql = "INSERT INTO artistas (nome_artistico, nome, genero_principal, idade, tipo_artista, tipo_midia, num_paticipacoes, num_obras, obra_famosa, instrumento, num_albuns)
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?)";

        $con = Conexao::getCon();

        $stm = $con->prepare($sql);
        if($artista instanceof Ator){
            $stm->execute(array($artista->getNomeArtistico(),
                                $artista->getNome(),
                                $artista->getGeneroPrincipal(),
                                $artista->getIdade(),
                                $artista->getTipo(),
                                $artista->getTipoMidia(),
                                $artista->getNumPaticipacoes(),
                                null,
                                null,
                                null,
                                null));
        }
        else if ($artista instanceof Autor){
            $stm->execute(array($artista->getNomeArtistico(),
                                $artista->getNome(),
                                $artista->getGeneroPrincipal(),
                                $artista->getIdade(),
                                $artista->getTipo(),
                                null,
                                null,
                                $artista->getNumObras(),
                                $artista->getObraMaisFamosa(),
                                null,
                                null));
        }
        else if ($artista instanceof Musico){
            $stm->execute(array($artista->getNomeArtistico(),
                                $artista->getNome(),
                                $artista->getGeneroPrincipal(),
                                $artista->getIdade(),
                                $artista->getTipo(),
                                null,
                                null,
                                null,
                                null,
                                $artista->getInstrumento(),
                                $artista->getNumAlbuns()));
        }


    }

    //Método para listar
    public function listarArtistas() {
        $sql = "SELECT * FROM artistas";

        $con = Conexao::getCon();

        $stm = $con->prepare($sql);
        $stm->execute();
        $registros = $stm->fetchAll();
        $artistas = $this->mapArtistas($registros);
        return $artistas;
    }

    private function mapArtistas(array $registros) { //Vai mapear os dados do banco para o objeto, pois os dados estão ainda como um array associativo
        $artistas = array();

        foreach($registros as $reg){
            $artista = null;
            if($reg['tipo_artista'] == 'A'){
                $artista = new Ator();
                $artista->setTipoMidia($reg['tipo_midia']);
                $artista->setNumParticipacoes($reg['num_participacoes'] ?? 0);
            } 
            
            else if($reg['tipo_artista'] == 'T') {
                $artista = new Autor();
                $artista->setNumObras($reg['num_obras']);
                $artista->setObraMaisFamosa($reg['obra_famosa']);
            }
            else{
                $artista = new Musico();
                $artista->setInstrumento($reg['instrumento'] ?? "");
                $artista->setNumAlbuns($reg['num_albuns'] ?? 0);
                
            }

            $artista->setId($reg['id']);
            $artista->setNomeArtistico($reg['nome_artistico']);
            $artista->setNome($reg['nome']);
            $artista->setGeneroPrincipal($reg['genero_principal']);
            $artista->setIdade($reg['idade']);

            array_push($artistas, $artista);

       
        }
        return $artistas;
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT * FROM artistas WHERE id = ?";

        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        $stm->execute([$id]);
        $registro = $stm->fetchAll();
        $artistas = $this->mapArtistas($registro);

        if (count($artistas)) {
            return $artistas[0];
        } else {
            return null;
        }
    }

    public function excluirPorId(int $id){

        $sql = "DELETE FROM artistas WHERE id = ?";

        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        $stm->execute([$id]);
        
        return true;
    }


}
