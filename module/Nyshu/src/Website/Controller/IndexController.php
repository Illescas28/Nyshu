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

//// Propel ////
use BasePeer;
use SlidesQuery;
use ElementimgQuery;
use ElementtitleQuery;
use ElementtextQuery;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        $slidesQuery = SlidesQuery::create()->find();
        $elementimgQuery = ElementimgQuery::create()->find();
        $elementtitleQuery = ElementtitleQuery::create()->find();
        $elementtextQuery = ElementtextQuery::create()->find();

        $countText=0;
        for($i=1; $i<=$elementtextQuery->count(); $i++){
            if(($i % 3) == 0){
                $countText++;
            }
        }
        return new ViewModel(array(
            'slides'     =>  $slidesQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME),
            'elementimgs'     =>  $elementimgQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME),
            'elementtitles'     =>  $elementtitleQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME),
            'elementtexts'     =>  $elementtextQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME),
            'countTitle' => $elementtitleQuery->count(),
            'modText' => $countText,
        ));
    }
}
