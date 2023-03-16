<?php

namespace RocketLauncherDatabase;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use RocketLauncherBuilder\App;
use RocketLauncherBuilder\Entities\Configurations;
use RocketLauncherBuilder\ServiceProviders\ServiceProviderInterface;
use RocketLauncherBuilder\Services\ClassGenerator;
use RocketLauncherBuilder\Services\ProviderManager;
use RocketLauncherBuilder\Templating\Renderer;
use RocketLauncherDatabase\Commands\GenerateTableCommand;
use RocketLauncherDatabase\Commands\InstallCommand;
use RocketLauncherDatabase\Services\ProjectManager;
use RocketLauncherBuilder\Services\ProjectManager as BuilderProjectManager;
class ServiceProvider implements ServiceProviderInterface
{

    /**
     * Interacts with the filesystem.
     *
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * Configuration from the project.
     *
     * @var Configurations
     */
    protected $configs;

    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * @var Renderer
     */
    protected $app_renderer;

    /**
     * Instantiate the class.
     *
     * @param Configurations $configs configuration from the project.
     * @param Filesystem $filesystem Interacts with the filesystem.
     * @param string $app_dir base directory from the cli.
     */
    public function __construct(Configurations $configs, Filesystem $filesystem, string $app_dir)
    {
        $this->configs = $configs;
        $this->filesystem = $filesystem;

        $adapter = new Local(
        // Determine root directory
            __DIR__ . '/../'
        );

        // The FilesystemOperator
        $template_filesystem = new Filesystem($adapter);

        $this->renderer = new Renderer($template_filesystem, '/templates/');

        $adapter = new Local(
        // Determine root directory
            $app_dir
        );

        // The FilesystemOperator
        $app_filesystem = new Filesystem($adapter);

        $this->app_renderer = new Renderer($app_filesystem, '/templates/');
    }


    public function attach_commands(App $app): App
    {
        $project_manager = new ProjectManager($this->filesystem);
        $class_generator = new ClassGenerator($this->filesystem, $this->renderer, $this->configs);
        $builder_project_manager = new BuilderProjectManager($this->filesystem);
        $provider_manager = new ProviderManager($app, $this->filesystem, $class_generator, $this->app_renderer, $builder_project_manager);
        $app->add(new InstallCommand($project_manager));
        $app->add(new GenerateTableCommand($class_generator, $this->configs, $provider_manager, $builder_project_manager));

        return $app;
    }
}
