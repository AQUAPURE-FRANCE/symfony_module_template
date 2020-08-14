<?php


namespace Chatbot\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat_emplyee")
 */

class ChatEmployee
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_chat_employee", type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Chatbot\Entity\Chat", mappedBy="idChatEmployee")
     */
    private $chats;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getChats()
    {
        return $this->chats;
    }

    /**
     * @param mixed $chats
     */
    public function setChats($chats)
    {
        $this->chats = $chats;
    }

}