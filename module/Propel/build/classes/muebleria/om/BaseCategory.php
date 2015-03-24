<?php


/**
 * Base class that represents a row from the 'category' table.
 *
 *
 *
 * @package    propel.generator.muebleria.om
 */
abstract class BaseCategory extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CategoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CategoryPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idcategory field.
     * @var        int
     */
    protected $idcategory;

    /**
     * The value for the category_name field.
     * @var        string
     */
    protected $category_name;

    /**
     * The value for the category_dependency field.
     * @var        int
     */
    protected $category_dependency;

    /**
     * @var        Category
     */
    protected $aCategoryRelatedByCategoryDependency;

    /**
     * @var        PropelObjectCollection|Category[] Collection to store aggregation of Category objects.
     */
    protected $collCategorysRelatedByIdcategory;
    protected $collCategorysRelatedByIdcategoryPartial;

    /**
     * @var        PropelObjectCollection|Product[] Collection to store aggregation of Product objects.
     */
    protected $collProducts;
    protected $collProductsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $categorysRelatedByIdcategoryScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productsScheduledForDeletion = null;

    /**
     * Get the [idcategory] column value.
     *
     * @return int
     */
    public function getIdcategory()
    {

        return $this->idcategory;
    }

    /**
     * Get the [category_name] column value.
     *
     * @return string
     */
    public function getCategoryName()
    {

        return $this->category_name;
    }

    /**
     * Get the [category_dependency] column value.
     *
     * @return int
     */
    public function getCategoryDependency()
    {

        return $this->category_dependency;
    }

    /**
     * Set the value of [idcategory] column.
     *
     * @param  int $v new value
     * @return Category The current object (for fluent API support)
     */
    public function setIdcategory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcategory !== $v) {
            $this->idcategory = $v;
            $this->modifiedColumns[] = CategoryPeer::IDCATEGORY;
        }


        return $this;
    } // setIdcategory()

    /**
     * Set the value of [category_name] column.
     *
     * @param  string $v new value
     * @return Category The current object (for fluent API support)
     */
    public function setCategoryName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->category_name !== $v) {
            $this->category_name = $v;
            $this->modifiedColumns[] = CategoryPeer::CATEGORY_NAME;
        }


        return $this;
    } // setCategoryName()

    /**
     * Set the value of [category_dependency] column.
     *
     * @param  int $v new value
     * @return Category The current object (for fluent API support)
     */
    public function setCategoryDependency($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->category_dependency !== $v) {
            $this->category_dependency = $v;
            $this->modifiedColumns[] = CategoryPeer::CATEGORY_DEPENDENCY;
        }

        if ($this->aCategoryRelatedByCategoryDependency !== null && $this->aCategoryRelatedByCategoryDependency->getIdcategory() !== $v) {
            $this->aCategoryRelatedByCategoryDependency = null;
        }


        return $this;
    } // setCategoryDependency()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->idcategory = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->category_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->category_dependency = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = CategoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Category object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aCategoryRelatedByCategoryDependency !== null && $this->category_dependency !== $this->aCategoryRelatedByCategoryDependency->getIdcategory()) {
            $this->aCategoryRelatedByCategoryDependency = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCategoryRelatedByCategoryDependency = null;
            $this->collCategorysRelatedByIdcategory = null;

            $this->collProducts = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CategoryQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CategoryPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCategoryRelatedByCategoryDependency !== null) {
                if ($this->aCategoryRelatedByCategoryDependency->isModified() || $this->aCategoryRelatedByCategoryDependency->isNew()) {
                    $affectedRows += $this->aCategoryRelatedByCategoryDependency->save($con);
                }
                $this->setCategoryRelatedByCategoryDependency($this->aCategoryRelatedByCategoryDependency);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->categorysRelatedByIdcategoryScheduledForDeletion !== null) {
                if (!$this->categorysRelatedByIdcategoryScheduledForDeletion->isEmpty()) {
                    CategoryQuery::create()
                        ->filterByPrimaryKeys($this->categorysRelatedByIdcategoryScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->categorysRelatedByIdcategoryScheduledForDeletion = null;
                }
            }

            if ($this->collCategorysRelatedByIdcategory !== null) {
                foreach ($this->collCategorysRelatedByIdcategory as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productsScheduledForDeletion !== null) {
                if (!$this->productsScheduledForDeletion->isEmpty()) {
                    ProductQuery::create()
                        ->filterByPrimaryKeys($this->productsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productsScheduledForDeletion = null;
                }
            }

            if ($this->collProducts !== null) {
                foreach ($this->collProducts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = CategoryPeer::IDCATEGORY;
        if (null !== $this->idcategory) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CategoryPeer::IDCATEGORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CategoryPeer::IDCATEGORY)) {
            $modifiedColumns[':p' . $index++]  = '`idcategory`';
        }
        if ($this->isColumnModified(CategoryPeer::CATEGORY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`category_name`';
        }
        if ($this->isColumnModified(CategoryPeer::CATEGORY_DEPENDENCY)) {
            $modifiedColumns[':p' . $index++]  = '`category_dependency`';
        }

        $sql = sprintf(
            'INSERT INTO `category` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idcategory`':
                        $stmt->bindValue($identifier, $this->idcategory, PDO::PARAM_INT);
                        break;
                    case '`category_name`':
                        $stmt->bindValue($identifier, $this->category_name, PDO::PARAM_STR);
                        break;
                    case '`category_dependency`':
                        $stmt->bindValue($identifier, $this->category_dependency, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdcategory($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCategoryRelatedByCategoryDependency !== null) {
                if (!$this->aCategoryRelatedByCategoryDependency->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCategoryRelatedByCategoryDependency->getValidationFailures());
                }
            }


            if (($retval = CategoryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCategorysRelatedByIdcategory !== null) {
                    foreach ($this->collCategorysRelatedByIdcategory as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProducts !== null) {
                    foreach ($this->collProducts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = CategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdcategory();
                break;
            case 1:
                return $this->getCategoryName();
                break;
            case 2:
                return $this->getCategoryDependency();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Category'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Category'][$this->getPrimaryKey()] = true;
        $keys = CategoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcategory(),
            $keys[1] => $this->getCategoryName(),
            $keys[2] => $this->getCategoryDependency(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCategoryRelatedByCategoryDependency) {
                $result['CategoryRelatedByCategoryDependency'] = $this->aCategoryRelatedByCategoryDependency->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCategorysRelatedByIdcategory) {
                $result['CategorysRelatedByIdcategory'] = $this->collCategorysRelatedByIdcategory->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProducts) {
                $result['Products'] = $this->collProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = CategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdcategory($value);
                break;
            case 1:
                $this->setCategoryName($value);
                break;
            case 2:
                $this->setCategoryDependency($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = CategoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdcategory($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCategoryName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCategoryDependency($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CategoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(CategoryPeer::IDCATEGORY)) $criteria->add(CategoryPeer::IDCATEGORY, $this->idcategory);
        if ($this->isColumnModified(CategoryPeer::CATEGORY_NAME)) $criteria->add(CategoryPeer::CATEGORY_NAME, $this->category_name);
        if ($this->isColumnModified(CategoryPeer::CATEGORY_DEPENDENCY)) $criteria->add(CategoryPeer::CATEGORY_DEPENDENCY, $this->category_dependency);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(CategoryPeer::DATABASE_NAME);
        $criteria->add(CategoryPeer::IDCATEGORY, $this->idcategory);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdcategory();
    }

    /**
     * Generic method to set the primary key (idcategory column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcategory($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdcategory();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Category (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCategoryName($this->getCategoryName());
        $copyObj->setCategoryDependency($this->getCategoryDependency());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCategorysRelatedByIdcategory() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCategoryRelatedByIdcategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProduct($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdcategory(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Category Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return CategoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CategoryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Category object.
     *
     * @param                  Category $v
     * @return Category The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategoryRelatedByCategoryDependency(Category $v = null)
    {
        if ($v === null) {
            $this->setCategoryDependency(NULL);
        } else {
            $this->setCategoryDependency($v->getIdcategory());
        }

        $this->aCategoryRelatedByCategoryDependency = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Category object, it will not be re-added.
        if ($v !== null) {
            $v->addCategoryRelatedByIdcategory($this);
        }


        return $this;
    }


    /**
     * Get the associated Category object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Category The associated Category object.
     * @throws PropelException
     */
    public function getCategoryRelatedByCategoryDependency(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCategoryRelatedByCategoryDependency === null && ($this->category_dependency !== null) && $doQuery) {
            $this->aCategoryRelatedByCategoryDependency = CategoryQuery::create()->findPk($this->category_dependency, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategoryRelatedByCategoryDependency->addCategorysRelatedByIdcategory($this);
             */
        }

        return $this->aCategoryRelatedByCategoryDependency;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('CategoryRelatedByIdcategory' == $relationName) {
            $this->initCategorysRelatedByIdcategory();
        }
        if ('Product' == $relationName) {
            $this->initProducts();
        }
    }

    /**
     * Clears out the collCategorysRelatedByIdcategory collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Category The current object (for fluent API support)
     * @see        addCategorysRelatedByIdcategory()
     */
    public function clearCategorysRelatedByIdcategory()
    {
        $this->collCategorysRelatedByIdcategory = null; // important to set this to null since that means it is uninitialized
        $this->collCategorysRelatedByIdcategoryPartial = null;

        return $this;
    }

    /**
     * reset is the collCategorysRelatedByIdcategory collection loaded partially
     *
     * @return void
     */
    public function resetPartialCategorysRelatedByIdcategory($v = true)
    {
        $this->collCategorysRelatedByIdcategoryPartial = $v;
    }

    /**
     * Initializes the collCategorysRelatedByIdcategory collection.
     *
     * By default this just sets the collCategorysRelatedByIdcategory collection to an empty array (like clearcollCategorysRelatedByIdcategory());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCategorysRelatedByIdcategory($overrideExisting = true)
    {
        if (null !== $this->collCategorysRelatedByIdcategory && !$overrideExisting) {
            return;
        }
        $this->collCategorysRelatedByIdcategory = new PropelObjectCollection();
        $this->collCategorysRelatedByIdcategory->setModel('Category');
    }

    /**
     * Gets an array of Category objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Category is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Category[] List of Category objects
     * @throws PropelException
     */
    public function getCategorysRelatedByIdcategory($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCategorysRelatedByIdcategoryPartial && !$this->isNew();
        if (null === $this->collCategorysRelatedByIdcategory || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCategorysRelatedByIdcategory) {
                // return empty collection
                $this->initCategorysRelatedByIdcategory();
            } else {
                $collCategorysRelatedByIdcategory = CategoryQuery::create(null, $criteria)
                    ->filterByCategoryRelatedByCategoryDependency($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCategorysRelatedByIdcategoryPartial && count($collCategorysRelatedByIdcategory)) {
                      $this->initCategorysRelatedByIdcategory(false);

                      foreach ($collCategorysRelatedByIdcategory as $obj) {
                        if (false == $this->collCategorysRelatedByIdcategory->contains($obj)) {
                          $this->collCategorysRelatedByIdcategory->append($obj);
                        }
                      }

                      $this->collCategorysRelatedByIdcategoryPartial = true;
                    }

                    $collCategorysRelatedByIdcategory->getInternalIterator()->rewind();

                    return $collCategorysRelatedByIdcategory;
                }

                if ($partial && $this->collCategorysRelatedByIdcategory) {
                    foreach ($this->collCategorysRelatedByIdcategory as $obj) {
                        if ($obj->isNew()) {
                            $collCategorysRelatedByIdcategory[] = $obj;
                        }
                    }
                }

                $this->collCategorysRelatedByIdcategory = $collCategorysRelatedByIdcategory;
                $this->collCategorysRelatedByIdcategoryPartial = false;
            }
        }

        return $this->collCategorysRelatedByIdcategory;
    }

    /**
     * Sets a collection of CategoryRelatedByIdcategory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $categorysRelatedByIdcategory A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Category The current object (for fluent API support)
     */
    public function setCategorysRelatedByIdcategory(PropelCollection $categorysRelatedByIdcategory, PropelPDO $con = null)
    {
        $categorysRelatedByIdcategoryToDelete = $this->getCategorysRelatedByIdcategory(new Criteria(), $con)->diff($categorysRelatedByIdcategory);


        $this->categorysRelatedByIdcategoryScheduledForDeletion = $categorysRelatedByIdcategoryToDelete;

        foreach ($categorysRelatedByIdcategoryToDelete as $categoryRelatedByIdcategoryRemoved) {
            $categoryRelatedByIdcategoryRemoved->setCategoryRelatedByCategoryDependency(null);
        }

        $this->collCategorysRelatedByIdcategory = null;
        foreach ($categorysRelatedByIdcategory as $categoryRelatedByIdcategory) {
            $this->addCategoryRelatedByIdcategory($categoryRelatedByIdcategory);
        }

        $this->collCategorysRelatedByIdcategory = $categorysRelatedByIdcategory;
        $this->collCategorysRelatedByIdcategoryPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Category objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Category objects.
     * @throws PropelException
     */
    public function countCategorysRelatedByIdcategory(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCategorysRelatedByIdcategoryPartial && !$this->isNew();
        if (null === $this->collCategorysRelatedByIdcategory || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCategorysRelatedByIdcategory) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCategorysRelatedByIdcategory());
            }
            $query = CategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCategoryRelatedByCategoryDependency($this)
                ->count($con);
        }

        return count($this->collCategorysRelatedByIdcategory);
    }

    /**
     * Method called to associate a Category object to this object
     * through the Category foreign key attribute.
     *
     * @param    Category $l Category
     * @return Category The current object (for fluent API support)
     */
    public function addCategoryRelatedByIdcategory(Category $l)
    {
        if ($this->collCategorysRelatedByIdcategory === null) {
            $this->initCategorysRelatedByIdcategory();
            $this->collCategorysRelatedByIdcategoryPartial = true;
        }

        if (!in_array($l, $this->collCategorysRelatedByIdcategory->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCategoryRelatedByIdcategory($l);

            if ($this->categorysRelatedByIdcategoryScheduledForDeletion and $this->categorysRelatedByIdcategoryScheduledForDeletion->contains($l)) {
                $this->categorysRelatedByIdcategoryScheduledForDeletion->remove($this->categorysRelatedByIdcategoryScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CategoryRelatedByIdcategory $categoryRelatedByIdcategory The categoryRelatedByIdcategory object to add.
     */
    protected function doAddCategoryRelatedByIdcategory($categoryRelatedByIdcategory)
    {
        $this->collCategorysRelatedByIdcategory[]= $categoryRelatedByIdcategory;
        $categoryRelatedByIdcategory->setCategoryRelatedByCategoryDependency($this);
    }

    /**
     * @param	CategoryRelatedByIdcategory $categoryRelatedByIdcategory The categoryRelatedByIdcategory object to remove.
     * @return Category The current object (for fluent API support)
     */
    public function removeCategoryRelatedByIdcategory($categoryRelatedByIdcategory)
    {
        if ($this->getCategorysRelatedByIdcategory()->contains($categoryRelatedByIdcategory)) {
            $this->collCategorysRelatedByIdcategory->remove($this->collCategorysRelatedByIdcategory->search($categoryRelatedByIdcategory));
            if (null === $this->categorysRelatedByIdcategoryScheduledForDeletion) {
                $this->categorysRelatedByIdcategoryScheduledForDeletion = clone $this->collCategorysRelatedByIdcategory;
                $this->categorysRelatedByIdcategoryScheduledForDeletion->clear();
            }
            $this->categorysRelatedByIdcategoryScheduledForDeletion[]= $categoryRelatedByIdcategory;
            $categoryRelatedByIdcategory->setCategoryRelatedByCategoryDependency(null);
        }

        return $this;
    }

    /**
     * Clears out the collProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Category The current object (for fluent API support)
     * @see        addProducts()
     */
    public function clearProducts()
    {
        $this->collProducts = null; // important to set this to null since that means it is uninitialized
        $this->collProductsPartial = null;

        return $this;
    }

    /**
     * reset is the collProducts collection loaded partially
     *
     * @return void
     */
    public function resetPartialProducts($v = true)
    {
        $this->collProductsPartial = $v;
    }

    /**
     * Initializes the collProducts collection.
     *
     * By default this just sets the collProducts collection to an empty array (like clearcollProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProducts($overrideExisting = true)
    {
        if (null !== $this->collProducts && !$overrideExisting) {
            return;
        }
        $this->collProducts = new PropelObjectCollection();
        $this->collProducts->setModel('Product');
    }

    /**
     * Gets an array of Product objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Category is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Product[] List of Product objects
     * @throws PropelException
     */
    public function getProducts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductsPartial && !$this->isNew();
        if (null === $this->collProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProducts) {
                // return empty collection
                $this->initProducts();
            } else {
                $collProducts = ProductQuery::create(null, $criteria)
                    ->filterByCategory($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductsPartial && count($collProducts)) {
                      $this->initProducts(false);

                      foreach ($collProducts as $obj) {
                        if (false == $this->collProducts->contains($obj)) {
                          $this->collProducts->append($obj);
                        }
                      }

                      $this->collProductsPartial = true;
                    }

                    $collProducts->getInternalIterator()->rewind();

                    return $collProducts;
                }

                if ($partial && $this->collProducts) {
                    foreach ($this->collProducts as $obj) {
                        if ($obj->isNew()) {
                            $collProducts[] = $obj;
                        }
                    }
                }

                $this->collProducts = $collProducts;
                $this->collProductsPartial = false;
            }
        }

        return $this->collProducts;
    }

    /**
     * Sets a collection of Product objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $products A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Category The current object (for fluent API support)
     */
    public function setProducts(PropelCollection $products, PropelPDO $con = null)
    {
        $productsToDelete = $this->getProducts(new Criteria(), $con)->diff($products);


        $this->productsScheduledForDeletion = $productsToDelete;

        foreach ($productsToDelete as $productRemoved) {
            $productRemoved->setCategory(null);
        }

        $this->collProducts = null;
        foreach ($products as $product) {
            $this->addProduct($product);
        }

        $this->collProducts = $products;
        $this->collProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Product objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Product objects.
     * @throws PropelException
     */
    public function countProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductsPartial && !$this->isNew();
        if (null === $this->collProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProducts());
            }
            $query = ProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCategory($this)
                ->count($con);
        }

        return count($this->collProducts);
    }

    /**
     * Method called to associate a Product object to this object
     * through the Product foreign key attribute.
     *
     * @param    Product $l Product
     * @return Category The current object (for fluent API support)
     */
    public function addProduct(Product $l)
    {
        if ($this->collProducts === null) {
            $this->initProducts();
            $this->collProductsPartial = true;
        }

        if (!in_array($l, $this->collProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProduct($l);

            if ($this->productsScheduledForDeletion and $this->productsScheduledForDeletion->contains($l)) {
                $this->productsScheduledForDeletion->remove($this->productsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Product $product The product object to add.
     */
    protected function doAddProduct($product)
    {
        $this->collProducts[]= $product;
        $product->setCategory($this);
    }

    /**
     * @param	Product $product The product object to remove.
     * @return Category The current object (for fluent API support)
     */
    public function removeProduct($product)
    {
        if ($this->getProducts()->contains($product)) {
            $this->collProducts->remove($this->collProducts->search($product));
            if (null === $this->productsScheduledForDeletion) {
                $this->productsScheduledForDeletion = clone $this->collProducts;
                $this->productsScheduledForDeletion->clear();
            }
            $this->productsScheduledForDeletion[]= clone $product;
            $product->setCategory(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idcategory = null;
        $this->category_name = null;
        $this->category_dependency = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collCategorysRelatedByIdcategory) {
                foreach ($this->collCategorysRelatedByIdcategory as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProducts) {
                foreach ($this->collProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCategoryRelatedByCategoryDependency instanceof Persistent) {
              $this->aCategoryRelatedByCategoryDependency->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCategorysRelatedByIdcategory instanceof PropelCollection) {
            $this->collCategorysRelatedByIdcategory->clearIterator();
        }
        $this->collCategorysRelatedByIdcategory = null;
        if ($this->collProducts instanceof PropelCollection) {
            $this->collProducts->clearIterator();
        }
        $this->collProducts = null;
        $this->aCategoryRelatedByCategoryDependency = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CategoryPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
