<?php
namespace Application\Controller;


use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $view = new ViewModel();
        //$view->setTemplate('does not exist');
        //$f = null;
        //$f->xx();
        //throw new \Exception('xxx');
        return $view;
    }

    public function jsonAction()
    {
        return new JsonModel(array('x' => 10));
    }

    public function doctrineAction() {

        $em = $this->getServiceLocator()
            ->get('doctrine.entitymanager.orm_default');
        $data = $em->getRepository('Application\Entity\Test')->findAll();
        /** @var \Application\Entity\Test $row */
        foreach($data as $key=>$row)
        {
            echo $row->getName();
            echo '<br />';
        }

        $this->layout()->setterminal(true);
        return false;
    }
}
