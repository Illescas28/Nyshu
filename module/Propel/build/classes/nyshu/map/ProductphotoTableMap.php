<?php



/**
 * This class defines the structure of the 'productphoto' table.
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
class ProductphotoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'nyshu.map.ProductphotoTableMap';

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
        $this->setName('productphoto');
        $this->setPhpName('Productphoto');
        $this->setClassname('Productphoto');
        $this->setPackage('nyshu');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductphoto', 'Idproductphoto', 'INTEGER', true, null, null);
        $this->addForeignKey('idproduct', 'Idproduct', 'INTEGER', 'product', 'idproduct', true, null, null);
        $this->addColumn('productphoto_img', 'ProductphotoImg', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProductphotoTableMap
