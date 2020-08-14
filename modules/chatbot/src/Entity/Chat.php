<?php


namespace Chatbot\Entity;

use Doctrine\ORM\Mapping as ORM;
use PhpOffice\PhpSpreadsheet\Calculation\DateTime;


/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat")
 */

class Chat
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_chat", type="integer")
     * @ORM\GeneratedValue()
     */
    private $idChat;

    /**
     * @var int
     *
     * @ORM\Column(name="id_chat_user", type="integer")
     */
    private $idChatUser;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="ChatEmployee", inversedBy="chats")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *
     * @ORM\Column(name="id_chat_employee", type="integer")
     */
    private $idChatEmployee;

    /**
     * @var int
     *
     * @ORM\Column(name="id_chat_message", type="integer")
     */
    private $idChatMessage;

    /**
     * @var Boolean
     *
     * @ORM\Column(name="is_user_sender", type="boolean")
     */
    private $isUserSender;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @return int
     */
    public function getIdChat()
    {
        return $this->idChat;
    }

    /**
     * @param int $idChat
     */
    public function setIdChat($idChat)
    {
        $this->idChat = $idChat;
    }

    /**
     * @return int
     */
    public function getIdChatUser()
    {
        return $this->idChatUser;
    }

    /**
     * @param int $idChatUser
     */
    public function setIdChatUser($idChatUser)
    {
        $this->idChatUser = $idChatUser;
    }





    /**
     * @return int
     */
    public function getIdChatEmployee()
    {
        return $this->idChatEmployee;
    }

    /**
     * @param int $idChatEmployee
     */
    public function setIdChatEmployee($idChatEmployee)
    {
        $this->idChatEmployee = $idChatEmployee;
    }

    /**
     * @return int
     */
    public function getIdChatMessage()
    {
        return $this->idChatMessage;
    }

    /**
     * @param int $idChatMessage
     */
    public function setIdChatMessage($idChatMessage)
    {
        $this->idChatMessage = $idChatMessage;
    }

    /**
     * @return bool
     */
    public function isUserSender()
    {
        return $this->isUserSender;
    }

    /**
     * @param bool $isUserSender
     */
    public function setIsUserSender($isUserSender)
    {
        $this->isUserSender = $isUserSender;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }


}