<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\PaymentEntity;

/**
 *
 */
class PaymentAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'payment', new PaymentEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'datetime' => 'datetime',
          'price' => 'price',
          'channel' => 'channel',
          'companyId' => 'companyId',
          'userJobId' => 'userJobId',
          'packageId' => 'packageId',
        );
    }


}
