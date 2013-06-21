<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity
 */
class Test
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    private $name;

    /**
     * @var \Application\Entity\Test
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Test")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="xx", referencedColumnName="id")
     * })
     */
    private $xx;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Test
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set xx
     *
     * @param \Application\Entity\Test $xx
     * @return Test
     */
    public function setXx(\Application\Entity\Test $xx = null)
    {
        $this->xx = $xx;
    
        return $this;
    }

    /**
     * Get xx
     *
     * @return \Application\Entity\Test 
     */
    public function getXx()
    {
        return $this->xx;
    }
}