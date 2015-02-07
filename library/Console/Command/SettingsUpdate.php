<?php
/**
 * @author Patsura Dmitry <talk@dmtry.me>
 */

namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Exception;

/**
 * Class Markdown
 * @package App\Console\Command
 *
 * @method \App\Console\Application getApplication();
 */
class SettingsUpdate extends Command
{
    protected function configure()
    {
        $this->setName('settings:update');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @dump setting from database to file
         */
        throw new Exception('Will be implemented soon');
    }
}
