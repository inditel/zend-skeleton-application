<?php
namespace Model\Entity\Generated;

use \Inditel\Db\Entity\AbstractEntity;

/**
 *
 */
class PaymentAbstractEntity extends AbstractEntity
{

    /**
     * @var int $id
     */
    protected $id = null;

    /**
     * @var string $datetime
     */
    protected $datetime = null;

    /**
     * @var double $price
     */
    protected $price = null;

    /**
     * @var string $channel
     */
    protected $channel = null;

    /**
     * @var int $companyId
     */
    protected $companyId = null;

    /**
     * @var int $userJobId
     */
    protected $userJobId = null;

    /**
     * @var int $packageId
     */
    protected $packageId = null;

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
     * @param string $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return string
     */
    public function getDatetime()
    {
        return $this->datetime;
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
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param int $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $userJobId
     */
    public function setUserJobId($userJobId)
    {
        $this->userJobId = $userJobId;
    }

    /**
     * @return int
     */
    public function getUserJobId()
    {
        return $this->userJobId;
    }

    /**
     * @param int $packageId
     */
    public function setPackageId($packageId)
    {
        $this->packageId = $packageId;
    }

    /**
     * @return int
     */
    public function getPackageId()
    {
        return $this->packageId;
    }


}
