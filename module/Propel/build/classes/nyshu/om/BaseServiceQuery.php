<?php


/**
 * Base class that represents a query for the 'service' table.
 *
 *
 *
 * @method ServiceQuery orderByIdservice($order = Criteria::ASC) Order by the idservice column
 * @method ServiceQuery orderByServiceName($order = Criteria::ASC) Order by the service_name column
 * @method ServiceQuery orderByServiceDescription($order = Criteria::ASC) Order by the service_description column
 * @method ServiceQuery orderByServiceImg($order = Criteria::ASC) Order by the service_img column
 * @method ServiceQuery orderByServiceBackgroundImg($order = Criteria::ASC) Order by the service_background_img column
 *
 * @method ServiceQuery groupByIdservice() Group by the idservice column
 * @method ServiceQuery groupByServiceName() Group by the service_name column
 * @method ServiceQuery groupByServiceDescription() Group by the service_description column
 * @method ServiceQuery groupByServiceImg() Group by the service_img column
 * @method ServiceQuery groupByServiceBackgroundImg() Group by the service_background_img column
 *
 * @method ServiceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ServiceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ServiceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Service findOne(PropelPDO $con = null) Return the first Service matching the query
 * @method Service findOneOrCreate(PropelPDO $con = null) Return the first Service matching the query, or a new Service object populated from the query conditions when no match is found
 *
 * @method Service findOneByServiceName(string $service_name) Return the first Service filtered by the service_name column
 * @method Service findOneByServiceDescription(string $service_description) Return the first Service filtered by the service_description column
 * @method Service findOneByServiceImg(string $service_img) Return the first Service filtered by the service_img column
 * @method Service findOneByServiceBackgroundImg(string $service_background_img) Return the first Service filtered by the service_background_img column
 *
 * @method array findByIdservice(int $idservice) Return Service objects filtered by the idservice column
 * @method array findByServiceName(string $service_name) Return Service objects filtered by the service_name column
 * @method array findByServiceDescription(string $service_description) Return Service objects filtered by the service_description column
 * @method array findByServiceImg(string $service_img) Return Service objects filtered by the service_img column
 * @method array findByServiceBackgroundImg(string $service_background_img) Return Service objects filtered by the service_background_img column
 *
 * @package    propel.generator.nyshu.om
 */
abstract class BaseServiceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseServiceQuery object.
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
            $modelName = 'Service';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ServiceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ServiceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ServiceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ServiceQuery) {
            return $criteria;
        }
        $query = new ServiceQuery(null, null, $modelAlias);

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
     * @return   Service|Service[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ServicePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ServicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Service A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdservice($key, $con = null)
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
     * @return                 Service A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idservice`, `service_name`, `service_description`, `service_img`, `service_background_img` FROM `service` WHERE `idservice` = :p0';
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
            $obj = new Service();
            $obj->hydrate($row);
            ServicePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Service|Service[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Service[]|mixed the list of results, formatted by the current formatter
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ServicePeer::IDSERVICE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ServicePeer::IDSERVICE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idservice column
     *
     * Example usage:
     * <code>
     * $query->filterByIdservice(1234); // WHERE idservice = 1234
     * $query->filterByIdservice(array(12, 34)); // WHERE idservice IN (12, 34)
     * $query->filterByIdservice(array('min' => 12)); // WHERE idservice >= 12
     * $query->filterByIdservice(array('max' => 12)); // WHERE idservice <= 12
     * </code>
     *
     * @param     mixed $idservice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByIdservice($idservice = null, $comparison = null)
    {
        if (is_array($idservice)) {
            $useMinMax = false;
            if (isset($idservice['min'])) {
                $this->addUsingAlias(ServicePeer::IDSERVICE, $idservice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idservice['max'])) {
                $this->addUsingAlias(ServicePeer::IDSERVICE, $idservice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ServicePeer::IDSERVICE, $idservice, $comparison);
    }

    /**
     * Filter the query on the service_name column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceName('fooValue');   // WHERE service_name = 'fooValue'
     * $query->filterByServiceName('%fooValue%'); // WHERE service_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serviceName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByServiceName($serviceName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serviceName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serviceName)) {
                $serviceName = str_replace('*', '%', $serviceName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::SERVICE_NAME, $serviceName, $comparison);
    }

    /**
     * Filter the query on the service_description column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceDescription('fooValue');   // WHERE service_description = 'fooValue'
     * $query->filterByServiceDescription('%fooValue%'); // WHERE service_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serviceDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByServiceDescription($serviceDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serviceDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serviceDescription)) {
                $serviceDescription = str_replace('*', '%', $serviceDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::SERVICE_DESCRIPTION, $serviceDescription, $comparison);
    }

    /**
     * Filter the query on the service_img column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceImg('fooValue');   // WHERE service_img = 'fooValue'
     * $query->filterByServiceImg('%fooValue%'); // WHERE service_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serviceImg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByServiceImg($serviceImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serviceImg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serviceImg)) {
                $serviceImg = str_replace('*', '%', $serviceImg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::SERVICE_IMG, $serviceImg, $comparison);
    }

    /**
     * Filter the query on the service_background_img column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceBackgroundImg('fooValue');   // WHERE service_background_img = 'fooValue'
     * $query->filterByServiceBackgroundImg('%fooValue%'); // WHERE service_background_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serviceBackgroundImg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByServiceBackgroundImg($serviceBackgroundImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serviceBackgroundImg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serviceBackgroundImg)) {
                $serviceBackgroundImg = str_replace('*', '%', $serviceBackgroundImg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::SERVICE_BACKGROUND_IMG, $serviceBackgroundImg, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Service $service Object to remove from the list of results
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function prune($service = null)
    {
        if ($service) {
            $this->addUsingAlias(ServicePeer::IDSERVICE, $service->getIdservice(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
