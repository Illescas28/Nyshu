<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Website\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Website\Forms\CategoryForm;

//// Propel ////
use BasePeer;
use ServiceQuery;

/**
 * Class ServiciosController
 * @package Website\Controller
 */
class ServiciosController extends AbstractActionController
{
    /**
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $serviciosQuery = ServiceQuery::create()->find();

        return new ViewModel(array(
            'servicios'     =>  $serviciosQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME),
        ));
    }
}
