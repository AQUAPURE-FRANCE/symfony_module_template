<?php

namespace SymfonyModule\Repository;

use Doctrine\DBAL\Connection;

class SymfonyModuleRepository
{
    /**
     * @var Connection the Database connection
     */
    private $connection;

    /**
     * @var string the Database prefix
     */
    private $databasePrefix;

    /**
     * SymfonyModuleRepository constructor.
     * @param Connection $connection
     * @param $databasePrefix
     */
    public function __construct(Connection $connection, $databasePrefix)
    {
        $this->connection = $connection;
        $this->databasePrefix = $databasePrefix;
    }

    /**
     * @return mixed[]
     */
    public function findAll()
    {
        return $this->connection->createQueryBuilder()
            ->addSelect('symf.*')
            ->from($this->databasePrefix . 'symfonymodule', 'symf')
            ->execute()
            ->fetchAll();
    }

}
