<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;


use Application\Service\SampleService;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * @var Adapter
     */
    private $adapter;

    /**
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter )
    {
        $this->adapter = $adapter;
    }


    public function indexAction()
    {

        $f = new SampleService();

        $sql = new Sql($this->adapter);
        $select = $sql->select()->from('test')->order("name");

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        return new ViewModel();
    }
}
