<?php
namespace Model;


use \Entity\Member;
class MemberManagerPDO extends MemberManager
{
//vérifie que le login rentré existe et retourner la priorité dans ces cas là

// Attention pseudo ou id , unicité sur pseudo ?

    public function getPriority($username){

        $requete = $this->dao->prepare('SELECT mmc_priority FROM T_mem_memberc WHERE mmc_username = :login');
        $requete->bindValue(':login',  $username);
        $requete = $requete->execute();

        if($requete==null){
            return false;
        }
        else{
            return $requete;
        }
    }

    public function verifyUsername($username){
        $requete = $this->dao->prepare('SELECT mmc_username FROM T_mem_memberc WHERE mmc_username = :login');
        $requete->bindValue(':login', $username);
        $requete->execute();

        /* appeler un objet entity connexion
        // et récuperer les valeurs ?
        $requete->bindValue(':contenu', $news->contenu());
    */
        if($requete==null){
            return false;
        }
        else{
            return true;
        }
    }
    public function verifyPassword(Member $member){
        $requete = $this->dao->prepare('SELECT mmc_username FROM T_mem_memberc WHERE mmc_username = :login and mmc_password =:password');
        $requete->bindValue(':login', $member->username());
        $requete->bindValue(':password', $member->password());
        $requete->execute();

        /* appeler un objet entity connexion
        // et récuperer les valeurs ?
        $requete->bindValue(':contenu', $news->contenu());
    */
        if($requete==null){
            return false;
        }
        else{
            return true;
        }
    }
}