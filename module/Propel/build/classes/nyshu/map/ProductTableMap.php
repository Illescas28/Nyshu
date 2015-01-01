<?php



/**
 * This class defines the structure of the 'product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.nyshu.map
 */
class ProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'nyshu.map.ProductTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('product');
        $this->setPhpName('Product');
        $this->setClassname('Product');
        $this->setPackage('nyshu');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproduct', 'Idproduct', 'INTEGER', true, null, null);
        $this->addForeignKey('idcategory', 'Idcategory', 'INTEGER', 'category', 'idcategory', true, null, null);
        $this->addColumn('product_name', 'ProductName', 'VARCHAR', true, 255, null);
        $this->addColumn('product_description', 'ProductDescription', 'VARCHAR', true, 45, null);
        $this->addColumn('product_img', 'ProductImg', 'VARCHAR', true, 45, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Category', 'Category', RelationMap::MANY_TO_ONE, array('idcategory' => 'idcategory', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productphoto', 'Productphoto', RelationMap::ONE_TO_MANY, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE', 'Productphotos');
    } // buildRelations()

} // ProductTableMap
