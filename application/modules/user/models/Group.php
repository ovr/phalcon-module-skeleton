<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace User\Model;

/**
 * Class Groups
 * @package User\Model
 *
 * @Source("User__Groups")
 */
class Group extends \Phalcon\Mvc\Model
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
