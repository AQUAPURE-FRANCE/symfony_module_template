<?php
namespace Chatbot\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
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
    private $id;
    /**
     * @var int
     *
     * @ORM\Column(name="id_chat_subject", type="integer")
     * @ORM\ManyToOne(targetEntity="Chatbot\Entity\ChatSubject", inversedBy="subjects")
     * @JoinColumn(name="id_chat_subject", referencedColumnName="id_chat_subject")
     */
    private $chatSubject;
    /**
     * @ORM\OneToMany(targetEntity="Chatbot\Entity\Chat", mappedBy="chatMessage")
     */
    private $chats;
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
    /**
     * @var $text
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;




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
    public function getChatSubject()
    {
        return $this->chatSubject;
    }
    /**
     * @param int $chatSubject
     */
    public function setChatSubject($chatSubject)
    {
        $this->chatSubject = $chatSubject;
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