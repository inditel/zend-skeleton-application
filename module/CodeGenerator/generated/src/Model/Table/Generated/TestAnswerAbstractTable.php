<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\TestAnswerEntity;

/**
 *
 */
class TestAnswerAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'test_answer', new TestAnswerEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'datetime' => 'datetime',
          'userJobId' => 'userJobId',
          'finished' => 'finished',
        );
    }


}
