<?php
/**
 * @author Patsura Dmitry <talk@dmtry.me>
 */

namespace App\Console;

class Application extends \Symfony\Component\Console\Application
{
    /**
     * @var \Phalcony\Application
     */
    private $application;

    /**
     * @param \Phalcony\Application $application
     */
    public function __construct(\Phalcony\Application $application)
    {
        $this->application = $application;

        parent::__construct();
    }

    /**
     * @return \Phalcony\Application
     */
    public function getApplication()
    {
        return $this->application;
    }
}