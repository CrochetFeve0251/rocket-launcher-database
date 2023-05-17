{% if '{{ field['type'] }}' === 'datetime' : %}
    // LAST_ACCESSED column.
    [
        'name'       => 'last_accessed',
        'type'       => 'timestamp',
        'default'    => '0000-00-00 00:00:00',
        'created'    => true,
        'date_query' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'string' : %}
    // URL column.
    [
        'name'       => 'url',
        'type'       => 'varchar',
        'length'     => '255',
        'default'    => '',
        'cache_key'  => true,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'text' : %}
    // CSS column.
    [
        'name'       => 'css',
        'type'       => 'longtext',
        'default'    => null,
        'cache_key'  => false,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'boolean' : %}
    // IS_MOBILE column.
    [
        'name'       => 'is_mobile',
        'type'       => 'tinyint',
        'length'     => '1',
        'default'    => 0,
        'cache_key'  => true,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'int' : %}
    // RETRIES column.
    [
        'name'       => 'retries',
        'type'       => 'int',
        'length'     => '10',
        'default'    => 0,
        'cache_key'  => false,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
{% if '{{ field['type'] }}' === 'float' : %}
    // RETRIES column.
    [
        'name'       => 'retries',
        'type'       => 'float',
        'length'     => '10',
        'default'    => 0,
        'cache_key'  => false,
        'searchable' => true,
        'sortable'   => true,
    ],
{% endif %}
