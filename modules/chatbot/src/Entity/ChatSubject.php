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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Chatbot\Entity\ChatMessage", mappedBy="chatMessage")
     */
    private $subjects;

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
    public function setIdChatSubject($id)
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
}