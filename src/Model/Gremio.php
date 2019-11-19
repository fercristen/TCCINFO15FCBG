<?php

namespace Model;
/**
 * @Entity
 * @Table(name="gremio")
 */
class Gremio
{

    /**
     * @Id
     * @Column(name="gre_id", type="integer")
     * @GeneratedValue(strategy="IDENTITY")
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

    /**
     * @Column(name="gre_mandato_atual", type="boolean")
     */
    protected $mandatoAtual;

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

    /**
     * @return mixed
     */
    public function getNomeChapa()
    {
        return $this->nomeChapa;
    }

    /**
     * @param mixed $nomeChapa
     */
    public function setNomeChapa($nomeChapa)
    {
        $this->nomeChapa = $nomeChapa;
    }

    /**
     * @return mixed
     */
    public function getIntegrantes()
    {
        return $this->integrantes;
    }

    /**
     * @param mixed $integrantes
     */
    public function setIntegrantes($integrantes)
    {
        $this->integrantes = $integrantes;
    }

    /**
     * @return mixed
     */
    public function getMandatoAtual()
    {
        return $this->mandatoAtual;
    }

    /**
     * @param mixed $mandatoAtual
     */
    public function setMandatoAtual($mandatoAtual)
    {
        $this->mandatoAtual = $mandatoAtual;
    }


}


