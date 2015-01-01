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
            // Routes Panel
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
            'panel-element-img' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/elemento-imagen[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|editar|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\ElementoImagen',
                        'action'     => 'listar',
                    ),
                ),
            ),
            'panel-element-title' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/elemento-titulo[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|editar|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\ElementoTitulo',
                        'action'     => 'listar',
                    ),
                ),
            ),
            'panel-element-text' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/elemento-texto[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|editar|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\ElementoTexto',
                        'action'     => 'listar',
                    ),
                ),
            ),
            'panel-slides' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/slides[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|editar|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\Slides',
                        'action'     => 'listar',
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
            'panel-servicios' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/servicios[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|editar|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\Servicios',
                        'action'     => 'listar',
                    ),
                ),
            ),
            'panel-contacto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/panel/contacto[/:action][/:id][/]',
                    'constraints' => array(
                        'action' => 'nuevo|editar|eliminar',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Panel\Controller\Contacto',
                        'action'     => 'listar',
                    ),
                ),
            ),

            // Routes Website
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
                    'route'    => '/category[/:id]/productos[/:action][/:idproduct][/]',
                    'constraints' => array(
                        'action' => 'ver',
                        'id'     => '[0-9]+',
                        'idproduct'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Website\Controller\Productos',
                        'action'     => 'index',
                    ),
                ),
            ),
            'website-servicios' => array(
                'type'=>'segment',
                'options'=>array(
                    'route'=> '/servicios',
                    'defaults'=> array(
                        'controller' => 'Website\Controller\Servicios',
                        'action'     => 'index',
                    ),
                ),
            ),
            'website-nosotros' => array(
                'type'=>'segment',
                'options'=>array(
                    'route'=> '/nosotros',
                    'defaults'=> array(
                        'controller' => 'Website\Controller\Nosotros',
                        'action'     => 'index',
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
            'Panel\Controller\ElementoImagen'   => 'Panel\Controller\ElementoImagen\ElementoImagenController',
            'Panel\Controller\ElementoTexto'    => 'Panel\Controller\ElementoTexto\ElementoTextoController',
            'Panel\Controller\ElementoTitulo'   => 'Panel\Controller\ElementoTitulo\ElementoTituloController',
            'Panel\Controller\Slides'           => 'Panel\Controller\Slides\SlidesController',
            'Panel\Controller\Categoria'        => 'Panel\Controller\Categoria\CategoriaController',
            'Panel\Controller\Producto'         => 'Panel\Controller\Producto\ProductoController',
            'Panel\Controller\ProductoFoto'     => 'Panel\Controller\ProductoFoto\ProductoFotoController',
            'Panel\Controller\Servicios'        => 'Panel\Controller\Servicios\ServiciosController',
            'Panel\Controller\Contacto'         => 'Panel\Controller\Contacto\ContactoController',

            // Website
            'Website\Controller\Index'      => 'Website\Controller\IndexController',
            'Website\Controller\Productos'  => 'Website\Controller\ProductosController',
            'Website\Controller\Servicios'  => 'Website\Controller\ServiciosController',
            'Website\Controller\Nosotros'   => 'Website\Controller\NosotrosController',
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
