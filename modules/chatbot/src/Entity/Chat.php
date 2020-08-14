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
    private $id;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Chatbot\Entity\ChatUser", inversedBy="chats")
     * @ORM\Column(name="id_chat_user", type="integer")
     */
    private $chatUser;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Chatbot\Entity\ChatEmployee", inversedBy="chats")
     * @ORM\Column(name="id_chat_employee", type="integer")
     */
    private $chatEmployee;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Chatbot\Entity\ChatMessage", inversedBy="chat")
     * @ORM\Column(name="id_chat_message", type="integer")
     */
    private $chatMessage;

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
    public function getChatUser()
    {
        return $this->chatUser;
    }

    /**
     * @param int $chatUser
     */
    public function setChatUser($chatUser)
    {
        $this->chatUser = $chatUser;
    }

    /**
     * @return int
     */
    public function getChatEmployee()
    {
        return $this->chatEmployee;
    }

    /**
     * @param int $chatEmployee
     */
    public function setChatEmployee($chatEmployee)
    {
        $this->chatEmployee = $chatEmployee;
    }

    /**
     * @return int
     */
    public function getChatMessage()
    {
        return $this->chatMessage;
    }

    /**
     * @param int $chatMessage
     */
    public function setChatMessage($chatMessage)
    {
        $this->chatMessage = $chatMessage;
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