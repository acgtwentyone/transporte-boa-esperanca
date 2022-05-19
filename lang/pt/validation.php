<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute deve ser aceite.',
    'accepted_if' => ':attribute deve ser aceite quando :other is :value.',
    'active_url' => ':attribute não é um URL válido.',
    'after' => ':attribute deve ser uma data depois de :date.',
    'after_or_equal' => ':attribute deve ser uma data depois ou iqual a :date.',
    'alpha' => ':attribute deve conter apenas caracteres.',
    'alpha_dash' => ':attribute deve conter apenas letras, números, ífen e underscores.',
    'alpha_num' => ':attribute deve conter apenas letras e números.',
    'array' => ':attribute deve ser uma array.',
    'before' => ':attribute deve ser uma data antes de :date.',
    'before_or_equal' => ':attribute deve ter uma data antes ou igual :date.',
    'between' => [
        'array' => ':attribute deve ser entre :min e :max itens.',
        'file' => ':attribute deve ter entre :min e :max kilobytes.',
        'numeric' => ':attribute deve ter entre :min e :max.',
        'string' => ':attribute deve ter entre :min e :max characteres.',
    ],
    'boolean' => 'Campo :attribute deve ser verdadeiro ou falso.',
    'confirmed' => ':attribute confirmação não correspondem.',
    'current_password' => 'A palavra passe está incorreta.',
    'date' => ':attribute não é uma data válida.',
    'date_equals' => ':attribute deve ser uma data igual a :date.',
    'date_format' => ':attribute não corresponde ao formato :format.',
    'declined' => ':attribute não deve ser aceite.',
    'declined_if' => ':attribute não deve ser aceite quando :other é :value.',
    'different' => ':attribute e :other devem ser diferentes.',
    'digits' => ':attribute deve ter :digits dígitos.',
    'digits_between' => ':attribute deve ter entre :min e :max digitos.',
    'dimensions' => ':attribute não tem um tamanho de imagem válido.',
    'distinct' => 'Campo :attribute tem um valor duplicado.',
    'email' => ':attribute deve ser um endereço eletrónico válido.',
    'ends_with' => ':attribute deve terminal com um dos seguintes: :values.',
    'enum' => ':attribute selecionado é inválido.',
    'exists' => ':attribute selecionado é inválido.',
    'file' => ':attribute deve ser um ficheiro.',
    'filled' => 'Campo :attribute deve ter um valor preenchido.',
    'gt' => [
        'array' => ':attribute deve ter mais do que :value itens.',
        'file' => ':attribute deve ser maior do que :value kilobytes.',
        'numeric' => ':attribute deve ser maior do que :value.',
        'string' => ':attribute deve ser maior do que :value characteres.',
    ],
    'gte' => [
        'array' => ':attribute deve ter :value itens ou mais.',
        'file' => ':attribute deve ser maior do que ou igual a :value kilobytes.',
        'numeric' => ':attribute deve ser maior do que ou igual a :value.',
        'string' => ':attribute deve ser maior do que ou igual a :value characters.',
    ],
    'image' => ':attribute deve ter uma imagem.',
    'in' => 'O :attribute selecionado é inválido.',
    'in_array' => 'Campo :attribute não existem em :other.',
    'integer' => ':attribute deve ser um inetiro.',
    'ip' => ':attribute deve ser um endereço IP válido.',
    'ipv4' => ':attribute deve ser um endereço IPv4.',
    'ipv6' => ':attribute deve ser um endereço IPv6.',
    'json' => ':attribute deve ser um JSON.',
    'lt' => [
        'array' => ':attribute deve ter menos que :value itens.',
        'file' => ':attribute deve ter menos que :value kilobytes.',
        'numeric' => ':attribute deve ter menos que :value.',
        'string' => ':attribute deve ter menos que :value characteres.',
    ],
    'lte' => [
        'array' => ':attribute não deve ter mais do que :value itens.',
        'file' => ':attribute deve ter menos que ou igual a :value kilobytes.',
        'numeric' => ':attribute deve ter menos que ou igual a :value.',
        'string' => ':attribute deve ter menos que ou igual a :value characteres.',
    ],
    'mac_address' => ':attribute deve ser um endereço MAC.',
    'max' => [
        'array' => ':attribute não deve ter mais do que :max itens.',
        'file' => ':attribute não deve ser maior do que :max kilobytes.',
        'numeric' => ':attribute não deve ser maior do que :max.',
        'string' => ':attribute não deve ser maior do que :max characteres.',
    ],
    'mimes' => ':attribute deve ter um ficheiro de tipos: :values.',
    'mimetypes' => ':attribute deve ter um ficheiro de tipos : :values.',
    'min' => [
        'array' => ':attribute deve ter pelo menos :min itens.',
        'file' => ':attribute deve ter pelo menos :min kilobytes.',
        'numeric' => ':attribute deve ter pelo menos :min.',
        'string' => ':attribute deve ter pelo menos :min characteres.',
    ],
    'multiple_of' => ':attribute deve ser um múltiplo of :value.',
    'not_in' => 'O :attribute selecionado é inválido.',
    'not_regex' => 'O formato de :attribute é inválido.',
    'numeric' => ':attribute deve ser numérico.',
    'password' => [
        'letters' => ':attribute deve incluir pelo menos uma letra.',
        'mixed' => ':attribute deve incluir pelo menos uma letra maíuscula e uma minúscula.',
        'numbers' => ':attribute deve incluir pelo menos uma número.',
        'symbols' => ':attribute deve incluir pelo menos uma símbolo.',
        'uncompromised' => 'O valor fornecido para :attribute apareceu em um vazamento de dados. Por favor escolhe um :attribute diferente.',
    ],
    'present' => 'Campo :attribute deve estar presente.',
    'prohibited' => 'Campo :attribute is proibido.',
    'prohibited_if' => 'Campo :attribute é proibido quando :other é :value.',
    'prohibited_unless' => 'Campo :attribute é proibido a não ser que :other está em :values.',
    'prohibits' => 'Campo :attribute proíbe :other de estar presente.',
    'regex' => 'O formato de :attribute é inválido.',
    'required' => 'Campo :attribute é obrigatório.',
    'required_array_keys' => 'Campo :attribute deve incluir uma das seguintes entradas: :values.',
    'required_if' => 'Campo :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'Campo :attribute é obrigatório a não ser que :other está entre :values.',
    'required_with' => 'Campo :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'Campo :attribute é obrigatório quando :values estão presentes.',
    'required_without' => 'Campo :attribute é obrigatório quando :values não estão presentes.',
    'required_without_all' => 'Campo :attribute é obrigatório quando nenhum de :values estão presentes.',
    'same' => ':attribute e :other devem coincidir.',
    'size' => [
        'array' => ':attribute deve incluir :size itens.',
        'file' => ':attribute deve ter :size kilobytes.',
        'numeric' => ':attribute deve ter :size.',
        'string' => ':attribute deve ter :size characteres.',
    ],
    'starts_with' => ':attribute deve começar com um dos seguintes: :values.',
    'string' => ':attribute deve ser um conjunto de caracteres.',
    'timezone' => ':attribute deve ser um endereço timezone.',
    'unique' => 'Já existe um valor para o campo :attribute.',
    'uploaded' => 'O carregamento de :attribute falhou.',
    'url' => ':attribute deve ser um URL.',
    'uuid' => ':attribute deve ser um UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap our attribute placeholder
    | with something mais reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message mais expressive.
    |
    */

    'attributes' => [],

];
