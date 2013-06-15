<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\TestEntity;

/**
 *
 */
class TestAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'test', new TestEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'name' => 'name',
        );
    }


}
