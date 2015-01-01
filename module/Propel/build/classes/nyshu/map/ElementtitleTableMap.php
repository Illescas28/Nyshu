<?php



/**
 * This class defines the structure of the 'elementtitle' table.
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
class ElementtitleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'nyshu.map.ElementtitleTableMap';

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
        $this->setName('elementtitle');
        $this->setPhpName('Elementtitle');
        $this->setClassname('Elementtitle');
        $this->setPackage('nyshu');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idelementtitle', 'Idelementtitle', 'INTEGER', true, null, null);
        $this->addColumn('elementtitle_title', 'ElementtitleTitle', 'VARCHAR', false, 45, null);
        $this->addColumn('elementtitle_type', 'ElementtitleType', 'CHAR', false, null, null);
        $this->getColumn('elementtitle_type', false)->setValueSet(array (
  0 => 'text_top',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ElementtitleTableMap
