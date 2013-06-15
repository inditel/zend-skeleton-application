<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\CountryEntity;

/**
 *
 */
class CountryAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'country', new CountryEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'name' => 'name',
          'key' => 'key',
        );
    }


}
