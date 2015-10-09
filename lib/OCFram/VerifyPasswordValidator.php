<?php
namespace OCFram;

class VerifyPasswordValidator extends Validator
{
//vérifier que la priorité est 2 (que c'est un admin)

    public function __construct($errorMessage)
    {
        parent::__construct($errorMessage);

    }

    public function isValid($value)
    {
        return $value=='mdp';//Comment vérifier en récupérant le bon mdp par rapport au champ précédent ?
    }

}