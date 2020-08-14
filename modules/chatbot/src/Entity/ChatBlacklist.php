<?php


namespace Chatbot\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_blacklist")
 */

class ChatBlacklist
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_blacklist", type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;


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
    public function setIdBlacklist($id)
    {
        $this->id = $id;
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