<?php
namespace App\Backend\Modules\Connexion;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Member;
use \FormBuilder\MemberFormBuilder;
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

    $formBuilder = new MemberFormBuilder($member);
    $formBuilder->build($this->managers->getManagerOf('Member'));

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Member'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setAuthenticated(true);
      $this->app->httpResponse()->redirect('.');
    }
    $this->page->addVar('title', 'Connexion');
    $this->page->addVar('Member', $member);
    $this->page->addVar('form', $form->createView());

    /*

    if ($request->postExists('login'))
    {
      $login = $request->postData('login');
      $password = $request->postData('password');
    // vérifier ici avec un validator
      if ($login == $this->app->config()->get('login') && $password == $this->app->config()->get('pass'))
      {
        $this->app->user()->setAuthenticated(true);
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
      }
    }*/
  }
}