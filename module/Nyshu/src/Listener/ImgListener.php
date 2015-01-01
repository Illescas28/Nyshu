<?php

namespace Listener;

use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

class ImgListener implements ListenerAggregateInterface
{
    protected $listeners=array();
    /*
     * Enlace con el listener de la aplicacion con la accion principal de onDispatch y maxima prioridad 1000
     */
    public function attach(EventManagerInterface $events){
        $this->listeners[]=$events->attach(MvcEvent::EVENT_DISPATCH,array($this,'onDispatch'),900);
    }

    //Elimina todos los eventos para que se use el onDispatch
    public function detach(EventManagerInterface $events)
    {

        foreach($this->listeners as $index => $listener){
            if($events->detach($listener)){
                unset($this->listeners[$index]);
            }
        }
    }

    //Decisiones personalizadas

    public function onDispatch (MvcEvent $e){
        define('IMG_PRODUCTOS', '/Applications/AMPPS/www/NyshuZF2/dev/public_html/img/products');
        define('IMG_SERVICIOS', '/Applications/AMPPS/www/NyshuZF2/dev/public_html/img/services');
        define('IMG_SLIDES', '/Applications/AMPPS/www/NyshuZF2/dev/public_html/img/slides');
        define('IMG_ELEMENTIMG', '/Applications/AMPPS/www/NyshuZF2/dev/public_html/img/elementimg');
        define('EDIT_IMG', '/Applications/AMPPS/www/NyshuZF2/dev/public_html');
        define('DELETE_IMG', '/Applications/AMPPS/www/NyshuZF2/dev/public_html');
    }

    //Decisiones personalizadas

    /*
    public function onDispatch (MvcEvent $e){
        define('IMG_PRODUCTOS', '/home/nyshunet/public_html/img/products');
        define('IMG_SERVICIOS', '/home/nyshunet/public_html/img/services');
        define('IMG_SLIDES', '/home/nyshunet/public_html/img/slides');
        define('IMG_ELEMENTIMG', '/home/nyshunet/public_html/img/elementimg');
        define('EDIT_IMG', '/home/nyshunet/public_html');
        define('DELETE_IMG', '/home/nyshunet/public_html');
    }
    */
}