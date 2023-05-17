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

    /**
     * @param Renderer $renderer
     */
    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function add(Field $field) {
        $this->fields[] = $field;
    }

    public function render(FileType $type): string {
        return array_map(function (Field $field) use ($type) {
            $field = [
               'type' => $field->get_type(),
               'name' => $field->get_name(),
               'nullable' => $field->is_nullable(),
            ];
            return $this->renderer->apply_template($this->get_right_template($type), [
                'field' => $field
            ]);
        }, $this->fields);
    }

    protected function get_right_template(FileType $type): string {
        $mapping = [
            FileType::SCHEMA => 'fields/schema',
            FileType::ROW => 'fields/row',
            FileType::ROW_PROPERTIES => 'fields/row_properties',
            FileType::TABLE => 'fields/table',
        ];

        return $mapping[$type->get_value()];
    }
}
