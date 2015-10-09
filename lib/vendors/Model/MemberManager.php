<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Member;

abstract class MemberManager extends Manager
{
    abstract public function verifyPassword(Member $member);

    public function save(Member $member)
    {
        if ($member->isValid())
        {
            return true;
        }
        else
        {
            throw new \RuntimeException('message a reecrire');
        }
    }
}