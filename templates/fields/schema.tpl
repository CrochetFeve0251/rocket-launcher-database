{% if '{{ field['type'] }}' === 'datetime' : %}
    // {{ field['name'] }} column.
    [
        'name'       => '{{ field['name'] }}',
        'type'       => 'timestamp',
        'default'    => '0000-00-00 00:00:00',
        'created'    => true,
        'date_query' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'string' : %}
    // {{ field['name'] }} column.
    [
        'name'       => '{{ field['name'] }}',
        'type'       => 'varchar',
        'length'     => '255',
        'default'    => '',
        'cache_key'  => true,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'text' : %}
    // {{ field['name'] }} column.
    [
        'name'       => '{{ field['name'] }}',
        'type'       => 'longtext',
        'default'    => null,
        'cache_key'  => false,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'boolean' : %}
    // {{ field['name'] }} column.
    [
        'name'       => '{{ field['name'] }}',
        'type'       => 'tinyint',
        'length'     => '1',
        'default'    => 0,
        'cache_key'  => true,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'int' : %}
    // {{ field['name'] }} column.
    [
        'name'       => '{{ field['name'] }}',
        'type'       => 'int',
        'length'     => '10',
        'default'    => 0,
        'cache_key'  => false,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'float' : %}
    // {{ field['name'] }} column.
    [
        'name'       => '{{ field['name'] }}',
        'type'       => 'float',
        'length'     => '10',
        'default'    => 0,
        'cache_key'  => false,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
