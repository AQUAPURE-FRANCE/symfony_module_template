<?php


namespace Chatbot\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat_subject")
 */

class ChatSubject
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_chat_subject", type="integer")
     * @ORM\GeneratedValue()
     */
    private $idChatSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;




    /**
     * @return int
     */
    public function getIdChatSubject()
    {
        return $this->idChatSubject;
    }

    /**
     * @param int $idChatSubject
     */
    public function setIdChatSubject($idChatSubject)
    {
        $this->idChatSubject = $idChatSubject;
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