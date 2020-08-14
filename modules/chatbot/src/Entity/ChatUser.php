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
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_guest", type="integer")
     */
    private $guest;

    /**
     * @var int
     *
     * @ORM\Column(name="id_customer", type="integer")
     */
    private $customer;

    /**
     * @var int
     *
     * @ORM\Column(name="id_avatar", type="integer")
     */
    private $avatar;

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
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * @param int $guest
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
    }

    /**
     * @return int
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param int $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param int $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }


}