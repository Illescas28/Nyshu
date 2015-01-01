<?php


/**
 * Base class that represents a query for the 'elementtext' table.
 *
 *
 *
 * @method ElementtextQuery orderByIdelementtext($order = Criteria::ASC) Order by the idelementtext column
 * @method ElementtextQuery orderByElementtextDescription($order = Criteria::ASC) Order by the elementtext_description column
 * @method ElementtextQuery orderByElementtextIcon($order = Criteria::ASC) Order by the elementtext_icon column
 * @method ElementtextQuery orderByElementtextType($order = Criteria::ASC) Order by the elementtext_type column
 *
 * @method ElementtextQuery groupByIdelementtext() Group by the idelementtext column
 * @method ElementtextQuery groupByElementtextDescription() Group by the elementtext_description column
 * @method ElementtextQuery groupByElementtextIcon() Group by the elementtext_icon column
 * @method ElementtextQuery groupByElementtextType() Group by the elementtext_type column
 *
 * @method ElementtextQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ElementtextQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ElementtextQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Elementtext findOne(PropelPDO $con = null) Return the first Elementtext matching the query
 * @method Elementtext findOneOrCreate(PropelPDO $con = null) Return the first Elementtext matching the query, or a new Elementtext object populated from the query conditions when no match is found
 *
 * @method Elementtext findOneByElementtextDescription(string $elementtext_description) Return the first Elementtext filtered by the elementtext_description column
 * @method Elementtext findOneByElementtextIcon(string $elementtext_icon) Return the first Elementtext filtered by the elementtext_icon column
 * @method Elementtext findOneByElementtextType(string $elementtext_type) Return the first Elementtext filtered by the elementtext_type column
 *
 * @method array findByIdelementtext(int $idelementtext) Return Elementtext objects filtered by the idelementtext column
 * @method array findByElementtextDescription(string $elementtext_description) Return Elementtext objects filtered by the elementtext_description column
 * @method array findByElementtextIcon(string $elementtext_icon) Return Elementtext objects filtered by the elementtext_icon column
 * @method array findByElementtextType(string $elementtext_type) Return Elementtext objects filtered by the elementtext_type column
 *
 * @package    propel.generator.nyshu.om
 */
abstract class BaseElementtextQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseElementtextQuery object.
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
            $modelName = 'Elementtext';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ElementtextQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ElementtextQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ElementtextQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ElementtextQuery) {
            return $criteria;
        }
        $query = new ElementtextQuery(null, null, $modelAlias);

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
     * @return   Elementtext|Elementtext[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ElementtextPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ElementtextPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Elementtext A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdelementtext($key, $con = null)
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
     * @return                 Elementtext A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idelementtext`, `elementtext_description`, `elementtext_icon`, `elementtext_type` FROM `elementtext` WHERE `idelementtext` = :p0';
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
            $obj = new Elementtext();
            $obj->hydrate($row);
            ElementtextPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Elementtext|Elementtext[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Elementtext[]|mixed the list of results, formatted by the current formatter
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
     * @return ElementtextQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ElementtextPeer::IDELEMENTTEXT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ElementtextQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ElementtextPeer::IDELEMENTTEXT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idelementtext column
     *
     * Example usage:
     * <code>
     * $query->filterByIdelementtext(1234); // WHERE idelementtext = 1234
     * $query->filterByIdelementtext(array(12, 34)); // WHERE idelementtext IN (12, 34)
     * $query->filterByIdelementtext(array('min' => 12)); // WHERE idelementtext >= 12
     * $query->filterByIdelementtext(array('max' => 12)); // WHERE idelementtext <= 12
     * </code>
     *
     * @param     mixed $idelementtext The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementtextQuery The current query, for fluid interface
     */
    public function filterByIdelementtext($idelementtext = null, $comparison = null)
    {
        if (is_array($idelementtext)) {
            $useMinMax = false;
            if (isset($idelementtext['min'])) {
                $this->addUsingAlias(ElementtextPeer::IDELEMENTTEXT, $idelementtext['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idelementtext['max'])) {
                $this->addUsingAlias(ElementtextPeer::IDELEMENTTEXT, $idelementtext['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementtextPeer::IDELEMENTTEXT, $idelementtext, $comparison);
    }

    /**
     * Filter the query on the elementtext_description column
     *
     * Example usage:
     * <code>
     * $query->filterByElementtextDescription('fooValue');   // WHERE elementtext_description = 'fooValue'
     * $query->filterByElementtextDescription('%fooValue%'); // WHERE elementtext_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementtextDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementtextQuery The current query, for fluid interface
     */
    public function filterByElementtextDescription($elementtextDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementtextDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementtextDescription)) {
                $elementtextDescription = str_replace('*', '%', $elementtextDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementtextPeer::ELEMENTTEXT_DESCRIPTION, $elementtextDescription, $comparison);
    }

    /**
     * Filter the query on the elementtext_icon column
     *
     * Example usage:
     * <code>
     * $query->filterByElementtextIcon('fooValue');   // WHERE elementtext_icon = 'fooValue'
     * $query->filterByElementtextIcon('%fooValue%'); // WHERE elementtext_icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementtextIcon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementtextQuery The current query, for fluid interface
     */
    public function filterByElementtextIcon($elementtextIcon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementtextIcon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementtextIcon)) {
                $elementtextIcon = str_replace('*', '%', $elementtextIcon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementtextPeer::ELEMENTTEXT_ICON, $elementtextIcon, $comparison);
    }

    /**
     * Filter the query on the elementtext_type column
     *
     * Example usage:
     * <code>
     * $query->filterByElementtextType('fooValue');   // WHERE elementtext_type = 'fooValue'
     * $query->filterByElementtextType('%fooValue%'); // WHERE elementtext_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementtextType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementtextQuery The current query, for fluid interface
     */
    public function filterByElementtextType($elementtextType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementtextType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementtextType)) {
                $elementtextType = str_replace('*', '%', $elementtextType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementtextPeer::ELEMENTTEXT_TYPE, $elementtextType, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Elementtext $elementtext Object to remove from the list of results
     *
     * @return ElementtextQuery The current query, for fluid interface
     */
    public function prune($elementtext = null)
    {
        if ($elementtext) {
            $this->addUsingAlias(ElementtextPeer::IDELEMENTTEXT, $elementtext->getIdelementtext(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
