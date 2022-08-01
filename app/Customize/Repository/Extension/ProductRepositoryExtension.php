<?php

namespace Customize\Repository\Extension;

use Doctrine\ORM\QueryBuilder;
use Eccube\Doctrine\Query\QueryCustomizer;
use Eccube\Doctrine\Query\OrderByClause;
use Eccube\Doctrine\Query\OrderByCustomizer;
use Eccube\Repository\QueryKey;
use Eccube\Request\Context;

class ProductRepositoryExtension implements QueryCustomizer
{
    /**
     * @var Context
     */
    private $context;

    /**
     * ProductListWhereCustomizer constructor.
     *
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }
    
    /**
     * {@inheritdoc}
     */
    public function customize(QueryBuilder $builder, $params, $queryKey)
    {
        if (!empty($params['group_id']) && $params['group_id']) {
            $builder
                ->innerJoin('p.ShopStoreGroup', 'psg')
                ->andWhere('psg.id = :group_id')
                ->setParameter('group_id', $params['group_id']);
        }
        dump($builder);
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryKey()
    {
        return QueryKey::PRODUCT_SEARCH;
    }
}