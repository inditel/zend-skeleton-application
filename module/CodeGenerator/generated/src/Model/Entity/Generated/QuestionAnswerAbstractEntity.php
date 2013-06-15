<?php
namespace Model\Entity\Generated;

use \Inditel\Db\Entity\AbstractEntity;

/**
 *
 */
class QuestionAnswerAbstractEntity extends AbstractEntity
{

    /**
     * @var int $id
     */
    protected $id = null;

    /**
     * @var int $testQuestionId
     */
    protected $testQuestionId = null;

    /**
     * @var string $datetime
     */
    protected $datetime = null;

    /**
     * @var double $answer
     */
    protected $answer = null;

    /**
     * @var int $testAnswerId
     */
    protected $testAnswerId = null;

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
     * @param int $testQuestionId
     */
    public function setTestQuestionId($testQuestionId)
    {
        $this->testQuestionId = $testQuestionId;
    }

    /**
     * @return int
     */
    public function getTestQuestionId()
    {
        return $this->testQuestionId;
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
     * @param double $answer
     */
    public function setAnswer(double $answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return double
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param int $testAnswerId
     */
    public function setTestAnswerId($testAnswerId)
    {
        $this->testAnswerId = $testAnswerId;
    }

    /**
     * @return int
     */
    public function getTestAnswerId()
    {
        return $this->testAnswerId;
    }


}
