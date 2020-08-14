<?php


namespace Chatbot\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat_user")
 */

class ChatUser
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_chat_employee", type="integer")
     * @ORM\GeneratedValue()
     */
    private $idChatUser;

    /**
     * @var int
     *
     * @ORM\Column(name="id_guest", type="integer")
     */
    private $id_guest;

    /**
     * @var int
     *
     * @ORM\Column(name="id_customer", type="integer")
     */
    private $id_customer;

    /**
     * @var int
     *
     * @ORM\Column(name="id_avatar", type="integer")
     */
    private $id_avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string")
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;




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
    public function getIdGuest()
    {
        return $this->id_guest;
    }

    /**
     * @param int $id_guest
     */
    public function setIdGuest($id_guest)
    {
        $this->id_guest = $id_guest;
    }

    /**
     * @return int
     */
    public function getIdCustomer()
    {
        return $this->id_customer;
    }

    /**
     * @param int $id_customer
     */
    public function setIdCustomer($id_customer)
    {
        $this->id_customer = $id_customer;
    }

    /**
     * @return int
     */
    public function getIdAvatar()
    {
        return $this->id_avatar;
    }

    /**
     * @param int $id_avatar
     */
    public function setIdAvatar($id_avatar)
    {
        $this->id_avatar = $id_avatar;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }



}