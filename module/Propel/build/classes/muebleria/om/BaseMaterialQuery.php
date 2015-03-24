<?php


/**
 * Base class that represents a query for the 'material' table.
 *
 *
 *
 * @method MaterialQuery orderByIdmaterial($order = Criteria::ASC) Order by the idmaterial column
 * @method MaterialQuery orderByIdproduct($order = Criteria::ASC) Order by the idproduct column
 * @method MaterialQuery orderByMaterialName($order = Criteria::ASC) Order by the material_name column
 *
 * @method MaterialQuery groupByIdmaterial() Group by the idmaterial column
 * @method MaterialQuery groupByIdproduct() Group by the idproduct column
 * @method MaterialQuery groupByMaterialName() Group by the material_name column
 *
 * @method MaterialQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MaterialQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MaterialQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MaterialQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method MaterialQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method MaterialQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method MaterialQuery leftJoinMaterialcolor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Materialcolor relation
 * @method MaterialQuery rightJoinMaterialcolor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Materialcolor relation
 * @method MaterialQuery innerJoinMaterialcolor($relationAlias = null) Adds a INNER JOIN clause to the query using the Materialcolor relation
 *
 * @method Material findOne(PropelPDO $con = null) Return the first Material matching the query
 * @method Material findOneOrCreate(PropelPDO $con = null) Return the first Material matching the query, or a new Material object populated from the query conditions when no match is found
 *
 * @method Material findOneByIdproduct(int $idproduct) Return the first Material filtered by the idproduct column
 * @method Material findOneByMaterialName(string $material_name) Return the first Material filtered by the material_name column
 *
 * @method array findByIdmaterial(int $idmaterial) Return Material objects filtered by the idmaterial column
 * @method array findByIdproduct(int $idproduct) Return Material objects filtered by the idproduct column
 * @method array findByMaterialName(string $material_name) Return Material objects filtered by the material_name column
 *
 * @package    propel.generator.muebleria.om
 */
abstract class BaseMaterialQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMaterialQuery object.
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
            $modelName = 'Material';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MaterialQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MaterialQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MaterialQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MaterialQuery) {
            return $criteria;
        }
        $query = new MaterialQuery(null, null, $modelAlias);

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
     * @return   Material|Material[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MaterialPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MaterialPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Material A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmaterial($key, $con = null)
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
     * @return                 Material A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmaterial`, `idproduct`, `material_name` FROM `material` WHERE `idmaterial` = :p0';
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
            $obj = new Material();
            $obj->hydrate($row);
            MaterialPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Material|Material[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Material[]|mixed the list of results, formatted by the current formatter
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
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MaterialPeer::IDMATERIAL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MaterialPeer::IDMATERIAL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmaterial column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmaterial(1234); // WHERE idmaterial = 1234
     * $query->filterByIdmaterial(array(12, 34)); // WHERE idmaterial IN (12, 34)
     * $query->filterByIdmaterial(array('min' => 12)); // WHERE idmaterial >= 12
     * $query->filterByIdmaterial(array('max' => 12)); // WHERE idmaterial <= 12
     * </code>
     *
     * @param     mixed $idmaterial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterByIdmaterial($idmaterial = null, $comparison = null)
    {
        if (is_array($idmaterial)) {
            $useMinMax = false;
            if (isset($idmaterial['min'])) {
                $this->addUsingAlias(MaterialPeer::IDMATERIAL, $idmaterial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmaterial['max'])) {
                $this->addUsingAlias(MaterialPeer::IDMATERIAL, $idmaterial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialPeer::IDMATERIAL, $idmaterial, $comparison);
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
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterByIdproduct($idproduct = null, $comparison = null)
    {
        if (is_array($idproduct)) {
            $useMinMax = false;
            if (isset($idproduct['min'])) {
                $this->addUsingAlias(MaterialPeer::IDPRODUCT, $idproduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduct['max'])) {
                $this->addUsingAlias(MaterialPeer::IDPRODUCT, $idproduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialPeer::IDPRODUCT, $idproduct, $comparison);
    }

    /**
     * Filter the query on the material_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMaterialName('fooValue');   // WHERE material_name = 'fooValue'
     * $query->filterByMaterialName('%fooValue%'); // WHERE material_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $materialName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterByMaterialName($materialName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($materialName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $materialName)) {
                $materialName = str_replace('*', '%', $materialName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MaterialPeer::MATERIAL_NAME, $materialName, $comparison);
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MaterialQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(MaterialPeer::IDPRODUCT, $product->getIdproduct(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MaterialPeer::IDPRODUCT, $product->toKeyValue('PrimaryKey', 'Idproduct'), $comparison);
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
     * @return MaterialQuery The current query, for fluid interface
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
     * Filter the query by a related Materialcolor object
     *
     * @param   Materialcolor|PropelObjectCollection $materialcolor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MaterialQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaterialcolor($materialcolor, $comparison = null)
    {
        if ($materialcolor instanceof Materialcolor) {
            return $this
                ->addUsingAlias(MaterialPeer::IDMATERIAL, $materialcolor->getIdmaterial(), $comparison);
        } elseif ($materialcolor instanceof PropelObjectCollection) {
            return $this
                ->useMaterialcolorQuery()
                ->filterByPrimaryKeys($materialcolor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMaterialcolor() only accepts arguments of type Materialcolor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Materialcolor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MaterialQuery The current query, for fluid interface
     */
    public function joinMaterialcolor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Materialcolor');

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
            $this->addJoinObject($join, 'Materialcolor');
        }

        return $this;
    }

    /**
     * Use the Materialcolor relation Materialcolor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MaterialcolorQuery A secondary query class using the current class as primary query
     */
    public function useMaterialcolorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMaterialcolor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Materialcolor', 'MaterialcolorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Material $material Object to remove from the list of results
     *
     * @return MaterialQuery The current query, for fluid interface
     */
    public function prune($material = null)
    {
        if ($material) {
            $this->addUsingAlias(MaterialPeer::IDMATERIAL, $material->getIdmaterial(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
