<?php

require_once("Artista.php");

class Musico extends Artista {
    private string $instrumento;
    private int $numAlbuns;

    public function getTipo(): string {
        return "M";
    }
    public function getDados() {
        $dados = parent::getDados();
        $dados .= "| Instrumento: ". $this->instrumento ." | N. Álbuns: " .$this->numAlbuns . "\n"; 
        return $dados;
    }
    public function tipo(){
        return "Músico";
    }

    //GETs & SETs
    /**
     * Get the value of instrumento
     */
    public function getInstrumento(): string
    {
        return $this->instrumento;
    }

    /**
     * Set the value of instrumento
     */
    public function setInstrumento(string $instrumento): self
    {
        $this->instrumento = $instrumento;

        return $this;
    }

    /**
     * Get the value of numAlbuns
     */
    public function getNumAlbuns(): int
    {
        return $this->numAlbuns;
    }

    /**
     * Set the value of numAlbuns
     */
    public function setNumAlbuns(int $numAlbuns): self
    {
        $this->numAlbuns = $numAlbuns;

        return $this;
    }
}
