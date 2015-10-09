<?php
namespace Entity;

use \OCFram\Entity;

class Member extends Entity
{
    protected $id,
        $username,
        $password,
        $priority;

    const ID_INVALIDE = 1;
    const USERNAME_INVALIDE = 1;
    const PASSWORD_INVALIDE = 1;
    const PRIORITY_INVALIDE = 1;

    public function setID($id)
    {
        if (!is_int($id) || empty($id))
        {
            $this->erreurs[] = self::ID_INVALIDE;
        }

        $this->id = $id;
    }
    public function setUsername($username)
    {
        if (!is_string($username) || empty($username))
        {
            $this->erreurs[] = self::USERNAME_INVALIDE;
        }

        $this->username = $username;
    }

    public function setPassword($password)
    {
        if (!is_string($password) || empty($password))
        {
            $this->erreurs[] = self::PASSWORD_INVALIDE;
        }

        $this->password = $password;
    }
    public function setPriority($priority)
    {
        if (!is_int($priority) || empty($priority))
        {
            $this->erreurs[] = self::PRIORITY_INVALIDE;
        }

        $this->priority = $priority;
    }

    public function isValid()
    {
        return !(empty($this->username) || empty($this->password));
    }
    public function id()
    {
        return $this->id;
    }
    public function username()
    {
        return $this->username;
    }
    public function password()
    {
        return $this->password;
    }
    public function priority()
    {
        return $this->priority;
    }
}