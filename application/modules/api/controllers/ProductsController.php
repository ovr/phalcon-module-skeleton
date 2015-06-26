<?php

namespace Api\Controller;

use Exception;
use Phalcon\Mvc\Controller;
use Phalcon\Paginator\Adapter\QueryBuilder;
use Catalog\Model\Product;

/**
 * Class ProductsController
 * @package Api\Controller
 */
class ProductsController extends BaseController
{
    public function indexAction()
    {
        $limit = $this->getQueryLimit();

        $page = $this->request->get('page', ['trim', 'int'], 1);
        if ($page < 1) {
            throw new Exception('Page must be > 0');
        }

        $builder = $this->modelsManager->createBuilder()
            ->from('Catalog\Model\Product')
            ->orderBy('id ASC');

        $paginator = new QueryBuilder(array(
            "builder" => $builder,
            "limit"=> $limit,
            "page" => $page
        ));


        $result = array();
        $page = $paginator->getPaginate();

        /**
         * @var $product Product
         */
        foreach ($page->items as $product) {
            $result[] = [
                'id' => $product->id,
                'title' => $product->title
            ];
        }

        return array(
            'success' => true,
            'result' => array(
                'products' => $result,
                'pages' => $page->total_pages,
                'total' => $page->total_items
            )
        );
    }

    public function getAction($id)
    {
        if ($id <= 0) {
            throw new Exception('Wrong id passed', 500);
        }

        /**
         * @var $entity Product|boolean
         */
        $entity = Product::findFirst($id);
        if (!$entity) {
            throw new Exception('Product not found', 404);
        }

        return array(
            'success' => true,
            'result' => array(
                'id' => $entity->id,
                'title' => $entity->title
            )
        );
    }
}
