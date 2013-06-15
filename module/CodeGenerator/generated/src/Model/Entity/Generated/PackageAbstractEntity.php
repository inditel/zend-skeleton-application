<?php
namespace Model\Entity\Generated;

use \Inditel\Db\Entity\AbstractEntity;

/**
 *
 */
class PackageAbstractEntity extends AbstractEntity
{

    /**
     * @var int $id
     */
    protected $id = null;

    /**
     * @var double $price
     */
    protected $price = null;

    /**
     * @var string $type
     */
    protected $type = null;

    /**
     * @var string $name
     */
    protected $name = null;

    /**
     * @var int $timePeriodLength
     */
    protected $timePeriodLength = null;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param double $price
     */
    public function setPrice(double $price)
    {
        $this->price = $price;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $timePeriodLength
     */
    public function setTimePeriodLength($timePeriodLength)
    {
        $this->timePeriodLength = $timePeriodLength;
    }

    /**
     * @return int
     */
    public function getTimePeriodLength()
    {
        return $this->timePeriodLength;
    }


}
