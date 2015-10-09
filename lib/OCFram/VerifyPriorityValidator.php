<?php
namespace OCFram;

class VerifyPriorityValidator extends Validator
{
    protected $manager;
    protected $priority;
//vérifier que c'est un pseudo qui existe

    public function __construct($errorMessage,$managers,$priority)
    {
        parent::__construct($errorMessage);

        $this->setManagers($managers);
        $this->setPriority($priority);
    }

    public function isValid($value)
    {
        var_dump($this->priority);
        var_dump($this->managers->getPriority($value));// pourquoi c'est true ici ?
        return $this->priority==$this->managers->getPriority($value);
    }

    public function setManagers($managers)
    {
        $this->managers = $managers;
    }
    public function setPriority($priority)
{
    $this->priority =  $priority;
}

}