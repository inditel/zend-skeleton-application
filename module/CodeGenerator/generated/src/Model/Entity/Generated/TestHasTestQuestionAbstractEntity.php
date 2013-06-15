<?php
namespace Model\Entity\Generated;

use \Inditel\Db\Entity\AbstractEntity;

/**
 *
 */
class TestHasTestQuestionAbstractEntity extends AbstractEntity
{

    /**
     * @var int $testId
     */
    protected $testId = null;

    /**
     * @var int $testQuestionId
     */
    protected $testQuestionId = null;

    /**
     * @param int $testId
     */
    public function setTestId($testId)
    {
        $this->testId = $testId;
    }

    /**
     * @return int
     */
    public function getTestId()
    {
        return $this->testId;
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


}
