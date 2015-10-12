<?php
namespace App\Frontend\Modules\Register;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Member;
use \FormBuilder\RegisterFormBuilder;
use \OCFram\FormHandler;


class RegisterController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {

        if ($request->method() == 'POST')
        {
            $member = new Member([
                'username' => $request->postData('username'),
                'password' => $request->postData('password'),
                'confirmation' => $request->postData('confirmation'),
                'description' => $request->postData('description'),
                // r�cup�rer les deux autres champs aussi

            ]);
        }
        else
        {
            $member = new Member; // on garde cette entit� member ?
        }

        $formBuilder = new RegisterFormBuilder($member); // m�me formbuilder ?
        $formBuilder->build($this->managers->getManagerOf('Member'));

        $form = $formBuilder->form();

        $formHandler = new FormHandler($form, $this->managers->getManagerOf('Member'), $request);

        if ($formHandler->process())
        {
            $this->app->user()->setFlash('vous �tes bien inscrit');

            $this->app->httpResponse()->redirect('.');
        }
        $this->page->addVar('title', 'Inscription');
        $this->page->addVar('Member', $member);
        $this->page->addVar('form', $form->createView());


    }
}