<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace User\Model\User;

class User
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     * @var integer
     */
    public $id;

    /**
     * @Column(name="firstname", type="string", length=100)
     * @var string
     */
    public $firstname;

    /**
     * @Column(name="lastname", type="string", length=100)
     * @var string
     */
    public $lastname;

    /**
     * @Column(name="email", type="string", length=100)
     * @var string
     */
    public $email;
}
