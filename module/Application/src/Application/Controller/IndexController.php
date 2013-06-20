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
}
