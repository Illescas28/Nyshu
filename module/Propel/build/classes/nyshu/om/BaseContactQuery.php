<?php


/**
 * Base class that represents a query for the 'contact' table.
 *
 *
 *
 * @method ContactQuery orderByIdcontact($order = Criteria::ASC) Order by the idcontact column
 * @method ContactQuery orderByContactName($order = Criteria::ASC) Order by the contact_name column
 * @method ContactQuery orderByContactEmail($order = Criteria::ASC) Order by the contact_email column
 * @method ContactQuery orderByContactPhone($order = Criteria::ASC) Order by the contact_phone column
 * @method ContactQuery orderByContactMessage($order = Criteria::ASC) Order by the contact_message column
 *
 * @method ContactQuery groupByIdcontact() Group by the idcontact column
 * @method ContactQuery groupByContactName() Group by the contact_name column
 * @method ContactQuery groupByContactEmail() Group by the contact_email column
 * @method ContactQuery groupByContactPhone() Group by the contact_phone column
 * @method ContactQuery groupByContactMessage() Group by the contact_message column
 *
 * @method ContactQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContactQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContactQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Contact findOne(PropelPDO $con = null) Return the first Contact matching the query
 * @method Contact findOneOrCreate(PropelPDO $con = null) Return the first Contact matching the query, or a new Contact object populated from the query conditions when no match is found
 *
 * @method Contact findOneByContactName(string $contact_name) Return the first Contact filtered by the contact_name column
 * @method Contact findOneByContactEmail(string $contact_email) Return the first Contact filtered by the contact_email column
 * @method Contact findOneByContactPhone(string $contact_phone) Return the first Contact filtered by the contact_phone column
 * @method Contact findOneByContactMessage(string $contact_message) Return the first Contact filtered by the contact_message column
 *
 * @method array findByIdcontact(int $idcontact) Return Contact objects filtered by the idcontact column
 * @method array findByContactName(string $contact_name) Return Contact objects filtered by the contact_name column
 * @method array findByContactEmail(string $contact_email) Return Contact objects filtered by the contact_email column
 * @method array findByContactPhone(string $contact_phone) Return Contact objects filtered by the contact_phone column
 * @method array findByContactMessage(string $contact_message) Return Contact objects filtered by the contact_message column
 *
 * @package    propel.generator.nyshu.om
 */
abstract class BaseContactQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContactQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'nyshu';
        }
        if (null === $modelName) {
            $modelName = 'Contact';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContactQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContactQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContactQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContactQuery) {
            return $criteria;
        }
        $query = new ContactQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Contact|Contact[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContactPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Contact A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcontact($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Contact A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idcontact`, `contact_name`, `contact_email`, `contact_phone`, `contact_message` FROM `contact` WHERE `idcontact` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Contact();
            $obj->hydrate($row);
            ContactPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Contact|Contact[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Contact[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContactPeer::IDCONTACT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContactPeer::IDCONTACT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idcontact column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcontact(1234); // WHERE idcontact = 1234
     * $query->filterByIdcontact(array(12, 34)); // WHERE idcontact IN (12, 34)
     * $query->filterByIdcontact(array('min' => 12)); // WHERE idcontact >= 12
     * $query->filterByIdcontact(array('max' => 12)); // WHERE idcontact <= 12
     * </code>
     *
     * @param     mixed $idcontact The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByIdcontact($idcontact = null, $comparison = null)
    {
        if (is_array($idcontact)) {
            $useMinMax = false;
            if (isset($idcontact['min'])) {
                $this->addUsingAlias(ContactPeer::IDCONTACT, $idcontact['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcontact['max'])) {
                $this->addUsingAlias(ContactPeer::IDCONTACT, $idcontact['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::IDCONTACT, $idcontact, $comparison);
    }

    /**
     * Filter the query on the contact_name column
     *
     * Example usage:
     * <code>
     * $query->filterByContactName('fooValue');   // WHERE contact_name = 'fooValue'
     * $query->filterByContactName('%fooValue%'); // WHERE contact_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByContactName($contactName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactName)) {
                $contactName = str_replace('*', '%', $contactName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::CONTACT_NAME, $contactName, $comparison);
    }

    /**
     * Filter the query on the contact_email column
     *
     * Example usage:
     * <code>
     * $query->filterByContactEmail('fooValue');   // WHERE contact_email = 'fooValue'
     * $query->filterByContactEmail('%fooValue%'); // WHERE contact_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByContactEmail($contactEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactEmail)) {
                $contactEmail = str_replace('*', '%', $contactEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::CONTACT_EMAIL, $contactEmail, $comparison);
    }

    /**
     * Filter the query on the contact_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByContactPhone('fooValue');   // WHERE contact_phone = 'fooValue'
     * $query->filterByContactPhone('%fooValue%'); // WHERE contact_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByContactPhone($contactPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactPhone)) {
                $contactPhone = str_replace('*', '%', $contactPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::CONTACT_PHONE, $contactPhone, $comparison);
    }

    /**
     * Filter the query on the contact_message column
     *
     * Example usage:
     * <code>
     * $query->filterByContactMessage('fooValue');   // WHERE contact_message = 'fooValue'
     * $query->filterByContactMessage('%fooValue%'); // WHERE contact_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByContactMessage($contactMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactMessage)) {
                $contactMessage = str_replace('*', '%', $contactMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::CONTACT_MESSAGE, $contactMessage, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Contact $contact Object to remove from the list of results
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function prune($contact = null)
    {
        if ($contact) {
            $this->addUsingAlias(ContactPeer::IDCONTACT, $contact->getIdcontact(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
