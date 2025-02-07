<?php

abstract Class Artista {

    //Atributos
    protected int $id;
    protected string $nome;
    protected string $nomeArtistico;
    protected string $generoPrincipal;
    protected int $idade;

    public function getDados() {
        return sprintf("%d- Tipo: %s | Nome: %s | N. Artístico: %s | Gênero: %s | Idade: %d anos ",
                        $this->id,$this->tipo(), $this->nome, $this->nomeArtistico,
                        $this->generoPrincipal, $this->idade);
    }


    //Métodos
    public abstract function getTipo();

    public abstract function tipo();

    //GETs & SETs

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of nomeArtistico
     */
    public function getNomeArtistico(): string
    {
        return $this->nomeArtistico;
    }

    /**
     * Set the value of nomeArtistico
     */
    public function setNomeArtistico(string $nomeArtistico): self
    {
        $this->nomeArtistico = $nomeArtistico;

        return $this;
    }

    /**
     * Get the value of generoPrincipal
     */
    public function getGeneroPrincipal(): string
    {
        return $this->generoPrincipal;
    }

    /**
     * Set the value of generoPrincipal
     */
    public function setGeneroPrincipal(string $generoPrincipal): self
    {
        $this->generoPrincipal = $generoPrincipal;

        return $this;
    }

    /**
     * Get the value of idade
     */
    public function getIdade(): int
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     */
    public function setIdade(int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }
}
