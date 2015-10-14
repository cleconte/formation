<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\MaxLengthValidator;
use \OCFram\VerifyUsernameValidator;

class TagFormBuilder extends FormBuilder
{
    public function build()
    {
        $name = new StringField([
            'label' => 'Tag',
            'name' => 'name',
            'maxLength' => 140,
            'validators' => [
                new MaxLengthValidator('le nombre de caractère pour les tags est excédé (max 140))', 140),//pseudo trop long14
                new VerifyUsernameValidator('Ton pseudo n\'est pas bon',func_get_arg(0)), // le message d'erreur ne s'affiche pas
            ],
        ]);
        $this->form->add($name);
    }
}