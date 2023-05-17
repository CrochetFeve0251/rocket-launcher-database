{% if in_array('{{ field['type'] }}', ['string', 'int', 'float', 'boolean']) : %}
$this->last_accessed = empty( $this->last_accessed ) ? 0 : strtotime( $this->last_accessed );
{% endif %}
{% if '{{ field['type'] }}' === 'text' : %}
$this->last_accessed = empty( $this->last_accessed ) ? 0 : strtotime( $this->last_accessed );
{% endif %}
{% if '{{ field['type'] }}' === 'datetime' : %}
$this->last_accessed = empty( $this->last_accessed ) ? 0 : strtotime( $this->last_accessed );
{% endif %}
