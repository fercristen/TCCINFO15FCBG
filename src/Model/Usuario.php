<?php
/**
 * Criado: Fernando Cristen
 * Data: 13/08/2019
 * Hora: 23:05
 */

namespace Model;

/**
 * @Entity(repositoryClass="Repository\UsuarioRepository")
 * @Table(name="usuarios")
 */
class Usuario
{
    /**
     * @Id
     * @Column(name="usu_id", type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @Column(name="usu_login", type="string")
     */
    protected $login;

    /**
     * @Column(name="usu_senha", type="string")
     */
    protected $senha;

}