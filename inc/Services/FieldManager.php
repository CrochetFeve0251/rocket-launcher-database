<?php

namespace LaunchpadBerlinDB\Services;

use LaunchpadBerlinDB\Entities\Field;
use LaunchpadBerlinDB\Entities\FileType;
use LaunchpadCLI\Templating\Renderer;

class FieldManager
{
    protected $fields = [];

    /**
     * @var Renderer
     */
    protected $renderer;

    public function add(Field $field) {
        $this->fields[] = $field;
    }

    public function render(FileType $type): string {

    }
}
