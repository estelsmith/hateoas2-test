<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity\User;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Selectable;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @return Collection|Selectable|User[]
     */
    public function findAll()
    {
        return parent::findAll();
    }
}
