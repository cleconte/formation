<?php
namespace OCFram;

class VerifyPasswordValidator extends Validator
{
//v�rifier que la priorit� est 2 (que c'est un admin)

    public function __construct($errorMessage)
    {
        parent::__construct($errorMessage);

    }

    public function isValid($value)
    {
        return $value=='mdp';//Comment v�rifier en r�cup�rant le bon mdp par rapport au champ pr�c�dent ?
    }

}