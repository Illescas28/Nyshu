<?php


/**
 * Base class that represents a row from the 'productquestion' table.
 *
 *
 *
 * @package    propel.generator.muebleria.om
 */
abstract class BaseProductquestion extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProductquestionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProductquestionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idproductquestion field.
     * @var        int
     */
    protected $idproductquestion;

    /**
     * The value for the idproduct field.
     * @var        int
     */
    protected $idproduct;

    /**
     * The value for the productquestion_requester_name field.
     * @var        string
     */
    protected $productquestion_requester_name;

    /**
     * The value for the productquestion_requester_email field.
     * @var        string
     */
    protected $productquestion_requester_email;

    /**
     * The value for the productquestion_requester_message field.
     * @var        string
     */
    protected $productquestion_requester_message;

    /**
     * The value for the productquestion_requester_date field.
     * @var        string
     */
    protected $productquestion_requester_date;

    /**
     * The value for the productquestion_reply field.
     * @var        string
     */
    protected $productquestion_reply;

    /**
     * The value for the productquestion_reply_date field.
     * @var        string
     */
    protected $productquestion_reply_date;

    /**
     * @var        Product
     */
    protected $aProduct;

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
     * Get the [idproductquestion] column value.
     *
     * @return int
     */
    public function getIdproductquestion()
    {

        return $this->idproductquestion;
    }

    /**
     * Get the [idproduct] column value.
     *
     * @return int
     */
    public function getIdproduct()
    {

        return $this->idproduct;
    }

    /**
     * Get the [productquestion_requester_name] column value.
     *
     * @return string
     */
    public function getProductquestionRequesterName()
    {

        return $this->productquestion_requester_name;
    }

    /**
     * Get the [productquestion_requester_email] column value.
     *
     * @return string
     */
    public function getProductquestionRequesterEmail()
    {

        return $this->productquestion_requester_email;
    }

    /**
     * Get the [productquestion_requester_message] column value.
     *
     * @return string
     */
    public function getProductquestionRequesterMessage()
    {

        return $this->productquestion_requester_message;
    }

    /**
     * Get the [optionally formatted] temporal [productquestion_requester_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getProductquestionRequesterDate($format = 'Y-m-d H:i:s')
    {
        if ($this->productquestion_requester_date === null) {
            return null;
        }

        if ($this->productquestion_requester_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->productquestion_requester_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->productquestion_requester_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [productquestion_reply] column value.
     *
     * @return string
     */
    public function getProductquestionReply()
    {

        return $this->productquestion_reply;
    }

    /**
     * Get the [optionally formatted] temporal [productquestion_reply_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getProductquestionReplyDate($format = 'Y-m-d H:i:s')
    {
        if ($this->productquestion_reply_date === null) {
            return null;
        }

        if ($this->productquestion_reply_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->productquestion_reply_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->productquestion_reply_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [idproductquestion] column.
     *
     * @param  int $v new value
     * @return Productquestion The current object (for fluent API support)
     */
    public function setIdproductquestion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductquestion !== $v) {
            $this->idproductquestion = $v;
            $this->modifiedColumns[] = ProductquestionPeer::IDPRODUCTQUESTION;
        }


        return $this;
    } // setIdproductquestion()

    /**
     * Set the value of [idproduct] column.
     *
     * @param  int $v new value
     * @return Productquestion The current object (for fluent API support)
     */
    public function setIdproduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproduct !== $v) {
            $this->idproduct = $v;
            $this->modifiedColumns[] = ProductquestionPeer::IDPRODUCT;
        }

        if ($this->aProduct !== null && $this->aProduct->getIdproduct() !== $v) {
            $this->aProduct = null;
        }


        return $this;
    } // setIdproduct()

    /**
     * Set the value of [productquestion_requester_name] column.
     *
     * @param  string $v new value
     * @return Productquestion The current object (for fluent API support)
     */
    public function setProductquestionRequesterName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productquestion_requester_name !== $v) {
            $this->productquestion_requester_name = $v;
            $this->modifiedColumns[] = ProductquestionPeer::PRODUCTQUESTION_REQUESTER_NAME;
        }


        return $this;
    } // setProductquestionRequesterName()

    /**
     * Set the value of [productquestion_requester_email] column.
     *
     * @param  string $v new value
     * @return Productquestion The current object (for fluent API support)
     */
    public function setProductquestionRequesterEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productquestion_requester_email !== $v) {
            $this->productquestion_requester_email = $v;
            $this->modifiedColumns[] = ProductquestionPeer::PRODUCTQUESTION_REQUESTER_EMAIL;
        }


        return $this;
    } // setProductquestionRequesterEmail()

    /**
     * Set the value of [productquestion_requester_message] column.
     *
     * @param  string $v new value
     * @return Productquestion The current object (for fluent API support)
     */
    public function setProductquestionRequesterMessage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productquestion_requester_message !== $v) {
            $this->productquestion_requester_message = $v;
            $this->modifiedColumns[] = ProductquestionPeer::PRODUCTQUESTION_REQUESTER_MESSAGE;
        }


        return $this;
    } // setProductquestionRequesterMessage()

    /**
     * Sets the value of [productquestion_requester_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Productquestion The current object (for fluent API support)
     */
    public function setProductquestionRequesterDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->productquestion_requester_date !== null || $dt !== null) {
            $currentDateAsString = ($this->productquestion_requester_date !== null && $tmpDt = new DateTime($this->productquestion_requester_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->productquestion_requester_date = $newDateAsString;
                $this->modifiedColumns[] = ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE;
            }
        } // if either are not null


        return $this;
    } // setProductquestionRequesterDate()

    /**
     * Set the value of [productquestion_reply] column.
     *
     * @param  string $v new value
     * @return Productquestion The current object (for fluent API support)
     */
    public function setProductquestionReply($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productquestion_reply !== $v) {
            $this->productquestion_reply = $v;
            $this->modifiedColumns[] = ProductquestionPeer::PRODUCTQUESTION_REPLY;
        }


        return $this;
    } // setProductquestionReply()

    /**
     * Sets the value of [productquestion_reply_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Productquestion The current object (for fluent API support)
     */
    public function setProductquestionReplyDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->productquestion_reply_date !== null || $dt !== null) {
            $currentDateAsString = ($this->productquestion_reply_date !== null && $tmpDt = new DateTime($this->productquestion_reply_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->productquestion_reply_date = $newDateAsString;
                $this->modifiedColumns[] = ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE;
            }
        } // if either are not null


        return $this;
    } // setProductquestionReplyDate()

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

            $this->idproductquestion = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idproduct = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->productquestion_requester_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->productquestion_requester_email = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->productquestion_requester_message = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->productquestion_requester_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->productquestion_reply = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->productquestion_reply_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = ProductquestionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Productquestion object", $e);
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

        if ($this->aProduct !== null && $this->idproduct !== $this->aProduct->getIdproduct()) {
            $this->aProduct = null;
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
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProductquestionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProduct = null;
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
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProductquestionQuery::create()
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
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProductquestionPeer::addInstanceToPool($this);
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

            if ($this->aProduct !== null) {
                if ($this->aProduct->isModified() || $this->aProduct->isNew()) {
                    $affectedRows += $this->aProduct->save($con);
                }
                $this->setProduct($this->aProduct);
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

        $this->modifiedColumns[] = ProductquestionPeer::IDPRODUCTQUESTION;
        if (null !== $this->idproductquestion) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductquestionPeer::IDPRODUCTQUESTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductquestionPeer::IDPRODUCTQUESTION)) {
            $modifiedColumns[':p' . $index++]  = '`idproductquestion`';
        }
        if ($this->isColumnModified(ProductquestionPeer::IDPRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`idproduct`';
        }
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`productquestion_requester_name`';
        }
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`productquestion_requester_email`';
        }
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = '`productquestion_requester_message`';
        }
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`productquestion_requester_date`';
        }
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REPLY)) {
            $modifiedColumns[':p' . $index++]  = '`productquestion_reply`';
        }
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`productquestion_reply_date`';
        }

        $sql = sprintf(
            'INSERT INTO `productquestion` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idproductquestion`':
                        $stmt->bindValue($identifier, $this->idproductquestion, PDO::PARAM_INT);
                        break;
                    case '`idproduct`':
                        $stmt->bindValue($identifier, $this->idproduct, PDO::PARAM_INT);
                        break;
                    case '`productquestion_requester_name`':
                        $stmt->bindValue($identifier, $this->productquestion_requester_name, PDO::PARAM_STR);
                        break;
                    case '`productquestion_requester_email`':
                        $stmt->bindValue($identifier, $this->productquestion_requester_email, PDO::PARAM_STR);
                        break;
                    case '`productquestion_requester_message`':
                        $stmt->bindValue($identifier, $this->productquestion_requester_message, PDO::PARAM_STR);
                        break;
                    case '`productquestion_requester_date`':
                        $stmt->bindValue($identifier, $this->productquestion_requester_date, PDO::PARAM_STR);
                        break;
                    case '`productquestion_reply`':
                        $stmt->bindValue($identifier, $this->productquestion_reply, PDO::PARAM_STR);
                        break;
                    case '`productquestion_reply_date`':
                        $stmt->bindValue($identifier, $this->productquestion_reply_date, PDO::PARAM_STR);
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
        $this->setIdproductquestion($pk);

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

            if ($this->aProduct !== null) {
                if (!$this->aProduct->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProduct->getValidationFailures());
                }
            }


            if (($retval = ProductquestionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = ProductquestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdproductquestion();
                break;
            case 1:
                return $this->getIdproduct();
                break;
            case 2:
                return $this->getProductquestionRequesterName();
                break;
            case 3:
                return $this->getProductquestionRequesterEmail();
                break;
            case 4:
                return $this->getProductquestionRequesterMessage();
                break;
            case 5:
                return $this->getProductquestionRequesterDate();
                break;
            case 6:
                return $this->getProductquestionReply();
                break;
            case 7:
                return $this->getProductquestionReplyDate();
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
        if (isset($alreadyDumpedObjects['Productquestion'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Productquestion'][$this->getPrimaryKey()] = true;
        $keys = ProductquestionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdproductquestion(),
            $keys[1] => $this->getIdproduct(),
            $keys[2] => $this->getProductquestionRequesterName(),
            $keys[3] => $this->getProductquestionRequesterEmail(),
            $keys[4] => $this->getProductquestionRequesterMessage(),
            $keys[5] => $this->getProductquestionRequesterDate(),
            $keys[6] => $this->getProductquestionReply(),
            $keys[7] => $this->getProductquestionReplyDate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProduct) {
                $result['Product'] = $this->aProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProductquestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdproductquestion($value);
                break;
            case 1:
                $this->setIdproduct($value);
                break;
            case 2:
                $this->setProductquestionRequesterName($value);
                break;
            case 3:
                $this->setProductquestionRequesterEmail($value);
                break;
            case 4:
                $this->setProductquestionRequesterMessage($value);
                break;
            case 5:
                $this->setProductquestionRequesterDate($value);
                break;
            case 6:
                $this->setProductquestionReply($value);
                break;
            case 7:
                $this->setProductquestionReplyDate($value);
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
        $keys = ProductquestionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdproductquestion($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdproduct($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setProductquestionRequesterName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProductquestionRequesterEmail($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setProductquestionRequesterMessage($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setProductquestionRequesterDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setProductquestionReply($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setProductquestionReplyDate($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProductquestionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProductquestionPeer::IDPRODUCTQUESTION)) $criteria->add(ProductquestionPeer::IDPRODUCTQUESTION, $this->idproductquestion);
        if ($this->isColumnModified(ProductquestionPeer::IDPRODUCT)) $criteria->add(ProductquestionPeer::IDPRODUCT, $this->idproduct);
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_NAME)) $criteria->add(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_NAME, $this->productquestion_requester_name);
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_EMAIL)) $criteria->add(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_EMAIL, $this->productquestion_requester_email);
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_MESSAGE)) $criteria->add(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_MESSAGE, $this->productquestion_requester_message);
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE)) $criteria->add(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE, $this->productquestion_requester_date);
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REPLY)) $criteria->add(ProductquestionPeer::PRODUCTQUESTION_REPLY, $this->productquestion_reply);
        if ($this->isColumnModified(ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE)) $criteria->add(ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE, $this->productquestion_reply_date);

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
        $criteria = new Criteria(ProductquestionPeer::DATABASE_NAME);
        $criteria->add(ProductquestionPeer::IDPRODUCTQUESTION, $this->idproductquestion);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdproductquestion();
    }

    /**
     * Generic method to set the primary key (idproductquestion column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdproductquestion($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdproductquestion();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Productquestion (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdproduct($this->getIdproduct());
        $copyObj->setProductquestionRequesterName($this->getProductquestionRequesterName());
        $copyObj->setProductquestionRequesterEmail($this->getProductquestionRequesterEmail());
        $copyObj->setProductquestionRequesterMessage($this->getProductquestionRequesterMessage());
        $copyObj->setProductquestionRequesterDate($this->getProductquestionRequesterDate());
        $copyObj->setProductquestionReply($this->getProductquestionReply());
        $copyObj->setProductquestionReplyDate($this->getProductquestionReplyDate());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdproductquestion(NULL); // this is a auto-increment column, so set to default value
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
     * @return Productquestion Clone of current object.
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
     * @return ProductquestionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProductquestionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Product object.
     *
     * @param                  Product $v
     * @return Productquestion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProduct(Product $v = null)
    {
        if ($v === null) {
            $this->setIdproduct(NULL);
        } else {
            $this->setIdproduct($v->getIdproduct());
        }

        $this->aProduct = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Product object, it will not be re-added.
        if ($v !== null) {
            $v->addProductquestion($this);
        }


        return $this;
    }


    /**
     * Get the associated Product object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Product The associated Product object.
     * @throws PropelException
     */
    public function getProduct(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProduct === null && ($this->idproduct !== null) && $doQuery) {
            $this->aProduct = ProductQuery::create()->findPk($this->idproduct, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProduct->addProductquestions($this);
             */
        }

        return $this->aProduct;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idproductquestion = null;
        $this->idproduct = null;
        $this->productquestion_requester_name = null;
        $this->productquestion_requester_email = null;
        $this->productquestion_requester_message = null;
        $this->productquestion_requester_date = null;
        $this->productquestion_reply = null;
        $this->productquestion_reply_date = null;
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
            if ($this->aProduct instanceof Persistent) {
              $this->aProduct->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aProduct = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductquestionPeer::DEFAULT_STRING_FORMAT);
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