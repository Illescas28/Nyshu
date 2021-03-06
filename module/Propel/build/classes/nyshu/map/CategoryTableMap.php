<?php



/**
 * This class defines the structure of the 'category' table.
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
class CategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'nyshu.map.CategoryTableMap';

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
        $this->setName('category');
        $this->setPhpName('Category');
        $this->setClassname('Category');
        $this->setPackage('nyshu');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idcategory', 'Idcategory', 'INTEGER', true, null, null);
        $this->addColumn('category_name', 'CategoryName', 'VARCHAR', true, 255, null);
        $this->addColumn('category_icon', 'CategoryIcon', 'VARCHAR', false, 45, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'Product', RelationMap::ONE_TO_MANY, array('idcategory' => 'idcategory', ), 'CASCADE', 'CASCADE', 'Products');
    } // buildRelations()

} // CategoryTableMap
