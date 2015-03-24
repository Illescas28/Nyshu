<?php



/**
 * This class defines the structure of the 'productquestion' table.
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
class ProductquestionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'muebleria.map.ProductquestionTableMap';

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
        $this->setName('productquestion');
        $this->setPhpName('Productquestion');
        $this->setClassname('Productquestion');
        $this->setPackage('muebleria');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductquestion', 'Idproductquestion', 'INTEGER', true, null, null);
        $this->addForeignKey('idproduct', 'Idproduct', 'INTEGER', 'product', 'idproduct', true, null, null);
        $this->addColumn('productquestion_requester_name', 'ProductquestionRequesterName', 'VARCHAR', true, 255, null);
        $this->addColumn('productquestion_requester_email', 'ProductquestionRequesterEmail', 'VARCHAR', true, 255, null);
        $this->addColumn('productquestion_requester_message', 'ProductquestionRequesterMessage', 'VARCHAR', true, 255, null);
        $this->addColumn('productquestion_requester_date', 'ProductquestionRequesterDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('productquestion_reply', 'ProductquestionReply', 'VARCHAR', false, 45, null);
        $this->addColumn('productquestion_reply_date', 'ProductquestionReplyDate', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProductquestionTableMap
