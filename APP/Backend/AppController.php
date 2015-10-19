<?php
namespace App\Backend;

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
                array('text'=>'Admin','link'=>'/admin/'),
                array('text'=>'Ajouter une News','link'=>'/admin/news-insert.html'),
                array('text'=>'Deconnexion','link'=>'admin/deconnexion'))
            );
        }
        else {

            array_push($menu_nav,array(
                    array('text'=>'Connexion de l\'admin ','link'=>'/admin/'))
            );
        }
        $this->page->addVar('menu_nav',$menu_nav);

    }


}
?>
