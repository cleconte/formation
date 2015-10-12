<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use OCFram\PasswordField;
use OCFram\SimilarValidator;
use \OCFram\StringField;
use \OCFram\MaxLengthValidator;
use \OCFram\VerifyNewUsernameValidator;
use \OCFram\VerifyPriorityValidator;
use \OCFram\VerifyPasswordValidator;
use \OCFram\NotNullValidator;

class RegisterFormBuilder extends FormBuilder
{
    public function build()
    {
        $username = new StringField([
            'label' => 'Username',
            'name' => 'username',
            'maxLength' => 20,
            'validators' => [
                new MaxLengthValidator('Le pseudo sp�cifie est trop long(20 carat�res maximum)', 20),//pseudo trop long
                new NotNullValidator('Je dois deviner ton pseudo?'),
                new VerifyNewUsernameValidator('Ce pseudo est pris',func_get_arg(0)), // le message d'erreur ne s'affiche pas
                // v�rifi� que le pseudo n'est pas utilis�
            ],
        ]);

        $this->form->add($username );

        $password = new PasswordField([
            'label' => 'Password',
            'name' => 'password',
            'maxLength' => 30,
            'validators' => [
                new MaxLengthValidator('Le mdp sp�cifi� est trop long (100 caract�res maximum)', 30),// v�rifier que le mdp pour le pseudo est valide
                new NotNullValidator('Je dois deviner ton mot de passe ? '),
                //mettre un format de mdp ?
                ],
        ]);

        $this->form->add($password);

        $confirmation = new PasswordField([
            'label' => 'Confirmation',
            'name' => 'confirmation',
            'maxLength' => 30,
            'validators' => [
                new SimilarValidator('Les mots de passes ne correspondent pas',$password->value())
                                //v�rifier que c'est le m�me mdp qu'audessus ($password->value()
            ],
        ]);

        $this->form->add($confirmation);
        //     new VerifyPseudoValidator('Le pseudo sp�cifi� n\'existe pas'),

        $description = new StringField([
            'label' => 'Description',
            'name' => 'description',
            'maxLength' => 200,
            'validators' => [
                //mettre a jour les messages d'erreurs, et les crit�res que l'on souhaite.
                new MaxLengthValidator('Ta d�cription est trop longue, ne sois pas si bavard(20 carat�res maximum)', 200),//pseudo trop long
                new NotNullValidator('Si tu pouvais te d�crire se serait sympa pour tes amis'),
            ],
        ]);

        $this->form->add($description);
    }
}