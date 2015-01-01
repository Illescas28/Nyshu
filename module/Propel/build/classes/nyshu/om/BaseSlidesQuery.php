<?php


/**
 * Base class that represents a query for the 'slides' table.
 *
 *
 *
 * @method SlidesQuery orderByIdslides($order = Criteria::ASC) Order by the idslides column
 * @method SlidesQuery orderBySlidesTitle($order = Criteria::ASC) Order by the slides_title column
 * @method SlidesQuery orderBySlidesDescription($order = Criteria::ASC) Order by the slides_description column
 * @method SlidesQuery orderBySlidesImg($order = Criteria::ASC) Order by the slides_img column
 *
 * @method SlidesQuery groupByIdslides() Group by the idslides column
 * @method SlidesQuery groupBySlidesTitle() Group by the slides_title column
 * @method SlidesQuery groupBySlidesDescription() Group by the slides_description column
 * @method SlidesQuery groupBySlidesImg() Group by the slides_img column
 *
 * @method SlidesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SlidesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SlidesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Slides findOne(PropelPDO $con = null) Return the first Slides matching the query
 * @method Slides findOneOrCreate(PropelPDO $con = null) Return the first Slides matching the query, or a new Slides object populated from the query conditions when no match is found
 *
 * @method Slides findOneBySlidesTitle(string $slides_title) Return the first Slides filtered by the slides_title column
 * @method Slides findOneBySlidesDescription(string $slides_description) Return the first Slides filtered by the slides_description column
 * @method Slides findOneBySlidesImg(string $slides_img) Return the first Slides filtered by the slides_img column
 *
 * @method array findByIdslides(int $idslides) Return Slides objects filtered by the idslides column
 * @method array findBySlidesTitle(string $slides_title) Return Slides objects filtered by the slides_title column
 * @method array findBySlidesDescription(string $slides_description) Return Slides objects filtered by the slides_description column
 * @method array findBySlidesImg(string $slides_img) Return Slides objects filtered by the slides_img column
 *
 * @package    propel.generator.nyshu.om
 */
abstract class BaseSlidesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSlidesQuery object.
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
            $modelName = 'Slides';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SlidesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SlidesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SlidesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SlidesQuery) {
            return $criteria;
        }
        $query = new SlidesQuery(null, null, $modelAlias);

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
     * @return   Slides|Slides[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SlidesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SlidesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Slides A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdslides($key, $con = null)
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
     * @return                 Slides A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idslides`, `slides_title`, `slides_description`, `slides_img` FROM `slides` WHERE `idslides` = :p0';
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
            $obj = new Slides();
            $obj->hydrate($row);
            SlidesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Slides|Slides[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Slides[]|mixed the list of results, formatted by the current formatter
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
     * @return SlidesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SlidesPeer::IDSLIDES, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SlidesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SlidesPeer::IDSLIDES, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idslides column
     *
     * Example usage:
     * <code>
     * $query->filterByIdslides(1234); // WHERE idslides = 1234
     * $query->filterByIdslides(array(12, 34)); // WHERE idslides IN (12, 34)
     * $query->filterByIdslides(array('min' => 12)); // WHERE idslides >= 12
     * $query->filterByIdslides(array('max' => 12)); // WHERE idslides <= 12
     * </code>
     *
     * @param     mixed $idslides The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SlidesQuery The current query, for fluid interface
     */
    public function filterByIdslides($idslides = null, $comparison = null)
    {
        if (is_array($idslides)) {
            $useMinMax = false;
            if (isset($idslides['min'])) {
                $this->addUsingAlias(SlidesPeer::IDSLIDES, $idslides['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idslides['max'])) {
                $this->addUsingAlias(SlidesPeer::IDSLIDES, $idslides['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SlidesPeer::IDSLIDES, $idslides, $comparison);
    }

    /**
     * Filter the query on the slides_title column
     *
     * Example usage:
     * <code>
     * $query->filterBySlidesTitle('fooValue');   // WHERE slides_title = 'fooValue'
     * $query->filterBySlidesTitle('%fooValue%'); // WHERE slides_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slidesTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SlidesQuery The current query, for fluid interface
     */
    public function filterBySlidesTitle($slidesTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slidesTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slidesTitle)) {
                $slidesTitle = str_replace('*', '%', $slidesTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SlidesPeer::SLIDES_TITLE, $slidesTitle, $comparison);
    }

    /**
     * Filter the query on the slides_description column
     *
     * Example usage:
     * <code>
     * $query->filterBySlidesDescription('fooValue');   // WHERE slides_description = 'fooValue'
     * $query->filterBySlidesDescription('%fooValue%'); // WHERE slides_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slidesDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SlidesQuery The current query, for fluid interface
     */
    public function filterBySlidesDescription($slidesDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slidesDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slidesDescription)) {
                $slidesDescription = str_replace('*', '%', $slidesDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SlidesPeer::SLIDES_DESCRIPTION, $slidesDescription, $comparison);
    }

    /**
     * Filter the query on the slides_img column
     *
     * Example usage:
     * <code>
     * $query->filterBySlidesImg('fooValue');   // WHERE slides_img = 'fooValue'
     * $query->filterBySlidesImg('%fooValue%'); // WHERE slides_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slidesImg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SlidesQuery The current query, for fluid interface
     */
    public function filterBySlidesImg($slidesImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slidesImg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slidesImg)) {
                $slidesImg = str_replace('*', '%', $slidesImg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SlidesPeer::SLIDES_IMG, $slidesImg, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Slides $slides Object to remove from the list of results
     *
     * @return SlidesQuery The current query, for fluid interface
     */
    public function prune($slides = null)
    {
        if ($slides) {
            $this->addUsingAlias(SlidesPeer::IDSLIDES, $slides->getIdslides(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
