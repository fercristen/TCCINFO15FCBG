<?php
/**
 * Criado: Fernando Cristen
 * Data: 26/06/2019
 * Hora: 18:37
 */

namespace Model;

/**
 * @Entity
 * @Table(name="noticias")
 */
class Noticia{
    /**
     * @Id
     * @Column(name="not_id", type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    /**
     *@Column(name="not_titulo")
     */
    protected $titulo;
    /**
     *@Column(name="not_resumo", type="string")
     */
    protected $resumo;
    /**
     *@Column(name="not_corpo", type="text")
     */
    protected $corpo;
    /**
     * @Column(name="not_data", type="date")
     */
    protected $data;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getResumo()
    {
        return $this->resumo;
    }

    public function setResumo($resumo)
    {
        $this->resumo = $resumo;
    }

    public function getCorpo()
    {
        return $this->corpo;
    }

    public function setCorpo($corpo)
    {
        $this->corpo = $corpo;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }


}