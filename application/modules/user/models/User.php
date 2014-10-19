<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace User\Model;

/**
 * Class User
 * @package User\Model
 *
 * @Source("User__Users")
 *
 * @BelongsTo("group_id", '\User\Model\Group', "id", {
 *  "alias": "Group"
 * })
 */
class User extends \Phalcon\Mvc\Model
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
     * @Column(name="firstname", type="string", length=45)
     * @var string
     */
    public $firstname;

    /**
     * @Column(name="lastname", type="string", length=45, nullable=true)
     * @var string
     */
    public $lastname;

    /**
     * @Column(name="nick", type="string", length=45, nullable=true)
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
     * @Column(type="integer", nullable=false, name="group_id", size="11")
     */
    public $group_id;

    /**
     * @param string $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return \Phalcon\Mvc\Model\ResultsetInterface
     */
    public function getGroup()
    {
        return $this->getRelated('Group');
    }

    public function getUsername()
    {
        if ($this->lastname) {
            return $this->firstname . ' ' . $this->lastname;
        }

        return $this->firstname;
    }
}
