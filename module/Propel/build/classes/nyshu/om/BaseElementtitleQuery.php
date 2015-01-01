<?php


/**
 * Base class that represents a query for the 'elementtitle' table.
 *
 *
 *
 * @method ElementtitleQuery orderByIdelementtitle($order = Criteria::ASC) Order by the idelementtitle column
 * @method ElementtitleQuery orderByElementtitleTitle($order = Criteria::ASC) Order by the elementtitle_title column
 * @method ElementtitleQuery orderByElementtitleType($order = Criteria::ASC) Order by the elementtitle_type column
 *
 * @method ElementtitleQuery groupByIdelementtitle() Group by the idelementtitle column
 * @method ElementtitleQuery groupByElementtitleTitle() Group by the elementtitle_title column
 * @method ElementtitleQuery groupByElementtitleType() Group by the elementtitle_type column
 *
 * @method ElementtitleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ElementtitleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ElementtitleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Elementtitle findOne(PropelPDO $con = null) Return the first Elementtitle matching the query
 * @method Elementtitle findOneOrCreate(PropelPDO $con = null) Return the first Elementtitle matching the query, or a new Elementtitle object populated from the query conditions when no match is found
 *
 * @method Elementtitle findOneByElementtitleTitle(string $elementtitle_title) Return the first Elementtitle filtered by the elementtitle_title column
 * @method Elementtitle findOneByElementtitleType(string $elementtitle_type) Return the first Elementtitle filtered by the elementtitle_type column
 *
 * @method array findByIdelementtitle(int $idelementtitle) Return Elementtitle objects filtered by the idelementtitle column
 * @method array findByElementtitleTitle(string $elementtitle_title) Return Elementtitle objects filtered by the elementtitle_title column
 * @method array findByElementtitleType(string $elementtitle_type) Return Elementtitle objects filtered by the elementtitle_type column
 *
 * @package    propel.generator.nyshu.om
 */
abstract class BaseElementtitleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseElementtitleQuery object.
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
            $modelName = 'Elementtitle';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ElementtitleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ElementtitleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ElementtitleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ElementtitleQuery) {
            return $criteria;
        }
        $query = new ElementtitleQuery(null, null, $modelAlias);

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
     * @return   Elementtitle|Elementtitle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ElementtitlePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ElementtitlePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Elementtitle A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdelementtitle($key, $con = null)
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
     * @return                 Elementtitle A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idelementtitle`, `elementtitle_title`, `elementtitle_type` FROM `elementtitle` WHERE `idelementtitle` = :p0';
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
            $obj = new Elementtitle();
            $obj->hydrate($row);
            ElementtitlePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Elementtitle|Elementtitle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Elementtitle[]|mixed the list of results, formatted by the current formatter
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
     * @return ElementtitleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ElementtitlePeer::IDELEMENTTITLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ElementtitleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ElementtitlePeer::IDELEMENTTITLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idelementtitle column
     *
     * Example usage:
     * <code>
     * $query->filterByIdelementtitle(1234); // WHERE idelementtitle = 1234
     * $query->filterByIdelementtitle(array(12, 34)); // WHERE idelementtitle IN (12, 34)
     * $query->filterByIdelementtitle(array('min' => 12)); // WHERE idelementtitle >= 12
     * $query->filterByIdelementtitle(array('max' => 12)); // WHERE idelementtitle <= 12
     * </code>
     *
     * @param     mixed $idelementtitle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementtitleQuery The current query, for fluid interface
     */
    public function filterByIdelementtitle($idelementtitle = null, $comparison = null)
    {
        if (is_array($idelementtitle)) {
            $useMinMax = false;
            if (isset($idelementtitle['min'])) {
                $this->addUsingAlias(ElementtitlePeer::IDELEMENTTITLE, $idelementtitle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idelementtitle['max'])) {
                $this->addUsingAlias(ElementtitlePeer::IDELEMENTTITLE, $idelementtitle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementtitlePeer::IDELEMENTTITLE, $idelementtitle, $comparison);
    }

    /**
     * Filter the query on the elementtitle_title column
     *
     * Example usage:
     * <code>
     * $query->filterByElementtitleTitle('fooValue');   // WHERE elementtitle_title = 'fooValue'
     * $query->filterByElementtitleTitle('%fooValue%'); // WHERE elementtitle_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementtitleTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementtitleQuery The current query, for fluid interface
     */
    public function filterByElementtitleTitle($elementtitleTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementtitleTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementtitleTitle)) {
                $elementtitleTitle = str_replace('*', '%', $elementtitleTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementtitlePeer::ELEMENTTITLE_TITLE, $elementtitleTitle, $comparison);
    }

    /**
     * Filter the query on the elementtitle_type column
     *
     * Example usage:
     * <code>
     * $query->filterByElementtitleType('fooValue');   // WHERE elementtitle_type = 'fooValue'
     * $query->filterByElementtitleType('%fooValue%'); // WHERE elementtitle_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementtitleType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementtitleQuery The current query, for fluid interface
     */
    public function filterByElementtitleType($elementtitleType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementtitleType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementtitleType)) {
                $elementtitleType = str_replace('*', '%', $elementtitleType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementtitlePeer::ELEMENTTITLE_TYPE, $elementtitleType, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Elementtitle $elementtitle Object to remove from the list of results
     *
     * @return ElementtitleQuery The current query, for fluid interface
     */
    public function prune($elementtitle = null)
    {
        if ($elementtitle) {
            $this->addUsingAlias(ElementtitlePeer::IDELEMENTTITLE, $elementtitle->getIdelementtitle(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
