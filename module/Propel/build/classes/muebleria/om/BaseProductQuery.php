<?php


/**
 * Base class that represents a query for the 'product' table.
 *
 *
 *
 * @method ProductQuery orderByIdproduct($order = Criteria::ASC) Order by the idproduct column
 * @method ProductQuery orderByIdcategory($order = Criteria::ASC) Order by the idcategory column
 * @method ProductQuery orderByProductName($order = Criteria::ASC) Order by the product_name column
 * @method ProductQuery orderByProductDescription($order = Criteria::ASC) Order by the product_description column
 * @method ProductQuery orderByProductPrice($order = Criteria::ASC) Order by the product_price column
 * @method ProductQuery orderByProductLong($order = Criteria::ASC) Order by the product_long column
 * @method ProductQuery orderByProductHigh($order = Criteria::ASC) Order by the product_high column
 * @method ProductQuery orderByProductDepth($order = Criteria::ASC) Order by the product_depth column
 *
 * @method ProductQuery groupByIdproduct() Group by the idproduct column
 * @method ProductQuery groupByIdcategory() Group by the idcategory column
 * @method ProductQuery groupByProductName() Group by the product_name column
 * @method ProductQuery groupByProductDescription() Group by the product_description column
 * @method ProductQuery groupByProductPrice() Group by the product_price column
 * @method ProductQuery groupByProductLong() Group by the product_long column
 * @method ProductQuery groupByProductHigh() Group by the product_high column
 * @method ProductQuery groupByProductDepth() Group by the product_depth column
 *
 * @method ProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method ProductQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method ProductQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method ProductQuery leftJoinMaterial($relationAlias = null) Adds a LEFT JOIN clause to the query using the Material relation
 * @method ProductQuery rightJoinMaterial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Material relation
 * @method ProductQuery innerJoinMaterial($relationAlias = null) Adds a INNER JOIN clause to the query using the Material relation
 *
 * @method ProductQuery leftJoinProductphoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productphoto relation
 * @method ProductQuery rightJoinProductphoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productphoto relation
 * @method ProductQuery innerJoinProductphoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Productphoto relation
 *
 * @method ProductQuery leftJoinProductquestion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productquestion relation
 * @method ProductQuery rightJoinProductquestion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productquestion relation
 * @method ProductQuery innerJoinProductquestion($relationAlias = null) Adds a INNER JOIN clause to the query using the Productquestion relation
 *
 * @method Product findOne(PropelPDO $con = null) Return the first Product matching the query
 * @method Product findOneOrCreate(PropelPDO $con = null) Return the first Product matching the query, or a new Product object populated from the query conditions when no match is found
 *
 * @method Product findOneByIdcategory(int $idcategory) Return the first Product filtered by the idcategory column
 * @method Product findOneByProductName(string $product_name) Return the first Product filtered by the product_name column
 * @method Product findOneByProductDescription(string $product_description) Return the first Product filtered by the product_description column
 * @method Product findOneByProductPrice(string $product_price) Return the first Product filtered by the product_price column
 * @method Product findOneByProductLong(string $product_long) Return the first Product filtered by the product_long column
 * @method Product findOneByProductHigh(string $product_high) Return the first Product filtered by the product_high column
 * @method Product findOneByProductDepth(string $product_depth) Return the first Product filtered by the product_depth column
 *
 * @method array findByIdproduct(int $idproduct) Return Product objects filtered by the idproduct column
 * @method array findByIdcategory(int $idcategory) Return Product objects filtered by the idcategory column
 * @method array findByProductName(string $product_name) Return Product objects filtered by the product_name column
 * @method array findByProductDescription(string $product_description) Return Product objects filtered by the product_description column
 * @method array findByProductPrice(string $product_price) Return Product objects filtered by the product_price column
 * @method array findByProductLong(string $product_long) Return Product objects filtered by the product_long column
 * @method array findByProductHigh(string $product_high) Return Product objects filtered by the product_high column
 * @method array findByProductDepth(string $product_depth) Return Product objects filtered by the product_depth column
 *
 * @package    propel.generator.muebleria.om
 */
