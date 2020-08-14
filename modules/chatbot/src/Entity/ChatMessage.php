<?php


namespace Chatbot\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat_message")
 */

class ChatMessage
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_chat_message", type="integer")
     * @ORM\GeneratedValue()
     */
    private $idChatMessage;

    /**
     * @var int
     *
     * @ORM\Column(name="id_chat_subject", type="integer")
     */
    private $idChatSubject;


    /**
     * @var $text
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;




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
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }


}