<?php



/**
 * This class defines the structure of the 'materialcolor' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.muebleria.map
 */
class MaterialcolorTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'muebleria.map.MaterialcolorTableMap';

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
        $this->setName('materialcolor');
        $this->setPhpName('Materialcolor');
        $this->setClassname('Materialcolor');
        $this->setPackage('muebleria');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmaterialcolor', 'Idmaterialcolor', 'INTEGER', true, null, null);
        $this->addForeignKey('idmaterial', 'Idmaterial', 'INTEGER', 'material', 'idmaterial', true, null, null);
        $this->addColumn('materialcolor_name', 'MaterialcolorName', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Material', 'Material', RelationMap::MANY_TO_ONE, array('idmaterial' => 'idmaterial', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // MaterialcolorTableMap
