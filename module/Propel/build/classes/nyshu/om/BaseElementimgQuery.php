<?php


/**
 * Base class that represents a query for the 'elementimg' table.
 *
 *
 *
 * @method ElementimgQuery orderByIdelementimg($order = Criteria::ASC) Order by the idelementimg column
 * @method ElementimgQuery orderByElementimgImg($order = Criteria::ASC) Order by the elementimg_img column
 * @method ElementimgQuery orderByElementimgType($order = Criteria::ASC) Order by the elementimg_type column
 *
 * @method ElementimgQuery groupByIdelementimg() Group by the idelementimg column
 * @method ElementimgQuery groupByElementimgImg() Group by the elementimg_img column
 * @method ElementimgQuery groupByElementimgType() Group by the elementimg_type column
 *
 * @method ElementimgQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ElementimgQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ElementimgQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Elementimg findOne(PropelPDO $con = null) Return the first Elementimg matching the query
 * @method Elementimg findOneOrCreate(PropelPDO $con = null) Return the first Elementimg matching the query, or a new Elementimg object populated from the query conditions when no match is found
 *
 * @method Elementimg findOneByElementimgImg(string $elementimg_img) Return the first Elementimg filtered by the elementimg_img column
 * @method Elementimg findOneByElementimgType(string $elementimg_type) Return the first Elementimg filtered by the elementimg_type column
 *
 * @method array findByIdelementimg(int $idelementimg) Return Elementimg objects filtered by the idelementimg column
 * @method array findByElementimgImg(string $elementimg_img) Return Elementimg objects filtered by the elementimg_img column
 * @method array findByElementimgType(string $elementimg_type) Return Elementimg objects filtered by the elementimg_type column
 *
 * @package    propel.generator.nyshu.om
 */
abstract class BaseElementimgQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseElementimgQuery object.
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
            $modelName = 'Elementimg';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ElementimgQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ElementimgQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ElementimgQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ElementimgQuery) {
            return $criteria;
        }
        $query = new ElementimgQuery(null, null, $modelAlias);

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
     * @return   Elementimg|Elementimg[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ElementimgPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ElementimgPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Elementimg A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdelementimg($key, $con = null)
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
     * @return                 Elementimg A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idelementimg`, `elementimg_img`, `elementimg_type` FROM `elementimg` WHERE `idelementimg` = :p0';
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
            $obj = new Elementimg();
            $obj->hydrate($row);
            ElementimgPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Elementimg|Elementimg[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Elementimg[]|mixed the list of results, formatted by the current formatter
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
     * @return ElementimgQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ElementimgPeer::IDELEMENTIMG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ElementimgQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ElementimgPeer::IDELEMENTIMG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idelementimg column
     *
     * Example usage:
     * <code>
     * $query->filterByIdelementimg(1234); // WHERE idelementimg = 1234
     * $query->filterByIdelementimg(array(12, 34)); // WHERE idelementimg IN (12, 34)
     * $query->filterByIdelementimg(array('min' => 12)); // WHERE idelementimg >= 12
     * $query->filterByIdelementimg(array('max' => 12)); // WHERE idelementimg <= 12
     * </code>
     *
     * @param     mixed $idelementimg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementimgQuery The current query, for fluid interface
     */
    public function filterByIdelementimg($idelementimg = null, $comparison = null)
    {
        if (is_array($idelementimg)) {
            $useMinMax = false;
            if (isset($idelementimg['min'])) {
                $this->addUsingAlias(ElementimgPeer::IDELEMENTIMG, $idelementimg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idelementimg['max'])) {
                $this->addUsingAlias(ElementimgPeer::IDELEMENTIMG, $idelementimg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElementimgPeer::IDELEMENTIMG, $idelementimg, $comparison);
    }

    /**
     * Filter the query on the elementimg_img column
     *
     * Example usage:
     * <code>
     * $query->filterByElementimgImg('fooValue');   // WHERE elementimg_img = 'fooValue'
     * $query->filterByElementimgImg('%fooValue%'); // WHERE elementimg_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementimgImg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementimgQuery The current query, for fluid interface
     */
    public function filterByElementimgImg($elementimgImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementimgImg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementimgImg)) {
                $elementimgImg = str_replace('*', '%', $elementimgImg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementimgPeer::ELEMENTIMG_IMG, $elementimgImg, $comparison);
    }

    /**
     * Filter the query on the elementimg_type column
     *
     * Example usage:
     * <code>
     * $query->filterByElementimgType('fooValue');   // WHERE elementimg_type = 'fooValue'
     * $query->filterByElementimgType('%fooValue%'); // WHERE elementimg_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $elementimgType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ElementimgQuery The current query, for fluid interface
     */
    public function filterByElementimgType($elementimgType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($elementimgType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $elementimgType)) {
                $elementimgType = str_replace('*', '%', $elementimgType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ElementimgPeer::ELEMENTIMG_TYPE, $elementimgType, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Elementimg $elementimg Object to remove from the list of results
     *
     * @return ElementimgQuery The current query, for fluid interface
     */
    public function prune($elementimg = null)
    {
        if ($elementimg) {
            $this->addUsingAlias(ElementimgPeer::IDELEMENTIMG, $elementimg->getIdelementimg(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