abstract class BaseProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductQuery object.
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
            $modelName = 'Product';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductQuery) {
            return $criteria;
        }
        $query = new ProductQuery(null, null, $modelAlias);

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
     * @return   Product|Product[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Product A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproduct($key, $con = null)
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
     * @return                 Product A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproduct`, `idcategory`, `product_name`, `product_description`, `product_price`, `product_long`, `product_high`, `product_depth` FROM `product` WHERE `idproduct` = :p0';
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
            $obj = new Product();
            $obj->hydrate($row);
            ProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Product|Product[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Product[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductPeer::IDPRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductPeer::IDPRODUCT, $keys, Criteria::IN);
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
     * @param     mixed $idproduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByIdproduct($idproduct = null, $comparison = null)
    {
        if (is_array($idproduct)) {
            $useMinMax = false;
            if (isset($idproduct['min'])) {
                $this->addUsingAlias(ProductPeer::IDPRODUCT, $idproduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduct['max'])) {
                $this->addUsingAlias(ProductPeer::IDPRODUCT, $idproduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::IDPRODUCT, $idproduct, $comparison);
    }

    /**
     * Filter the query on the idcategory column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcategory(1234); // WHERE idcategory = 1234
     * $query->filterByIdcategory(array(12, 34)); // WHERE idcategory IN (12, 34)
     * $query->filterByIdcategory(array('min' => 12)); // WHERE idcategory >= 12
     * $query->filterByIdcategory(array('max' => 12)); // WHERE idcategory <= 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $idcategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByIdcategory($idcategory = null, $comparison = null)
    {
        if (is_array($idcategory)) {
            $useMinMax = false;
            if (isset($idcategory['min'])) {
                $this->addUsingAlias(ProductPeer::IDCATEGORY, $idcategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcategory['max'])) {
                $this->addUsingAlias(ProductPeer::IDCATEGORY, $idcategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::IDCATEGORY, $idcategory, $comparison);
    }

    /**
     * Filter the query on the product_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductName('fooValue');   // WHERE product_name = 'fooValue'
     * $query->filterByProductName('%fooValue%'); // WHERE product_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductName($productName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productName)) {
                $productName = str_replace('*', '%', $productName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_NAME, $productName, $comparison);
    }

    /**
     * Filter the query on the product_description column
     *
     * Example usage:
     * <code>
     * $query->filterByProductDescription('fooValue');   // WHERE product_description = 'fooValue'
     * $query->filterByProductDescription('%fooValue%'); // WHERE product_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductDescription($productDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productDescription)) {
                $productDescription = str_replace('*', '%', $productDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_DESCRIPTION, $productDescription, $comparison);
    }

    /**
     * Filter the query on the product_price column
     *
     * Example usage:
     * <code>
     * $query->filterByProductPrice(1234); // WHERE product_price = 1234
     * $query->filterByProductPrice(array(12, 34)); // WHERE product_price IN (12, 34)
     * $query->filterByProductPrice(array('min' => 12)); // WHERE product_price >= 12
     * $query->filterByProductPrice(array('max' => 12)); // WHERE product_price <= 12
     * </code>
     *
     * @param     mixed $productPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductPrice($productPrice = null, $comparison = null)
    {
        if (is_array($productPrice)) {
            $useMinMax = false;
            if (isset($productPrice['min'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_PRICE, $productPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productPrice['max'])) {
                $this->addUsingAlias(ProductPeer::PRODUCT_PRICE, $productPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_PRICE, $productPrice, $comparison);
    }

    /**
     * Filter the query on the product_long column
     *
     * Example usage:
     * <code>
     * $query->filterByProductLong('fooValue');   // WHERE product_long = 'fooValue'
     * $query->filterByProductLong('%fooValue%'); // WHERE product_long LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productLong The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductLong($productLong = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productLong)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productLong)) {
                $productLong = str_replace('*', '%', $productLong);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_LONG, $productLong, $comparison);
    }

    /**
     * Filter the query on the product_high column
     *
     * Example usage:
     * <code>
     * $query->filterByProductHigh('fooValue');   // WHERE product_high = 'fooValue'
     * $query->filterByProductHigh('%fooValue%'); // WHERE product_high LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productHigh The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductHigh($productHigh = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productHigh)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productHigh)) {
                $productHigh = str_replace('*', '%', $productHigh);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_HIGH, $productHigh, $comparison);
    }

    /**
     * Filter the query on the product_depth column
     *
     * Example usage:
     * <code>
     * $query->filterByProductDepth('fooValue');   // WHERE product_depth = 'fooValue'
     * $query->filterByProductDepth('%fooValue%'); // WHERE product_depth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productDepth The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductDepth($productDepth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productDepth)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productDepth)) {
                $productDepth = str_replace('*', '%', $productDepth);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_DEPTH, $productDepth, $comparison);
    }

    /**
     * Filter the query by a related Category object
     *
     * @param   Category|PropelObjectCollection $category The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategory($category, $comparison = null)
    {
        if ($category instanceof Category) {
            return $this
                ->addUsingAlias(ProductPeer::IDCATEGORY, $category->getIdcategory(), $comparison);
        } elseif ($category instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductPeer::IDCATEGORY, $category->toKeyValue('PrimaryKey', 'Idcategory'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type Category or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation Category object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', 'CategoryQuery');
    }

    /**
     * Filter the query by a related Material object
     *
     * @param   Material|PropelObjectCollection $material  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaterial($material, $comparison = null)
    {
        if ($material instanceof Material) {
            return $this
                ->addUsingAlias(ProductPeer::IDPRODUCT, $material->getIdproduct(), $comparison);
        } elseif ($material instanceof PropelObjectCollection) {
            return $this
                ->useMaterialQuery()
                ->filterByPrimaryKeys($material->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMaterial() only accepts arguments of type Material or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Material relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function joinMaterial($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Material');

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
            $this->addJoinObject($join, 'Material');
        }

        return $this;
    }

    /**
     * Use the Material relation Material object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MaterialQuery A secondary query class using the current class as primary query
     */
    public function useMaterialQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMaterial($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Material', 'MaterialQuery');
    }

    /**
     * Filter the query by a related Productphoto object
     *
     * @param   Productphoto|PropelObjectCollection $productphoto  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductphoto($productphoto, $comparison = null)
    {
        if ($productphoto instanceof Productphoto) {
            return $this
                ->addUsingAlias(ProductPeer::IDPRODUCT, $productphoto->getIdproduct(), $comparison);
        } elseif ($productphoto instanceof PropelObjectCollection) {
            return $this
                ->useProductphotoQuery()
                ->filterByPrimaryKeys($productphoto->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductphoto() only accepts arguments of type Productphoto or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productphoto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function joinProductphoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productphoto');

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
            $this->addJoinObject($join, 'Productphoto');
        }

        return $this;
    }

    /**
     * Use the Productphoto relation Productphoto object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductphotoQuery A secondary query class using the current class as primary query
     */
    public function useProductphotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductphoto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productphoto', 'ProductphotoQuery');
    }

    /**
     * Filter the query by a related Productquestion object
     *
     * @param   Productquestion|PropelObjectCollection $productquestion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductquestion($productquestion, $comparison = null)
    {
        if ($productquestion instanceof Productquestion) {
            return $this
                ->addUsingAlias(ProductPeer::IDPRODUCT, $productquestion->getIdproduct(), $comparison);
        } elseif ($productquestion instanceof PropelObjectCollection) {
            return $this
                ->useProductquestionQuery()
                ->filterByPrimaryKeys($productquestion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductquestion() only accepts arguments of type Productquestion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productquestion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function joinProductquestion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productquestion');

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
            $this->addJoinObject($join, 'Productquestion');
        }

        return $this;
    }

    /**
     * Use the Productquestion relation Productquestion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductquestionQuery A secondary query class using the current class as primary query
     */
    public function useProductquestionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductquestion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productquestion', 'ProductquestionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Product $product Object to remove from the list of results
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function prune($product = null)
    {
        if ($product) {
            $this->addUsingAlias(ProductPeer::IDPRODUCT, $product->getIdproduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
