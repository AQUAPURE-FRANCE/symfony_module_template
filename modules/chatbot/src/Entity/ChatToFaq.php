<?php


namespace Chatbot\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_chat_to_faq")
 */

class ChatToFaq
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_chat_to_faq", type="integer")
     * @ORM\GeneratedValue()
     */
    private $idChatToFaq;

    /**
     * @var int
     *
     * @ORM\Column(name="id_chat", type="integer")
     */
    private $idChat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_relevant", type="boolean")
     */
    private $isRelevant;




}