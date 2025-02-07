<?php

require_once("Artista.php");

class Ator extends Artista {
    private string $tipoMidia;
    private int $numPaticipacoes;


    public function getTipo(): string {
        return "A";
    }

    public function getDados() {
        $dados = parent::getDados();
        $dados .= "| Mídia: ". $this->tipoMidia ." | N. Participações: " .$this->numPaticipacoes . "\n"; 
        return $dados;
    }

    public function tipo(){
        return "Ator";
    }

    //GETs & SETs
    /**
     * Get the value of tipoMidia
     */
    public function getTipoMidia(): string
    {
        return $this->tipoMidia;
    }

    /**
     * Set the value of tipoMidia
     */
    public function setTipoMidia(string $tipoMidia): self
    {
        $this->tipoMidia = $tipoMidia;

        return $this;
    }

    /**
     * Get the value of numFilmes
     */
    public function getNumPaticipacoes(): int
    {
        return $this->numPaticipacoes;
    }

    /**
     * Set the value of numFilmes
     */
    public function setNumParticipacoes(int $numPaticipacoes): self
    {
        $this->numPaticipacoes = $numPaticipacoes;

        return $this;
    }
}
