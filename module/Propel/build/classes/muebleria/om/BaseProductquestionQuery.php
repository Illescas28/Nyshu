<?php


/**
 * Base class that represents a query for the 'productquestion' table.
 *
 *
 *
 * @method ProductquestionQuery orderByIdproductquestion($order = Criteria::ASC) Order by the idproductquestion column
 * @method ProductquestionQuery orderByIdproduct($order = Criteria::ASC) Order by the idproduct column
 * @method ProductquestionQuery orderByProductquestionRequesterName($order = Criteria::ASC) Order by the productquestion_requester_name column
 * @method ProductquestionQuery orderByProductquestionRequesterEmail($order = Criteria::ASC) Order by the productquestion_requester_email column
 * @method ProductquestionQuery orderByProductquestionRequesterMessage($order = Criteria::ASC) Order by the productquestion_requester_message column
 * @method ProductquestionQuery orderByProductquestionRequesterDate($order = Criteria::ASC) Order by the productquestion_requester_date column
 * @method ProductquestionQuery orderByProductquestionReply($order = Criteria::ASC) Order by the productquestion_reply column
 * @method ProductquestionQuery orderByProductquestionReplyDate($order = Criteria::ASC) Order by the productquestion_reply_date column
 *
 * @method ProductquestionQuery groupByIdproductquestion() Group by the idproductquestion column
 * @method ProductquestionQuery groupByIdproduct() Group by the idproduct column
 * @method ProductquestionQuery groupByProductquestionRequesterName() Group by the productquestion_requester_name column
 * @method ProductquestionQuery groupByProductquestionRequesterEmail() Group by the productquestion_requester_email column
 * @method ProductquestionQuery groupByProductquestionRequesterMessage() Group by the productquestion_requester_message column
 * @method ProductquestionQuery groupByProductquestionRequesterDate() Group by the productquestion_requester_date column
 * @method ProductquestionQuery groupByProductquestionReply() Group by the productquestion_reply column
 * @method ProductquestionQuery groupByProductquestionReplyDate() Group by the productquestion_reply_date column
 *
 * @method ProductquestionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductquestionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductquestionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductquestionQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProductquestionQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProductquestionQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method Productquestion findOne(PropelPDO $con = null) Return the first Productquestion matching the query
 * @method Productquestion findOneOrCreate(PropelPDO $con = null) Return the first Productquestion matching the query, or a new Productquestion object populated from the query conditions when no match is found
 *
 * @method Productquestion findOneByIdproduct(int $idproduct) Return the first Productquestion filtered by the idproduct column
 * @method Productquestion findOneByProductquestionRequesterName(string $productquestion_requester_name) Return the first Productquestion filtered by the productquestion_requester_name column
 * @method Productquestion findOneByProductquestionRequesterEmail(string $productquestion_requester_email) Return the first Productquestion filtered by the productquestion_requester_email column
 * @method Productquestion findOneByProductquestionRequesterMessage(string $productquestion_requester_message) Return the first Productquestion filtered by the productquestion_requester_message column
 * @method Productquestion findOneByProductquestionRequesterDate(string $productquestion_requester_date) Return the first Productquestion filtered by the productquestion_requester_date column
 * @method Productquestion findOneByProductquestionReply(string $productquestion_reply) Return the first Productquestion filtered by the productquestion_reply column
 * @method Productquestion findOneByProductquestionReplyDate(string $productquestion_reply_date) Return the first Productquestion filtered by the productquestion_reply_date column
 *
 * @method array findByIdproductquestion(int $idproductquestion) Return Productquestion objects filtered by the idproductquestion column
 * @method array findByIdproduct(int $idproduct) Return Productquestion objects filtered by the idproduct column
 * @method array findByProductquestionRequesterName(string $productquestion_requester_name) Return Productquestion objects filtered by the productquestion_requester_name column
 * @method array findByProductquestionRequesterEmail(string $productquestion_requester_email) Return Productquestion objects filtered by the productquestion_requester_email column
 * @method array findByProductquestionRequesterMessage(string $productquestion_requester_message) Return Productquestion objects filtered by the productquestion_requester_message column
 * @method array findByProductquestionRequesterDate(string $productquestion_requester_date) Return Productquestion objects filtered by the productquestion_requester_date column
 * @method array findByProductquestionReply(string $productquestion_reply) Return Productquestion objects filtered by the productquestion_reply column
 * @method array findByProductquestionReplyDate(string $productquestion_reply_date) Return Productquestion objects filtered by the productquestion_reply_date column
 *
 * @package    propel.generator.muebleria.om
 */
