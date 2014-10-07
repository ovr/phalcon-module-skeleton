<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace OAuth\Model;

/**
 * Class User
 * @package User\Model
 *
 * @Source("OAuth__Users")
 *
 * @BelongsTo("userId", '\User\Model\User', "id", {
 *  "alias": "User"
 * })
 *
 * @property \User\Model\User|boolean $user
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
     * @Column(type="integer", nullable=false, name="user_id", size="11")
     */
    public $userId;

    /**
     * Social network user's id
     *
     * @Column(type="string", nullable=false, name="identifier", size="20")
     */
    public $identifier;

    /**
     * Social network id
     *
     * @Column(type="integer", nullable=false, name="social_id", size="11")
     */
    public $socialId;

    /**
     * @return \User\Model\User|boolean
     */
    public function getUser()
    {
        return $this->getRelated('User');
    }
}
