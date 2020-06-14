<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    |  following language lines contain  default error messages used by
    |  validator class. Some of se rules ser multiple versions such
    | as  size rules. Feel free to tweak each of se messages here.
    |
    */

    'accepted' => ' :attribute debe ser correcto.',
    'active_url' => ' :attribute No es una URL valida.',
    'after' => ' :attribute debe ser después de :date.',
    'after_or_equal' => ' :attribute debe ser igual o después de :date.',
    'alpha' => ' :attribute sólo permite letras.',
    'alpha_dash' => ' :attribute sólo permite letras, números guiones o guiones bajos.',
    'alpha_num' => ' :attribute Sólo puede contener letras y números.',
    'array' => ' :attribute debe ser an array.',
    'before' => ' :attribute Debe ser una fecha antes de :date.',
    'before_or_equal' => ' :attribute Debe ser una fecha igual o antes de :date.',
    'between' => [
        'numeric' => ' :attribute Debe ser entre :min y :max.',
        'file' => ' :attribute Debe ser entre :min y :max kilobytes.',
        'string' => ' :attribute Debe ser entre :min y :max carácteres.',
        'array' => ' :attribute debe ser between :min and :max items.',
    ],
    'boolean' => ' :attribute Debe ser verdadero o falso.',
    'confirmed' => ' :attribute la validación no coincide.',
    'date' => ':attribute no es una fecha valida.',
    'date_equals' => ':attribute debe ser una fecha igual a :date.',
    'date_format' => ' :attribute no es el formato correcto :format.',
    'different' => ' :attribute y :or deben ser diferentes.',
    'digits' => ' :attribute debe ser :digits digitos.',
    'digits_between' => ' :attribute debe ser entre :min y :max digits.',
    'dimensions' => ' :attribute tiene dimensiones incorrectas.',
    'distinct' => ' :attribute posee contenido duplicado.',
    'email' => ' :attribute debe ser un correo valido.',
    'ends_with' => ' :attribute Debe finalizar con: :values.',
    'exists' => '  :attribute seleccionado es inválido.',
    'file' => ' :attribute debe ser un archivo.',
    'filled' => ' :attribute debe tener un valor.',
    'gt' => [
        'numeric' => ':attribute debe ser mayor a :value.',
        'file' => ':attribute debe ser mayor a :value kilobytes.',
        'string' => ':attribute debe ser mayor a :value carácteres.',
        'array' => ':attribute debe tener :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute debe ser mayor o igual a :value.',
        'file' => ':attribute debe ser mayor o igual a :value kilobytes.',
        'string' => ':attribute debe ser mayor o igual a :value carácteres.',
        'array' => ':attribute debe tener :value o más items.',
    ],
    'image' => ' :attribute debe ser una imágen.',
    'in' => ':attribute seleccionado es inválido.',
    'in_array' => ' :attribute no existe en :or.',
    'integer' => ' :attribute debe ser entero.',
    'ip' => ' :attribute debe ser una dirección IP valida.',
    'ipv4' => ' :attribute debe ser una dirección IPv4 valida.',
    'ipv6' => ' :attribute debe ser una dirección IPv6 valida.',
    'json' => ' :attribute debe ser un string JSON válido.',
    'lt' => [
        'numeric' => ' :attribute debe ser menor a :value.',
        'file' => ' :attribute debe ser menor a :value kilobytes.',
        'string' => ' :attribute debe ser menor a :value carácteres.',
        'array' => ' :attribute debe ser menor a :value items.',
    ],
    'lte' => [
        'numeric' => ' :attribute debe ser menor o igual a :value.',
        'file' => ' :attribute debe ser menor o igual a :value kilobytes.',
        'string' => ' :attribute debe ser menor o igual a :value carácteres.',
        'array' => ' :attribute no pueden ser menor o igual a :value items.',
    ],
    'max' => [
        'numeric' => ' :attribute no puede ser mayor a :max.',
        'file' => ' :attribute no puede ser mayor a :max kilobytes.',
        'string' => ' :attribute no puede ser mayor a :max carácteres.',
        'array' => ' :attribute no puede ser mayor a :max items.',
    ],
    'mimes' => ' :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => ' :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => ' :attribute debe ser al menos :min.',
        'file' => ' :attribute debe ser al menos :min kilobytes.',
        'string' => ' :attribute debe ser al menos :min carácteres.',
        'array' => ' :attribute debe tener al menos :min items.',
    ],
    'not_in' => ':attribute seleccionado es inválido.',
    'not_regex' => ' :attribute formato es inválido.',
    'numeric' => ' :attribute debe ser a numérico.',
    'password' => 'La contraseña es incorrecta.',
    'present' => ' :attribute campo debe ser presente.',
    'regex' => ' :attribute formato es inválido.',
    'required' => ' :attribute campo es required.',
    'required_if' => ' :attribute campo es requerido cuando :or es :value.',
    'required_unless' => ' :attribute campo es requerido a no ser que :or esté en :values.',
    'required_with' => ' :attribute campo es requerido cuando :values está presente.',
    'required_with_all' => ' :attribute campo es requerido cuando :values está presente.',
    'required_without' => ' :attribute campo es requerido cuando :values no está presente.',
    'required_without_all' => ' :attribute campo es requerido cuando ninguno :values está presente.',
    'same' => ' :attribute y :or debe coincidir.',
    'size' => [
        'numeric' => ' :attribute debe ser :size.',
        'file' => ' :attribute debe ser :size kilobytes.',
        'string' => ' :attribute debe ser :size carácteres.',
        'array' => ' :attribute debe contener :size items.',
    ],
    'starts_with' => ' :attribute debe iniciar con uno de los siguientes: :values.',
    'string' => ' :attribute debe ser una cadena de carácteres.',
    'timezone' => ' :attribute debe ser a una zona horaria válida.',
    'unique' => ' :attribute ya ha sido tomado.',
    'uploaded' => ' :attribute falló en subirse.',
    'url' => ' :attribute formato es inválido.',
    'uuid' => ' :attribute debe ser a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using 
    | convention "attribute.rule" to name  lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    |  following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
