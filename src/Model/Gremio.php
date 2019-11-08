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
     * @OneToMany(targetEntity="Integrante", mappedBy="gremio")
     */
    public $integrantes;

    public function __construct()
    {
        $this->integrantes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNomeChapa()
    {
        return $this->nomeChapa;
    }


    public function setNomeChapa($nomeChapa)
    {
        $this->nomeChapa = $nomeChapa;
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


