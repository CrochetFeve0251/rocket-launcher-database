<?php

namespace LaunchpadBerlinDB\Services;

use League\Flysystem\Filesystem;
use Composer\Command\InstallCommand;
use Composer\EventDispatcher\ScriptExecutionException;
use Composer\IO\NullIO;
use Composer\Factory;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
class ProjectManager
{
    CONST COMPOSER_FILE = 'composer.json';

    /**
     * Interacts with the filesystem.
     *
     * @var Filesystem
     */
    protected $filesystem;


    /**
     * Instantiate the class.
     *
     * @param Filesystem $filesystem Interacts with the filesystem.
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }


    public function add_library() {
        if( ! $this->filesystem->has(self::COMPOSER_FILE)) {
            return false;
        }

        $content = $this->filesystem->read(self::COMPOSER_FILE);
        $json = json_decode($content,true);
        if(! $json || ! array_key_exists('require-dev', $json) || ! array_key_exists('extra', $json) || ! array_key_exists('mozart', $json['extra']) || ! array_key_exists('packages', $json['extra']['mozart'])) {
            return false;
        }

        if(! key_exists('berlindb/core', $json['require-dev'])) {
            $json['require-dev']['berlindb/core'] = '^2.0';
        }

        if(! in_array('berlindb/core', $json['extra']['mozart']['packages'])) {
            $json['extra']['mozart']['packages'][] = 'berlindb/core';
        }

        $content = json_encode($json, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) . "\n";
        $this->filesystem->update(self::COMPOSER_FILE, $content);

        return true;
    }

    public function reload() {

        if(defined('WPMEDIA_IS_TESTING')) {
            return;
        }

        $this->filesystem->deleteDir('inc/Dependencies');
        $this->filesystem->createDir('inc/Dependencies');

        $jsonFile = $this->filesystem->getAdapter()->getPathPrefix() . 'composer.json';

        $composer = Factory::create(new NullIO(), $jsonFile);
        $command = new InstallCommand();
        $command->setComposer($composer);
        $arguments = array(
            '--no-scripts' => true,
        );
        $command->addOption('no-plugins');
        $command->addOption('no-scripts');
        $input = new ArrayInput($arguments);
        $output = new BufferedOutput();
        try {
            $command->run($input, $output);
        } catch (ScriptExecutionException $e) {

        }
    }

    public function is_resolver_present()
    {
        $content = $this->filesystem->read(self::COMPOSER_FILE);
        $json = json_decode($content,true);
        return $json && key_exists('extra', $json) && key_exists('mozart', $json['extra']) && key_exists('packages', $json['extra']['mozart']) && in_array('wp-launchpad/autoresolver', $json['extra']['mozart']['packages']);
    }
}
