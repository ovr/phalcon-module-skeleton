<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace Catalog\Model;

/**
 * Class Product
 * @package Catalog\Model
 *
 * @Source("Catalog__Products")
 */
class Product extends \Phalcon\Mvc\Model
{
    /**
     * @Id
     * @Identity
     * @GeneratedValue
     * @Primary
     * @Column(type="integer")
     * @var integer
     */
    public $id;

    /**
     * @Column(column="date_created", type="datetime")
     * @var string
     */
    public $dateCreated;

    /**
     * @Column(column="date_modified", type="datetime")
     * @var string
     */
    public $dateModified;

    /**
     * @Column(name="title", type="string", length=200)
     * @var string
     */
    public $title;

    /**
     * @Column(name="price", nullable=false, type="float")
     * @var string
     */
    public $price;

    /**
     * @Column(type="integer", nullable=false, name="category_id", size="11")
     */
    public $category_id;

    /**
     * @Column(name="published", type="boolean")
     * @var string
     */
    public $publish;

    /**
     * @Column(name="deleted", type="boolean")
     * @var string
     */
    public $deleted;
}
