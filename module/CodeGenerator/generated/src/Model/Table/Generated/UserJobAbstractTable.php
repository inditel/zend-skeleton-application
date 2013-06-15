<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\UserJobEntity;

/**
 *
 */
class UserJobAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'user_job', new UserJobEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'userId' => 'userId',
          'companyId' => 'companyId',
          'email' => 'email',
          'emailDomain' => 'emailDomain',
          'isWorking' => 'isWorking',
          'start' => 'start',
          'end' => 'end',
          'isCompanyManager' => 'isCompanyManager',
          'countryId' => 'countryId',
        );
    }


}
