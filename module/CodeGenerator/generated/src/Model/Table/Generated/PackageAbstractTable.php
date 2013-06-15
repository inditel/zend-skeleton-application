<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\PackageEntity;

/**
 *
 */
class PackageAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'package', new PackageEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'price' => 'price',
          'type' => 'type',
          'name' => 'name',
          'timePeriodLength' => 'timePeriodLength',
        );
    }


}
