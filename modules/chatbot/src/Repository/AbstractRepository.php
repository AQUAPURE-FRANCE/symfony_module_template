<?php

namespace Chatbot\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class AbstarctRepository extends ServiceEntityRepository
{
    /**
     * @var Connection the Database connection
     */
    protected $connection;

    /**
     * @var string the Database prefix
     */
    protected $databasePrefix;

    protected $expr;

    protected $className;

    protected $entity;


    /**
     * ChatbotRepository constructor.
     * @param Connection $connection
     * @param $databasePrefix
     */
    public function __construct(ManagerRegistry $mr, Connection $connection, $databasePrefix)
    {
        $this->className = preg_replace('/(Chatbot|Repository|\\\)/', '', get_class($this));
        $this->entity = 'Chatbot\\Entity\\' . $this->className;
        parent::__construct($mr, $this->entity);
        $this->expr = $this->getEntityManager()->getExpressionBuilder();
        $this->connection = $connection;
        $this->databasePrefix = $databasePrefix;
    }


}
