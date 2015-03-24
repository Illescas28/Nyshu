<?php



/**
 * This class defines the structure of the 'user' table.
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
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'muebleria.map.UserTableMap';

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
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('muebleria');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('iduser', 'Iduser', 'INTEGER', true, null, null);
        $this->addColumn('user_name', 'UserName', 'VARCHAR', true, 45, null);
        $this->addColumn('user_password', 'UserPassword', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // UserTableMap
