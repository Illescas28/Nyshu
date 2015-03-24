<?php


/**
 * Base class that represents a query for the 'productphoto' table.
 *
 *
 *
 * @method ProductphotoQuery orderByIdproductphoto($order = Criteria::ASC) Order by the idproductphoto column
 * @method ProductphotoQuery orderByIdproduct($order = Criteria::ASC) Order by the idproduct column
 * @method ProductphotoQuery orderByProductphotoName($order = Criteria::ASC) Order by the productphoto_name column
 * @method ProductphotoQuery orderByProductphotoUrl($order = Criteria::ASC) Order by the productphoto_url column
 *
 * @method ProductphotoQuery groupByIdproductphoto() Group by the idproductphoto column
 * @method ProductphotoQuery groupByIdproduct() Group by the idproduct column
 * @method ProductphotoQuery groupByProductphotoName() Group by the productphoto_name column
 * @method ProductphotoQuery groupByProductphotoUrl() Group by the productphoto_url column
 *
 * @method ProductphotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductphotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductphotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductphotoQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProductphotoQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProductphotoQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method Productphoto findOne(PropelPDO $con = null) Return the first Productphoto matching the query
 * @method Productphoto findOneOrCreate(PropelPDO $con = null) Return the first Productphoto matching the query, or a new Productphoto object populated from the query conditions when no match is found
 *
 * @method Productphoto findOneByIdproduct(int $idproduct) Return the first Productphoto filtered by the idproduct column
 * @method Productphoto findOneByProductphotoName(string $productphoto_name) Return the first Productphoto filtered by the productphoto_name column
 * @method Productphoto findOneByProductphotoUrl(string $productphoto_url) Return the first Productphoto filtered by the productphoto_url column
 *
 * @method array findByIdproductphoto(int $idproductphoto) Return Productphoto objects filtered by the idproductphoto column
 * @method array findByIdproduct(int $idproduct) Return Productphoto objects filtered by the idproduct column
 * @method array findByProductphotoName(string $productphoto_name) Return Productphoto objects filtered by the productphoto_name column
 * @method array findByProductphotoUrl(string $productphoto_url) Return Productphoto objects filtered by the productphoto_url column
 *
 * @package    propel.generator.muebleria.om
 */
abstract class BaseProductphotoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductphotoQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'muebleria';
        }
        if (null === $modelName) {
            $modelName = 'Productphoto';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductphotoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductphotoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductphotoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductphotoQuery) {
            return $criteria;
        }
        $query = new ProductphotoQuery(null, null, $modelAlias);

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
     * @return   Productphoto|Productphoto[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductphotoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductphotoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productphoto A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductphoto($key, $con = null)
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
     * @return                 Productphoto A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductphoto`, `idproduct`, `productphoto_name`, `productphoto_url` FROM `productphoto` WHERE `idproductphoto` = :p0';
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
            $obj = new Productphoto();
            $obj->hydrate($row);
            ProductphotoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productphoto|Productphoto[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productphoto[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductphotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductphotoPeer::IDPRODUCTPHOTO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductphotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductphotoPeer::IDPRODUCTPHOTO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductphoto column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductphoto(1234); // WHERE idproductphoto = 1234
     * $query->filterByIdproductphoto(array(12, 34)); // WHERE idproductphoto IN (12, 34)
     * $query->filterByIdproductphoto(array('min' => 12)); // WHERE idproductphoto >= 12
     * $query->filterByIdproductphoto(array('max' => 12)); // WHERE idproductphoto <= 12
     * </code>
     *
     * @param     mixed $idproductphoto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductphotoQuery The current query, for fluid interface
     */
    public function filterByIdproductphoto($idproductphoto = null, $comparison = null)
    {
        if (is_array($idproductphoto)) {
            $useMinMax = false;
            if (isset($idproductphoto['min'])) {
                $this->addUsingAlias(ProductphotoPeer::IDPRODUCTPHOTO, $idproductphoto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductphoto['max'])) {
                $this->addUsingAlias(ProductphotoPeer::IDPRODUCTPHOTO, $idproductphoto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductphotoPeer::IDPRODUCTPHOTO, $idproductphoto, $comparison);
    }

    /**
     * Filter the query on the idproduct column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproduct(1234); // WHERE idproduct = 1234
     * $query->filterByIdproduct(array(12, 34)); // WHERE idproduct IN (12, 34)
     * $query->filterByIdproduct(array('min' => 12)); // WHERE idproduct >= 12
     * $query->filterByIdproduct(array('max' => 12)); // WHERE idproduct <= 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $idproduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductphotoQuery The current query, for fluid interface
     */
    public function filterByIdproduct($idproduct = null, $comparison = null)
    {
        if (is_array($idproduct)) {
            $useMinMax = false;
            if (isset($idproduct['min'])) {
                $this->addUsingAlias(ProductphotoPeer::IDPRODUCT, $idproduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduct['max'])) {
                $this->addUsingAlias(ProductphotoPeer::IDPRODUCT, $idproduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductphotoPeer::IDPRODUCT, $idproduct, $comparison);
    }

    /**
     * Filter the query on the productphoto_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductphotoName('fooValue');   // WHERE productphoto_name = 'fooValue'
     * $query->filterByProductphotoName('%fooValue%'); // WHERE productphoto_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productphotoName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductphotoQuery The current query, for fluid interface
     */
    public function filterByProductphotoName($productphotoName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productphotoName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productphotoName)) {
                $productphotoName = str_replace('*', '%', $productphotoName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductphotoPeer::PRODUCTPHOTO_NAME, $productphotoName, $comparison);
    }

    /**
     * Filter the query on the productphoto_url column
     *
     * Example usage:
     * <code>
     * $query->filterByProductphotoUrl('fooValue');   // WHERE productphoto_url = 'fooValue'
     * $query->filterByProductphotoUrl('%fooValue%'); // WHERE productphoto_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productphotoUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductphotoQuery The current query, for fluid interface
     */
    public function filterByProductphotoUrl($productphotoUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productphotoUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productphotoUrl)) {
                $productphotoUrl = str_replace('*', '%', $productphotoUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductphotoPeer::PRODUCTPHOTO_URL, $productphotoUrl, $comparison);
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductphotoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(ProductphotoPeer::IDPRODUCT, $product->getIdproduct(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductphotoPeer::IDPRODUCT, $product->toKeyValue('PrimaryKey', 'Idproduct'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type Product or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductphotoQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation Product object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Productphoto $productphoto Object to remove from the list of results
     *
     * @return ProductphotoQuery The current query, for fluid interface
     */
    public function prune($productphoto = null)
    {
        if ($productphoto) {
            $this->addUsingAlias(ProductphotoPeer::IDPRODUCTPHOTO, $productphoto->getIdproductphoto(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
