<?php


namespace Chatbot\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat_avatar")
 */

class ChatAvatar
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_chat_avatar", type="integer")
     * @ORM\GeneratedValue()
     */
    private $idChatAvatar;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_default", type="boolean")
     */
    private $isDefault;

}