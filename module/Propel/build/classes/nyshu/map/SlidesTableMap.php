<?php



/**
 * This class defines the structure of the 'slides' table.
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
class SlidesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'nyshu.map.SlidesTableMap';

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
        $this->setName('slides');
        $this->setPhpName('Slides');
        $this->setClassname('Slides');
        $this->setPackage('nyshu');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idslides', 'Idslides', 'INTEGER', true, null, null);
        $this->addColumn('slides_title', 'SlidesTitle', 'LONGVARCHAR', false, null, null);
        $this->addColumn('slides_description', 'SlidesDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('slides_img', 'SlidesImg', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // SlidesTableMap
