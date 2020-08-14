<?php


namespace Chatbot\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat_to_faq")
 */

class ChatToFaq
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_chat_to_faq", type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_chat", type="integer")
     */
    private $chat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_relevant", type="boolean")
     */
    private $isRelevant;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param int $chat
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return bool
     */
    public function isRelevant()
    {
        return $this->isRelevant;
    }

    /**
     * @param bool $isRelevant
     */
    public function setIsRelevant($isRelevant)
    {
        $this->isRelevant = $isRelevant;
    }
}