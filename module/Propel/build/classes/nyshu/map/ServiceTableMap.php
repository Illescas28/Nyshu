<?php



/**
 * This class defines the structure of the 'service' table.
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
class ServiceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'nyshu.map.ServiceTableMap';

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
        $this->setName('service');
        $this->setPhpName('Service');
        $this->setClassname('Service');
        $this->setPackage('nyshu');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idservice', 'Idservice', 'INTEGER', true, null, null);
        $this->addColumn('service_name', 'ServiceName', 'VARCHAR', true, 45, null);
        $this->addColumn('service_description', 'ServiceDescription', 'LONGVARCHAR', true, null, null);
        $this->addColumn('service_img', 'ServiceImg', 'LONGVARCHAR', true, null, null);
        $this->addColumn('service_background_img', 'ServiceBackgroundImg', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // ServiceTableMap
