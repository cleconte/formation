<?php
namespace App\Frontend\Modules\Connexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Member;
use \FormBuilder\AutorFormBuilder;
use \OCFram\FormHandler;

class ConnexionController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {

        if ($request->method() == 'POST')
        {
            $member = new Member([
                'username' => $request->postData('username'),
                'password' => $request->postData('password')

            ]);
        }
        else
        {
            $member = new Member;
        }

        $formBuilder = new AutorFormBuilder($member);
        $formBuilder->build($this->managers->getManagerOf('Member'));
        $form = $formBuilder->form();

        $formHandler = new FormHandler($form, $this->managers->getManagerOf('Member'), $request);

        $entier=(int)$this->managers->getManagerOf('Member')->getId($member->username());
        var_dump($entier);
        var_dump((int)$this->managers->getManagerOf('Member')->getId($member->username()));
        if ($formHandler->process())
        {
            //$this->app->user()->setAuthenticated(true);
            //$stg = 'Bienvenue'.$this->member->username();
            //$this->app->user()->setFlash(execute($stg));


            $this->app->user()->setMember(1); // on met 1 pour auteur, il faudrait le faire dynamiquement.

            $this->app->user()->setUsername($member->username());

            $this->app->user()->setId($entier);//r�cup�rer l'id du member
            $this->app->user()->setFlash('Tu es connect�');
            $this->app->httpResponse()->redirect('.');
        }
        $this->page->addVar('title', 'Connexion');
        $this->page->addVar('Member', $member);
        $this->page->addVar('form', $form->createView());

    }
}