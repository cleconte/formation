<?php
namespace App\Frontend;

trait AppController
{

    protected  function run(){
        $this->setMenu();
    }


    public function setMenu(){
        //if admin
        $user=$this->app->user();
        $menu_nav = array();
        // chaque lien du menu est inséré dans un tableau

        if($this->app->name()=='Frontend'){
            array_push($menu_nav,array(
                array('text'=>'Tu es dans le FrontEnd','link'=>'/')
            ));
        }

        if($user->isMember()){
            array_push($menu_nav,array(
                    array('text'=>'Profil','link'=>self::BuildRoute('Profil','index',[])),
                    array('text'=>'Ajouter une News','link'=>self::BuildRoute('News','insert',[])),
                    array('text'=>'Deconnexion','link'=>self::BuildRoute('Deconnexion','index',[])))
                    );
        }
        else {

            array_push($menu_nav,array(
                array('text'=>'inscription','link'=>self::BuildRoute('Register','index',[])),
                array('text'=>'Connexion','link'=>self::BuildRoute('Connexion','index',[])))
                    );
        }
        $this->page->addVar('menu_nav',$menu_nav);

    }

    public static function BuildRoute($module, $action, array $varsNames){
        $var='';
        if($varsNames!=null){
            foreach($varsNames as $vars){
                $var=$var.'-'.$vars;
            }
        }
        return "/$module/$action$var";
    }

}
?>