abstract class BaseProductquestionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductquestionQuery object.
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
            $modelName = 'Productquestion';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductquestionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductquestionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductquestionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductquestionQuery) {
            return $criteria;
        }
        $query = new ProductquestionQuery(null, null, $modelAlias);

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
     * @return   Productquestion|Productquestion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductquestionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productquestion A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductquestion($key, $con = null)
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
     * @return                 Productquestion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductquestion`, `idproduct`, `productquestion_requester_name`, `productquestion_requester_email`, `productquestion_requester_message`, `productquestion_requester_date`, `productquestion_reply`, `productquestion_reply_date` FROM `productquestion` WHERE `idproductquestion` = :p0';
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
            $obj = new Productquestion();
            $obj->hydrate($row);
            ProductquestionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productquestion|Productquestion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productquestion[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductquestionPeer::IDPRODUCTQUESTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductquestionPeer::IDPRODUCTQUESTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductquestion column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductquestion(1234); // WHERE idproductquestion = 1234
     * $query->filterByIdproductquestion(array(12, 34)); // WHERE idproductquestion IN (12, 34)
     * $query->filterByIdproductquestion(array('min' => 12)); // WHERE idproductquestion >= 12
     * $query->filterByIdproductquestion(array('max' => 12)); // WHERE idproductquestion <= 12
     * </code>
     *
     * @param     mixed $idproductquestion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByIdproductquestion($idproductquestion = null, $comparison = null)
    {
        if (is_array($idproductquestion)) {
            $useMinMax = false;
            if (isset($idproductquestion['min'])) {
                $this->addUsingAlias(ProductquestionPeer::IDPRODUCTQUESTION, $idproductquestion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductquestion['max'])) {
                $this->addUsingAlias(ProductquestionPeer::IDPRODUCTQUESTION, $idproductquestion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductquestionPeer::IDPRODUCTQUESTION, $idproductquestion, $comparison);
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
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByIdproduct($idproduct = null, $comparison = null)
    {
        if (is_array($idproduct)) {
            $useMinMax = false;
            if (isset($idproduct['min'])) {
                $this->addUsingAlias(ProductquestionPeer::IDPRODUCT, $idproduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduct['max'])) {
                $this->addUsingAlias(ProductquestionPeer::IDPRODUCT, $idproduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductquestionPeer::IDPRODUCT, $idproduct, $comparison);
    }

    /**
     * Filter the query on the productquestion_requester_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductquestionRequesterName('fooValue');   // WHERE productquestion_requester_name = 'fooValue'
     * $query->filterByProductquestionRequesterName('%fooValue%'); // WHERE productquestion_requester_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productquestionRequesterName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByProductquestionRequesterName($productquestionRequesterName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productquestionRequesterName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productquestionRequesterName)) {
                $productquestionRequesterName = str_replace('*', '%', $productquestionRequesterName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_NAME, $productquestionRequesterName, $comparison);
    }

    /**
     * Filter the query on the productquestion_requester_email column
     *
     * Example usage:
     * <code>
     * $query->filterByProductquestionRequesterEmail('fooValue');   // WHERE productquestion_requester_email = 'fooValue'
     * $query->filterByProductquestionRequesterEmail('%fooValue%'); // WHERE productquestion_requester_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productquestionRequesterEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByProductquestionRequesterEmail($productquestionRequesterEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productquestionRequesterEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productquestionRequesterEmail)) {
                $productquestionRequesterEmail = str_replace('*', '%', $productquestionRequesterEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_EMAIL, $productquestionRequesterEmail, $comparison);
    }

    /**
     * Filter the query on the productquestion_requester_message column
     *
     * Example usage:
     * <code>
     * $query->filterByProductquestionRequesterMessage('fooValue');   // WHERE productquestion_requester_message = 'fooValue'
     * $query->filterByProductquestionRequesterMessage('%fooValue%'); // WHERE productquestion_requester_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productquestionRequesterMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByProductquestionRequesterMessage($productquestionRequesterMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productquestionRequesterMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productquestionRequesterMessage)) {
                $productquestionRequesterMessage = str_replace('*', '%', $productquestionRequesterMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_MESSAGE, $productquestionRequesterMessage, $comparison);
    }

    /**
     * Filter the query on the productquestion_requester_date column
     *
     * Example usage:
     * <code>
     * $query->filterByProductquestionRequesterDate('2011-03-14'); // WHERE productquestion_requester_date = '2011-03-14'
     * $query->filterByProductquestionRequesterDate('now'); // WHERE productquestion_requester_date = '2011-03-14'
     * $query->filterByProductquestionRequesterDate(array('max' => 'yesterday')); // WHERE productquestion_requester_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $productquestionRequesterDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByProductquestionRequesterDate($productquestionRequesterDate = null, $comparison = null)
    {
        if (is_array($productquestionRequesterDate)) {
            $useMinMax = false;
            if (isset($productquestionRequesterDate['min'])) {
                $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE, $productquestionRequesterDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productquestionRequesterDate['max'])) {
                $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE, $productquestionRequesterDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REQUESTER_DATE, $productquestionRequesterDate, $comparison);
    }

    /**
     * Filter the query on the productquestion_reply column
     *
     * Example usage:
     * <code>
     * $query->filterByProductquestionReply('fooValue');   // WHERE productquestion_reply = 'fooValue'
     * $query->filterByProductquestionReply('%fooValue%'); // WHERE productquestion_reply LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productquestionReply The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByProductquestionReply($productquestionReply = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productquestionReply)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productquestionReply)) {
                $productquestionReply = str_replace('*', '%', $productquestionReply);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REPLY, $productquestionReply, $comparison);
    }

    /**
     * Filter the query on the productquestion_reply_date column
     *
     * Example usage:
     * <code>
     * $query->filterByProductquestionReplyDate('2011-03-14'); // WHERE productquestion_reply_date = '2011-03-14'
     * $query->filterByProductquestionReplyDate('now'); // WHERE productquestion_reply_date = '2011-03-14'
     * $query->filterByProductquestionReplyDate(array('max' => 'yesterday')); // WHERE productquestion_reply_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $productquestionReplyDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function filterByProductquestionReplyDate($productquestionReplyDate = null, $comparison = null)
    {
        if (is_array($productquestionReplyDate)) {
            $useMinMax = false;
            if (isset($productquestionReplyDate['min'])) {
                $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE, $productquestionReplyDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productquestionReplyDate['max'])) {
                $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE, $productquestionReplyDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductquestionPeer::PRODUCTQUESTION_REPLY_DATE, $productquestionReplyDate, $comparison);
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductquestionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(ProductquestionPeer::IDPRODUCT, $product->getIdproduct(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductquestionPeer::IDPRODUCT, $product->toKeyValue('PrimaryKey', 'Idproduct'), $comparison);
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
     * @return ProductquestionQuery The current query, for fluid interface
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
     * @param   Productquestion $productquestion Object to remove from the list of results
     *
     * @return ProductquestionQuery The current query, for fluid interface
     */
    public function prune($productquestion = null)
    {
        if ($productquestion) {
            $this->addUsingAlias(ProductquestionPeer::IDPRODUCTQUESTION, $productquestion->getIdproductquestion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
