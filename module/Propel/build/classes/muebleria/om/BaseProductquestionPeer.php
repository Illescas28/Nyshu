<?php


/**
 * Base static class for performing query and update operations on the 'productquestion' table.
 *
 *
 *
 * @package propel.generator.muebleria.om
 */
abstract class BaseProductquestionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'muebleria';

    /** the table name for this class */
    const TABLE_NAME = 'productquestion';

    /** the related Propel class for this table */
    const OM_CLASS = 'Productquestion';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ProductquestionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the idproductquestion field */
    const IDPRODUCTQUESTION = 'productquestion.idproductquestion';

    /** the column name for the idproduct field */
    const IDPRODUCT = 'productquestion.idproduct';

    /** the column name for the productquestion_requester_name field */
    const PRODUCTQUESTION_REQUESTER_NAME = 'productquestion.productquestion_requester_name';

    /** the column name for the productquestion_requester_email field */
    const PRODUCTQUESTION_REQUESTER_EMAIL = 'productquestion.productquestion_requester_email';

    /** the column name for the productquestion_requester_message field */
    const PRODUCTQUESTION_REQUESTER_MESSAGE = 'productquestion.productquestion_requester_message';

    /** the column name for the productquestion_requester_date field */
    const PRODUCTQUESTION_REQUESTER_DATE = 'productquestion.productquestion_requester_date';

    /** the column name for the productquestion_reply field */
    const PRODUCTQUESTION_REPLY = 'productquestion.productquestion_reply';

    /** the column name for the productquestion_reply_date field */
    const PRODUCTQUESTION_REPLY_DATE = 'productquestion.productquestion_reply_date';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Productquestion objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Productquestion[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProductquestionPeer::$fieldNames[ProductquestionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idproductquestion', 'Idproduct', 'ProductquestionRequesterName', 'ProductquestionRequesterEmail', 'ProductquestionRequesterMessage', 'ProductquestionRequesterDate', 'ProductquestionReply', 'ProductquestionReplyDate', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idproductquestion', 'idproduct', 'productquestionRequesterName', 'productquestionRequesterEmail', 'productquestionRequesterMessage', 'productquestionRequesterDate', 'productquestionReply', 'productquestionReplyDate', ),
        BasePeer::TYPE_COLNAME => array (ProductquestionPeer::IDPRODUCTQUESTION, ProductquestionPeer::IDPRODUCT, ProductquestionPeer::PRODUCTQUESTION_REQUESTER_NAME, ProductquestionPeer::PRODUCTQUESTION_REQUESTER_EMAIL, ProductquestionPeer::PRODUCTQUESTION_REQUESTER_MESSAGE, ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE, ProductquestionPeer::PRODUCTQUESTION_REPLY, ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDPRODUCTQUESTION', 'IDPRODUCT', 'PRODUCTQUESTION_REQUESTER_NAME', 'PRODUCTQUESTION_REQUESTER_EMAIL', 'PRODUCTQUESTION_REQUESTER_MESSAGE', 'PRODUCTQUESTION_REQUESTER_DATE', 'PRODUCTQUESTION_REPLY', 'PRODUCTQUESTION_REPLY_DATE', ),
        BasePeer::TYPE_FIELDNAME => array ('idproductquestion', 'idproduct', 'productquestion_requester_name', 'productquestion_requester_email', 'productquestion_requester_message', 'productquestion_requester_date', 'productquestion_reply', 'productquestion_reply_date', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProductquestionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idproductquestion' => 0, 'Idproduct' => 1, 'ProductquestionRequesterName' => 2, 'ProductquestionRequesterEmail' => 3, 'ProductquestionRequesterMessage' => 4, 'ProductquestionRequesterDate' => 5, 'ProductquestionReply' => 6, 'ProductquestionReplyDate' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idproductquestion' => 0, 'idproduct' => 1, 'productquestionRequesterName' => 2, 'productquestionRequesterEmail' => 3, 'productquestionRequesterMessage' => 4, 'productquestionRequesterDate' => 5, 'productquestionReply' => 6, 'productquestionReplyDate' => 7, ),
        BasePeer::TYPE_COLNAME => array (ProductquestionPeer::IDPRODUCTQUESTION => 0, ProductquestionPeer::IDPRODUCT => 1, ProductquestionPeer::PRODUCTQUESTION_REQUESTER_NAME => 2, ProductquestionPeer::PRODUCTQUESTION_REQUESTER_EMAIL => 3, ProductquestionPeer::PRODUCTQUESTION_REQUESTER_MESSAGE => 4, ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE => 5, ProductquestionPeer::PRODUCTQUESTION_REPLY => 6, ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDPRODUCTQUESTION' => 0, 'IDPRODUCT' => 1, 'PRODUCTQUESTION_REQUESTER_NAME' => 2, 'PRODUCTQUESTION_REQUESTER_EMAIL' => 3, 'PRODUCTQUESTION_REQUESTER_MESSAGE' => 4, 'PRODUCTQUESTION_REQUESTER_DATE' => 5, 'PRODUCTQUESTION_REPLY' => 6, 'PRODUCTQUESTION_REPLY_DATE' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('idproductquestion' => 0, 'idproduct' => 1, 'productquestion_requester_name' => 2, 'productquestion_requester_email' => 3, 'productquestion_requester_message' => 4, 'productquestion_requester_date' => 5, 'productquestion_reply' => 6, 'productquestion_reply_date' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = ProductquestionPeer::getFieldNames($toType);
        $key = isset(ProductquestionPeer::$fieldKeys[$fromType][$name]) ? ProductquestionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProductquestionPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, ProductquestionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProductquestionPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ProductquestionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProductquestionPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ProductquestionPeer::IDPRODUCTQUESTION);
            $criteria->addSelectColumn(ProductquestionPeer::IDPRODUCT);
            $criteria->addSelectColumn(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_NAME);
            $criteria->addSelectColumn(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_EMAIL);
            $criteria->addSelectColumn(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_MESSAGE);
            $criteria->addSelectColumn(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE);
            $criteria->addSelectColumn(ProductquestionPeer::PRODUCTQUESTION_REPLY);
            $criteria->addSelectColumn(ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.idproductquestion');
            $criteria->addSelectColumn($alias . '.idproduct');
            $criteria->addSelectColumn($alias . '.productquestion_requester_name');
            $criteria->addSelectColumn($alias . '.productquestion_requester_email');
            $criteria->addSelectColumn($alias . '.productquestion_requester_message');
            $criteria->addSelectColumn($alias . '.productquestion_requester_date');
            $criteria->addSelectColumn($alias . '.productquestion_reply');
            $criteria->addSelectColumn($alias . '.productquestion_reply_date');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductquestionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductquestionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProductquestionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return Productquestion
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProductquestionPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ProductquestionPeer::populateObjects(ProductquestionPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProductquestionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProductquestionPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param Productquestion $obj A Productquestion object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdproductquestion();
            } // if key === null
            ProductquestionPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Productquestion object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Productquestion) {
                $key = (string) $value->getIdproductquestion();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Productquestion object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProductquestionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Productquestion Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProductquestionPeer::$instances[$key])) {
                return ProductquestionPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (ProductquestionPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ProductquestionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to productquestion
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = ProductquestionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProductquestionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProductquestionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductquestionPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Productquestion object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProductquestionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProductquestionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProductquestionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductquestionPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProductquestionPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Product table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinProduct(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductquestionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductquestionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductquestionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductquestionPeer::IDPRODUCT, ProductPeer::IDPRODUCT, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Productquestion objects pre-filled with their Product objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productquestion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinProduct(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductquestionPeer::DATABASE_NAME);
        }

        ProductquestionPeer::addSelectColumns($criteria);
        $startcol = ProductquestionPeer::NUM_HYDRATE_COLUMNS;
        ProductPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProductquestionPeer::IDPRODUCT, ProductPeer::IDPRODUCT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductquestionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductquestionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProductquestionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductquestionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProductPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProductPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProductPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Productquestion) to $obj2 (Product)
                $obj2->addProductquestion($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductquestionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductquestionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductquestionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductquestionPeer::IDPRODUCT, ProductPeer::IDPRODUCT, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Productquestion objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productquestion objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductquestionPeer::DATABASE_NAME);
        }

        ProductquestionPeer::addSelectColumns($criteria);
        $startcol2 = ProductquestionPeer::NUM_HYDRATE_COLUMNS;

        ProductPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProductPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductquestionPeer::IDPRODUCT, ProductPeer::IDPRODUCT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductquestionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductquestionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductquestionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductquestionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Product rows

            $key2 = ProductPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ProductPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProductPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProductPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Productquestion) to the collection in $obj2 (Product)
                $obj2->addProductquestion($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(ProductquestionPeer::DATABASE_NAME)->getTable(ProductquestionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseProductquestionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseProductquestionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ProductquestionTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return ProductquestionPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Productquestion or Criteria object.
     *
     * @param      mixed $values Criteria or Productquestion object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Productquestion object
        }

        if ($criteria->containsKey(ProductquestionPeer::IDPRODUCTQUESTION) && $criteria->keyContainsValue(ProductquestionPeer::IDPRODUCTQUESTION) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductquestionPeer::IDPRODUCTQUESTION.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProductquestionPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Productquestion or Criteria object.
     *
     * @param      mixed $values Criteria or Productquestion object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProductquestionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProductquestionPeer::IDPRODUCTQUESTION);
            $value = $criteria->remove(ProductquestionPeer::IDPRODUCTQUESTION);
            if ($value) {
                $selectCriteria->add(ProductquestionPeer::IDPRODUCTQUESTION, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProductquestionPeer::TABLE_NAME);
            }

        } else { // $values is Productquestion object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProductquestionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the productquestion table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProductquestionPeer::TABLE_NAME, $con, ProductquestionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductquestionPeer::clearInstancePool();
            ProductquestionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Productquestion or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Productquestion object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProductquestionPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Productquestion) { // it's a model object
            // invalidate the cache for this single object
            ProductquestionPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductquestionPeer::DATABASE_NAME);
            $criteria->add(ProductquestionPeer::IDPRODUCTQUESTION, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProductquestionPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProductquestionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProductquestionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Productquestion object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Productquestion $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProductquestionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProductquestionPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(ProductquestionPeer::DATABASE_NAME, ProductquestionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Productquestion
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProductquestionPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProductquestionPeer::DATABASE_NAME);
        $criteria->add(ProductquestionPeer::IDPRODUCTQUESTION, $pk);

        $v = ProductquestionPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Productquestion[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProductquestionPeer::DATABASE_NAME);
            $criteria->add(ProductquestionPeer::IDPRODUCTQUESTION, $pks, Criteria::IN);
            $objs = ProductquestionPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseProductquestionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProductquestionPeer::buildTableMap();

