<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\IndustryEntity;

/**
 *
 */
class IndustryAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'industry', new IndustryEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'name' => 'name',
        );
    }


}
