<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace User\Model;

/**
 * Class User
 * @package User\Model
 *
 * @Source("User__Users")
 */
class User extends \Phalcon\Mvc\Model
{
    /**
     * @Id
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
     * @Column(name="firstname", type="string", length=45)
     * @var string
     */
    public $firstname;

    /**
     * @Column(name="lastname", type="string", length=45)
     * @var string
     */
    public $lastname;

    /**
     * @Column(name="nick", type="string", length=45)
     * @var string
     */
    public $nick;

    /**
     * @Column(name="email", type="string", length=45)
     * @var string
     */
    public $email;

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

    /**
     * @param string $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }
}
