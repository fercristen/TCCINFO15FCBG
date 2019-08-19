<?php

namespace Model;
/**
 * @Entity
 * @Table(name="imagens")
 */
class Imagem{

     const TIPO_BANNER = 1;
     const TIPO_NOTICIA = 2;

    /**
     * @Id
     * @Column(name="img_id", type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @Column(name="img_titulo", type="string")
     */
    protected $titulo;

    /**
     * @Column(name="img_patch", type="text")
     */
    protected $patch;

    /**
     * @Column(name="img_nome", type="string")
     */
    protected $nome;

    function __construct($titulo, $patch, $nome)
    {
        $this->titulo = $titulo;
        $this->patch = $patch;
        $this->nome = $nome;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    function getTitulo()
    {
        return $this->titulo;
    }


     function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

     function getPatch()
    {
        return $this->patch;
    }

     function setPatch($patch)
    {
        $this->patch = $patch;
    }

     function getNome()
    {
        return $this->nome;
    }


     function setNome($nome)
    {
        $this->nome = $nome;
    }

}


