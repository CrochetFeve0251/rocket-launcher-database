{% if '{{ field['type'] }}' === 'datetime' : %}
{{ field['name'] }}    timestamp           NOT NULL default '0000-00-00 00:00:00',
{% endif %}
{% if '{{ field['type'] }}' === 'string' : %}
{{ field['name'] }}           varchar(255)        NOT NULL default '',
{% endif %}
{% if '{{ field['type'] }}' === 'text' : %}
{{ field['name'] }}              longtext                     default NULL,
{% endif %}
{% if '{{ field['type'] }}' === 'boolean' : %}
{{ field['name'] }}        tinyint(1)          NOT NULL default 0,
{% endif %}
{% if '{{ field['type'] }}' === 'int' : %}
{{ field['name'] }}        int(10)          NOT NULL default 0,
{% endif %}
{% if '{{ field['type'] }}' === 'float' : %}
{{ field['name'] }}        float(10)          NOT NULL default 0,
{% endif %}
