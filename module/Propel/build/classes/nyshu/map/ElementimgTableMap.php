<?php



/**
 * This class defines the structure of the 'elementimg' table.
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
class ElementimgTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'nyshu.map.ElementimgTableMap';

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
        $this->setName('elementimg');
        $this->setPhpName('Elementimg');
        $this->setClassname('Elementimg');
        $this->setPackage('nyshu');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idelementimg', 'Idelementimg', 'INTEGER', true, null, null);
        $this->addColumn('elementimg_img', 'ElementimgImg', 'LONGVARCHAR', true, null, null);
        $this->addColumn('elementimg_type', 'ElementimgType', 'CHAR', true, null, null);
        $this->getColumn('elementimg_type', false)->setValueSet(array (
  0 => 'img_top',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ElementimgTableMap
