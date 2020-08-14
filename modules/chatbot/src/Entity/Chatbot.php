<?php

namespace Chatbot\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Table(name="ps_sf_module_template")
 */
class Chatbot
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_sf_module", type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_add", type="datetime")
     */
    private $dateAdd;




    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Chatbot
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * @param DateTime $dateAdd
     * @return Chatbot
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;
        return $this;
    }
}