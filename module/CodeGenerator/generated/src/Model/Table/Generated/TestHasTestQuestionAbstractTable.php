<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\TestHasTestQuestionEntity;

/**
 *
 */
class TestHasTestQuestionAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'test_has_test_question', new TestHasTestQuestionEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'testId' => 'testId',
          'testQuestionId' => 'testQuestionId',
        );
    }


}
