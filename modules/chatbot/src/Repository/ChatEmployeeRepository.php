<?php

namespace Chatbot\Repository;


use Doctrine\ORM\QueryBuilder;
use Doctrine\DBAL\Connection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class ChatEmployeeRepository extends AbstarctRepository
{
    /**
     * @param $repository
     * @return QueryBuilder
     */
    public static function findAllActiveOnes($repository): QueryBuilder
    {
        return $repository->createQueryBuilder('k')
            ->where('k.isActive = :isActive')
            ->setParameter('isActive', true)
            ;
    }

}







