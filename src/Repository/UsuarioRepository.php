<?php
/**
 * Criado: Fernando Cristen
 * Data: 13/08/2019
 * Hora: 23:22
 */

namespace Repository;


use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{

    public function validaLogin($login, $senha){
        $sql = "SELECT * FROM usuarios WHERE usu_login = :login AND usu_senha = :senha";
        $params = [
            'login' => $login,
            'senha' => $senha,
        ];
        $st = $this->getEntityManager()->getConnection()->executeQuery($sql, $params);
        $result = $st->fetchAll();
        $st->closeCursor();
        return $result;
    }
}