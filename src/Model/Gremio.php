<?php

namespace Model;
/**
 * @Entity
 * @Table(name="gremio")
 */
class Gremio{
    /**
     * @Id
     * @Column(name="gre_id", type="integer")
     * @GeneretedValue(strategy="IDENTITY")
     */
    protected $id;
    /**
     * @Column(name="gre_nome_chapa", type="string", nullable=false)
     */
    protected $nomeChapa;

    /**
     * @Column(name="gre_data_posse", type="date", nullable=false)
     */
    protected $dataPosse;

    /**
     * @OneToMany(targetEntity="Integrante", mappedBy="gremio")
     */
    public $integrantes;

    public function __construct()
    {
        $this->integrantes = new \Doctrine\Common\Collections\ArrayCollection();
    }


    public function getNomeChapa()
    {
        return $this->nomeChapa;
    }


    public function setNomeChapa($nomeChapa)
    {
        $this->nomeChapa = $nomeChapa;
    }


    public function getDataPosse()
    {
        return $this->dataPosse;
    }


    public function setDataPosse($dataPosse)
    {
        $this->dataPosse = $dataPosse;
    }


    public function getGremiocol()
    {
        return $this->gremiocol;
    }


    public function setGremiocol($gremiocol)
    {
        $this->gremiocol = $gremiocol;
    }

    public function getIntegrantes()
    {
        return $this->integrantes;
    }


    public function setIntegrantes($integrantes)
    {
        $this->integrantes = $integrantes;
    }



}


