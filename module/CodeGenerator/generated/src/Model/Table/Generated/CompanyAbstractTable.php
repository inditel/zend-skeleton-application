<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\CompanyEntity;

/**
 *
 */
class CompanyAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'company', new CompanyEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'name' => 'name',
          'address' => 'address',
          'registrationCode' => 'registrationCode',
          'expires' => 'expires',
          'industry' => 'industry',
          'countryId' => 'countryId',
          'industryId' => 'industryId',
        );
    }


}
