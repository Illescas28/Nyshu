<?php



/**
 * This class defines the structure of the 'elementtext' table.
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
class ElementtextTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'nyshu.map.ElementtextTableMap';

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
        $this->setName('elementtext');
        $this->setPhpName('Elementtext');
        $this->setClassname('Elementtext');
        $this->setPackage('nyshu');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idelementtext', 'Idelementtext', 'INTEGER', true, null, null);
        $this->addColumn('elementtext_description', 'ElementtextDescription', 'LONGVARCHAR', true, null, null);
        $this->addColumn('elementtext_icon', 'ElementtextIcon', 'LONGVARCHAR', false, null, null);
        $this->addColumn('elementtext_type', 'ElementtextType', 'CHAR', true, null, null);
        $this->getColumn('elementtext_type', false)->setValueSet(array (
  0 => 'text_botton',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ElementtextTableMap
