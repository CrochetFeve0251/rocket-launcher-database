{% if in_array('{{ field['type'] }}', ['string', 'int', 'float', 'boolean']) : %}
$this->{{ field['name'] }} = ({{ field['type'] }}) $this->{{ field['name'] }};
{% endif %}
{% if '{{ field['type'] }}' === 'text' : %}
$this->{{ field['name'] }} =  (string) $this->{{ field['name'] }};
{% endif %}
{% if '{{ field['type'] }}' === 'datetime' : %}
$this->{{ field['name'] }} = empty( $this->{{ field['name'] }} ) ? 0 : strtotime( $this->{{ field['name'] }} );
{% endif %}
