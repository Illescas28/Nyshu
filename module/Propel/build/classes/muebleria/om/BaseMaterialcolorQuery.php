<?php


/**
 * Base class that represents a query for the 'materialcolor' table.
 *
 *
 *
 * @method MaterialcolorQuery orderByIdmaterialcolor($order = Criteria::ASC) Order by the idmaterialcolor column
 * @method MaterialcolorQuery orderByIdmaterial($order = Criteria::ASC) Order by the idmaterial column
 * @method MaterialcolorQuery orderByMaterialcolorName($order = Criteria::ASC) Order by the materialcolor_name column
 *
 * @method MaterialcolorQuery groupByIdmaterialcolor() Group by the idmaterialcolor column
 * @method MaterialcolorQuery groupByIdmaterial() Group by the idmaterial column
 * @method MaterialcolorQuery groupByMaterialcolorName() Group by the materialcolor_name column
 *
 * @method MaterialcolorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MaterialcolorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MaterialcolorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MaterialcolorQuery leftJoinMaterial($relationAlias = null) Adds a LEFT JOIN clause to the query using the Material relation
 * @method MaterialcolorQuery rightJoinMaterial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Material relation
 * @method MaterialcolorQuery innerJoinMaterial($relationAlias = null) Adds a INNER JOIN clause to the query using the Material relation
 *
 * @method Materialcolor findOne(PropelPDO $con = null) Return the first Materialcolor matching the query
 * @method Materialcolor findOneOrCreate(PropelPDO $con = null) Return the first Materialcolor matching the query, or a new Materialcolor object populated from the query conditions when no match is found
 *
 * @method Materialcolor findOneByIdmaterial(int $idmaterial) Return the first Materialcolor filtered by the idmaterial column
 * @method Materialcolor findOneByMaterialcolorName(string $materialcolor_name) Return the first Materialcolor filtered by the materialcolor_name column
 *
 * @method array findByIdmaterialcolor(int $idmaterialcolor) Return Materialcolor objects filtered by the idmaterialcolor column
 * @method array findByIdmaterial(int $idmaterial) Return Materialcolor objects filtered by the idmaterial column
 * @method array findByMaterialcolorName(string $materialcolor_name) Return Materialcolor objects filtered by the materialcolor_name column
 *
 * @package    propel.generator.muebleria.om
 */
abstract class BaseMaterialcolorQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMaterialcolorQuery object.
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
            $modelName = 'Materialcolor';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MaterialcolorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MaterialcolorQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MaterialcolorQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MaterialcolorQuery) {
            return $criteria;
        }
        $query = new MaterialcolorQuery(null, null, $modelAlias);

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
     * @return   Materialcolor|Materialcolor[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MaterialcolorPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MaterialcolorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Materialcolor A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmaterialcolor($key, $con = null)
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
     * @return                 Materialcolor A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmaterialcolor`, `idmaterial`, `materialcolor_name` FROM `materialcolor` WHERE `idmaterialcolor` = :p0';
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
            $obj = new Materialcolor();
            $obj->hydrate($row);
            MaterialcolorPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Materialcolor|Materialcolor[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Materialcolor[]|mixed the list of results, formatted by the current formatter
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
     * @return MaterialcolorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MaterialcolorPeer::IDMATERIALCOLOR, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MaterialcolorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MaterialcolorPeer::IDMATERIALCOLOR, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmaterialcolor column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmaterialcolor(1234); // WHERE idmaterialcolor = 1234
     * $query->filterByIdmaterialcolor(array(12, 34)); // WHERE idmaterialcolor IN (12, 34)
     * $query->filterByIdmaterialcolor(array('min' => 12)); // WHERE idmaterialcolor >= 12
     * $query->filterByIdmaterialcolor(array('max' => 12)); // WHERE idmaterialcolor <= 12
     * </code>
     *
     * @param     mixed $idmaterialcolor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaterialcolorQuery The current query, for fluid interface
     */
    public function filterByIdmaterialcolor($idmaterialcolor = null, $comparison = null)
    {
        if (is_array($idmaterialcolor)) {
            $useMinMax = false;
            if (isset($idmaterialcolor['min'])) {
                $this->addUsingAlias(MaterialcolorPeer::IDMATERIALCOLOR, $idmaterialcolor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmaterialcolor['max'])) {
                $this->addUsingAlias(MaterialcolorPeer::IDMATERIALCOLOR, $idmaterialcolor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialcolorPeer::IDMATERIALCOLOR, $idmaterialcolor, $comparison);
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
     * @see       filterByMaterial()
     *
     * @param     mixed $idmaterial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaterialcolorQuery The current query, for fluid interface
     */
    public function filterByIdmaterial($idmaterial = null, $comparison = null)
    {
        if (is_array($idmaterial)) {
            $useMinMax = false;
            if (isset($idmaterial['min'])) {
                $this->addUsingAlias(MaterialcolorPeer::IDMATERIAL, $idmaterial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmaterial['max'])) {
                $this->addUsingAlias(MaterialcolorPeer::IDMATERIAL, $idmaterial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialcolorPeer::IDMATERIAL, $idmaterial, $comparison);
    }

    /**
     * Filter the query on the materialcolor_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMaterialcolorName('fooValue');   // WHERE materialcolor_name = 'fooValue'
     * $query->filterByMaterialcolorName('%fooValue%'); // WHERE materialcolor_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $materialcolorName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaterialcolorQuery The current query, for fluid interface
     */
    public function filterByMaterialcolorName($materialcolorName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($materialcolorName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $materialcolorName)) {
                $materialcolorName = str_replace('*', '%', $materialcolorName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MaterialcolorPeer::MATERIALCOLOR_NAME, $materialcolorName, $comparison);
    }

    /**
     * Filter the query by a related Material object
     *
     * @param   Material|PropelObjectCollection $material The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MaterialcolorQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaterial($material, $comparison = null)
    {
        if ($material instanceof Material) {
            return $this
                ->addUsingAlias(MaterialcolorPeer::IDMATERIAL, $material->getIdmaterial(), $comparison);
        } elseif ($material instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MaterialcolorPeer::IDMATERIAL, $material->toKeyValue('PrimaryKey', 'Idmaterial'), $comparison);
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
     * @return MaterialcolorQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Materialcolor $materialcolor Object to remove from the list of results
     *
     * @return MaterialcolorQuery The current query, for fluid interface
     */
    public function prune($materialcolor = null)
    {
        if ($materialcolor) {
            $this->addUsingAlias(MaterialcolorPeer::IDMATERIALCOLOR, $materialcolor->getIdmaterialcolor(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
