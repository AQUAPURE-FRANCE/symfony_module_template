<?php
namespace Chatbot\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat_employee")
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
     * @ORM\Column(name="id_employee", type="integer")
     */
    private $employee;

    /**
     * @var string
     *
     * @ORM\Column(name="id_chat_avatar", type="integer")
     * @ORM\ManyToOne(targetEntity="Chatbot\Entity\ChatAvatar", inversedBy="employees")
     */
    private $avatar;

    /**
     * @ORM\OneToMany(targetEntity="Chatbot\Entity\Chat", mappedBy="chatEmployee")
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
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param string $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
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