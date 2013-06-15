<?php
namespace Model\Table\Generated;

use \Inditel\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Model\Entity\UserEntity;

/**
 *
 */
class UserAbstractTable extends AbstractTableGateway
{

    public function __construct(\Zend\Db\Adapter\Adapter $adapter)
    {
        parent::__construct($adapter, 'user', new UserEntity());
    }

    public function getMetadataMapping()
    {
        return array (
          'id' => 'id',
          'password' => 'password',
          'firstName' => 'firstName',
          'lastName' => 'lastName',
          'birthday' => 'birthday',
          'personalEmail' => 'personalEmail',
          'activated' => 'activated',
        );
    }


}
