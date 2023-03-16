<?php

namespace RocketLauncherDatabase\Commands;

use RocketLauncherBuilder\Commands\Command;
use RocketLauncherBuilder\Entities\Configurations;
use RocketLauncherDatabase\Services\ProjectManager;

class InstallCommand extends Command
{

    /**
     * @var ProjectManager
     */
    protected $project_manager;

    public function __construct(ProjectManager $project_manager)
    {
        parent::__construct('database:initialize', 'Initialize the database library');

        $this->project_manager = $project_manager;

        $this
            // Usage examples:
            ->usage(
            // append details or explanation of given example with ` ## ` so they will be uniformly aligned when shown
                '<bold>  $0 database:initialize</end> ## Initialize the database library<eol/>'
            );
    }

    public function execute() {
        $this->project_manager->add_library();
    }
}
