<?php
namespace Model\Entity\Generated;

use \Inditel\Db\Entity\AbstractEntity;

/**
 *
 */
class TestAnswerAbstractEntity extends AbstractEntity
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
     * @var int $userJobId
     */
    protected $userJobId = null;

    /**
     * @var int $finished
     */
    protected $finished = null;

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
     * @param int $finished
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;
    }

    /**
     * @return int
     */
    public function getFinished()
    {
        return $this->finished;
    }


}
