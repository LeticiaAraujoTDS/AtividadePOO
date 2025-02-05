<?php

require_once("Artista.php");

class Autor extends Artista {

    private int $numObras;
    private string $obraMaisFamosa;

    public function getTipo(){
        return "Autor";
    }

    //GETs & SETs
    /**
     * Get the value of numObras
     */
    public function getNumObras(): int
    {
        return $this->numObras;
    }

    /**
     * Set the value of numObras
     */
    public function setNumObras(int $numObras): self
    {
        $this->numObras = $numObras;

        return $this;
    }

    /**
     * Get the value of obraMaisFamosa
     */
    public function getObraMaisFamosa(): string
    {
        return $this->obraMaisFamosa;
    }

    /**
     * Set the value of obraMaisFamosa
     */
    public function setObraMaisFamosa(string $obraMaisFamosa): self
    {
        $this->obraMaisFamosa = $obraMaisFamosa;

        return $this;
    }
}

