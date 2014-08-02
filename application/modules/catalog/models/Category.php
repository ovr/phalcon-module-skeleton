<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace Catalog\Model;

/**
 * Class Category
 * @package User\Model
 *
 * @Source("Catalog__Categories")
 */
class Category extends \Phalcon\Mvc\Model
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
     * @Column(name="title", type="string")
     * @var string
     */
    public $title;
}
