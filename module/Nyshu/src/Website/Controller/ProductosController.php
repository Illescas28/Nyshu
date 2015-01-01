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
use ProductQuery;
use ProductphotoQuery;
use CategoryQuery;

/**
 * Class ProductosController
 * @package Website\Controller
 */
class ProductosController extends AbstractActionController
{
    /**
     * @return array
     */
    private function getCategorias(){
        //Lectura de la tabla category
        $categoryQuery = CategoryQuery::create()->find();
        $categoryQueryArray = $categoryQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME);
        return $categoryQueryArray;
    }

    /**
     * @param $idcategory
     * @return array
     */
    private function getProductos($idcategory){
        if($idcategory == null){
            //Lectura de la tabla product
            $productQuery = ProductQuery::create()->find();
            $productQueryArray = $productQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            //Lectura de la tabla productphoto
            foreach($productQuery as $productEntity){
                $productphotoQuery[$productEntity->getIdproduct()] = ProductphotoQuery::create()->filterByIdproduct($productEntity->getIdproduct())->find();
                $productphotoQueryArray[$productEntity->getIdproduct()] = $productphotoQuery[$productEntity->getIdproduct()]->toArray(null,false,BasePeer::TYPE_FIELDNAME);
            }
        }else{
            //Lectura de la tabla product
            $productQuery = ProductQuery::create()->filterByIdcategory($idcategory)->find();
            $productQueryArray = $productQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            // Obtenemos el nombre de la categoría
            $categoryQuery = CategoryQuery::create()->filterByIdcategory($idcategory)->findOne();
            $categoryName = $categoryQuery->getCategoryName();

            //Lectura de la tabla productphoto
            foreach($productQuery as $productEntity){
                $productphotoQuery[$productEntity->getIdproduct()] = ProductphotoQuery::create()->filterByIdproduct($productEntity->getIdproduct())->find();
                $productphotoQueryArray[$productEntity->getIdproduct()] = $productphotoQuery[$productEntity->getIdproduct()]->toArray(null,false,BasePeer::TYPE_FIELDNAME);
            }
        }

        return array(
            'category_name' => $categoryName,
            'product_collection' => $productQueryArray,
            'productphoto_by_product' => $productphotoQueryArray
        );
    }

    /**
     * @return array|ViewModel
     */
    public function indexAction()
    {

        $idcategory = $this->params()->fromRoute('id');

        return new ViewModel(array(
            'productos'     =>  $this->getProductos($idcategory),
            'category'      =>  $this->getCategorias(),
        ));
    }

    /**
     * @return array
     */
    public function verAction(){

        $idproduct = $this->params()->fromRoute('idproduct');

        //Lectura de la tabla product
        $productQuery = ProductQuery::create()->filterByIdproduct($idproduct)->findOne();
        //Lectura de la tabla productphoto
        $productphotoQuery = ProductphotoQuery::create()->filterByIdproduct($idproduct)->find();
        return array(
            'product' => $productQuery,
            'productphoto' => $productphotoQuery,
        );
    }
}
