<?php

namespace Chatbot\Repository;

use Doctrine\DBAL\Connection;

class ChatbotRepository
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
     * ChatbotRepository constructor.
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
            ->addSelect('c.*')
            ->from($this->databasePrefix . 'customer', 'c')
            ->execute()
            ->fetchAll();
    }

    public function findSomething()
    {
        return $this->connection->createQueryBuilder()
            ->addSelect('ch.*')
            ->from($this->databasePrefix . 'chat', 'ch')
            ->join('ch', $this->databasePrefix . 'chat_message', 'm', 'ch.id_chat_message = m.id_chat_message')
            ->execute()->fetch();
    }
}