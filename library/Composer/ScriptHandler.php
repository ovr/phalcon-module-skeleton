<?php
/**
 * @author Patsura Dmitry @ovr <talk@dmtry.me>
 */

namespace App\Composer;

use Composer\Script\Event;

class ScriptHandler
{
    /**
     * Install skeleton
     *
     * @param Event $event
     */
    public static function install(Event $event)
    {
        $io = $event->getIO();

        $io->write('Welcome to install of Phalcon modules skeleton');
        $io->write('<comment>Some parameters are missing. Please provide them.</comment>');

        $extra = $event->getComposer()->getPackage()->getExtra();
        $appDir = realpath(__DIR__ . '/../../' . $extra['app-dir']);
        $configDir = $appDir . '/config/';

        $distConfigure = include_once $configDir . 'parameters.php.dist';

        foreach ($distConfigure as $service => $requiredParameters) {
            $io->write(ucfirst($service) . ' service');

            foreach ($requiredParameters as $key => $value) {
                if (is_array($value)) {
                    continue;
                }

                $default = $value;
                $value = $io->ask(sprintf('<question>%s</question> (<comment>%s</comment>): ', ucfirst($key), $default), $default);

                if ($value != $default) {
                    $distConfigure[$service][$key] = $value;
                }
            }
        }

        file_put_contents($configDir . 'parameters.php', '<?php ' . PHP_EOL . ' return ' . var_export($distConfigure, true) . ';' . PHP_EOL);
    }

    public static function build(Event $event)
    {

    }
}
