<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\QuestionAnswerEntity;

/**
 *
 */
class QuestionAnswerAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'question_answer', new QuestionAnswerEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'testQuestionId' => 'testQuestionId',
          'datetime' => 'datetime',
          'answer' => 'answer',
          'testAnswerId' => 'testAnswerId',
        );
    }


}
