{% if '{{ field['type'] }}' === 'datetime' : %}
last_accessed    timestamp           NOT NULL default '0000-00-00 00:00:00',
{% endif %}
{% if '{{ field['type'] }}' === 'string' : %}
status           varchar(255)        NOT NULL default '',
{% endif %}
{% if '{{ field['type'] }}' === 'text' : %}
css              longtext                     default NULL,
{% endif %}
{% if '{{ field['type'] }}' === 'boolean' : %}
is_locked        tinyint(1)          NOT NULL default 0,
{% endif %}
{% if '{{ field['type'] }}' === 'int' : %}
is_locked        int(10)          NOT NULL default 0,
{% endif %}
{% if '{{ field['type'] }}' === 'float' : %}
is_locked        float(10)          NOT NULL default 0,
{% endif %}
