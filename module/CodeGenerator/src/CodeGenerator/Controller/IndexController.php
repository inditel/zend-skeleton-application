<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace CodeGenerator\Controller;


use CodeGenerator\CodeGenerator;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function generateAction()
    {
        $view = new ViewModel();
        $form = $this->getServiceLocator()->get('CodeGenerator\Form\GenerateForm');

        $request = $this->getRequest();
        if ($request->isPost()) {

            $adapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
            $config = $this->getServiceLocator()->get('Config');
            $generator = new CodeGenerator($adapter, $config);
            $generator->deleteAllGenerated();
            $generator->generate();

            
            $view->message = 'Generated!';
            $form->setData($request->getPost());
        }

        $view->form = $form;
        return $view;
    }
}
