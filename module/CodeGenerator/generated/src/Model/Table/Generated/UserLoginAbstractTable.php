<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\UserLoginEntity;

/**
 *
 */
class UserLoginAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'user_login', new UserLoginEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'type' => 'type',
          'login' => 'login',
          'userId' => 'userId',
        );
    }


}
