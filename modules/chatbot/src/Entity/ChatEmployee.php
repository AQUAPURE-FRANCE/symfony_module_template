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
    private $idChatEmployee;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="Chat", mappedBy="idChatMessage")
     */
    private $chats;





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

}