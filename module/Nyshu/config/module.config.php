<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'panel-login' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/login[/:action]',
                    'constraints' => array(
                        'action' => 'logout',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\Login',
                        'action'     => 'login',
                    ),
                ),
            ),
            'panel-categoria' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/categoria[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|editar|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\Categoria',
                        'action'     => 'listar',
                    ),
                ),
            ),
            'panel-producto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/producto[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|editar|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\Producto',
                        'action'     => 'listar',
                    ),
                ),
            ),
            'panel-producto-foto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/producto-foto[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\Productofoto',
                        'action'     => 'listar',
                    ),
                ),
            ),
            'website-home' => array(
                'type'=>'segment',
                'options'=>array(
                    'route'=> '/',
                    'defaults'=> array(
                        'controller' => 'Website\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'website-productos' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'=> '/category[/:id]/productos[/]',
                    'defaults'=> array(
                        'controller' => 'Website\Controller\Productos',
                        'action'     => 'index',
                    ),
                    'constrains' => array(
                        'id' => '[0-9]*'
                    ),
                ),
            ),
            'website-contacto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'=> '/contacto[/]',
                    'defaults'=> array(
                        'controller' => 'Website\Controller\Contacto',
                        'action'     => 'index',
                    ),
                    'constrains' => array(
                        'id' => '[0-9]*'
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            // Panel
            'Panel\Controller\Login'            => 'Panel\Controller\Login\LoginController',
            'Panel\Controller\Categoria'        => 'Panel\Controller\Categoria\CategoriaController',
            'Panel\Controller\Producto'         => 'Panel\Controller\Producto\ProductoController',
            'Panel\Controller\ProductoFoto'     => 'Panel\Controller\ProductoFoto\ProductoFotoController',

            // Website
            'Website\Controller\Index'      => 'Website\Controller\IndexController',
            'Website\Controller\Productos'  => 'Website\Controller\ProductosController',
            'Website\Controller\Contacto'   => 'Website\Controller\ContactoController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
