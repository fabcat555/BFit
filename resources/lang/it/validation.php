<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Il campo following language lines contain Il campo default error messages used by
    | Il campo validator class. Some of Il campose rules have multiple versions such
    | as Il campo size rules. Feel free to tweak each of Il campose messages here.
    |
    */

    'accepted'             => 'Il campo :attribute deve essere accettato.',
    'active_url'           => 'Il campo :attribute non è un URL valido.',
    'after'                => 'Il campo :attribute deve essere successiva a :date.',
    'after_or_equal'       => 'Il campo :attribute deve essere successiva o uguale a :date.',
    'alpha'                => 'Il campo :attribute può contenere solo lettere.',
    'alpha_dash'           => 'Il campo :attribute può contenere solo lettere, numeri e trattini.',
    'alpha_num'            => 'Il campo :attribute può contenere solo lettere e numeri.',
    'array'                => 'Il campo :attribute deve essere un array.',
    'before'               => 'Il campo :attribute deve essere precedente a :date.',
    'before_or_equal'      => 'Il campo :attribute deve essere precedente o uguale a :date.',
    'between'              => [
        'numeric' => 'Il campo :attribute must be between :min and :max.',
        'file'    => 'Il campo :attribute must be between :min and :max kilobytes.',
        'string'  => 'Il campo :attribute must be between :min and :max caratteri.',
        'array'   => 'Il campo :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'Il campo :attribute deve essere vero o falso.',
    'confirmed'            => 'Il campo :attribute non corrisponde.',
    'date'                 => 'Il campo :attribute non è una data valida.',
    'date_format'          => 'Il campo :attribute non corrisponde al formato :format.',
    'different'            => 'Il campo :attribute e :other devono essere diversi.',
    'digits'               => 'Il campo :attribute deve avere :digits cifre.',
    'digits_between'       => 'Il campo :attribute deve contenere tra :min e :max cifre.',
    'dimensions'           => 'Il campo :attribute ha una dimensione non valida.',
    'distinct'             => 'Il campo :attribute ha un valore duplicato.',
    'email'                => 'Il campo :attribute deve essere un indirizzo email.',
    'exists'               => 'Il campo selezionato :attribute non è valido.',
    'file'                 => 'Il campo :attribute deve essere un file.',
    'filled'               => 'Il campo :attribute deve avere un valore.',
    'image'                => "Il campo :attribute deve essere un'immagine.",
    'in'                   => 'Il campo selezionato :attribute non è valido.',
    'in_array'             => 'Il campo :attribute non esiste in :other.',
    'integer'              => 'Il campo :attribute deve essere un numero intero.',
    'ip'                   => 'Il campo :attribute deve essere un indirizzo IP valido.',
    'ipv4'                 => 'Il campo :attribute deve essere un indirizzo IPv4 valido.',
    'ipv6'                 => 'Il campo :attribute deve essere un indirizzo IPv6 valido.',
    'json'                 => 'Il campo :attribute deve essere un JSON valido.',
    'max'                  => [
        'numeric' => 'Il campo :attribute non può essere maggiore di :max.',
        'file'    => 'Il campo :attribute non può essere maggiore di :max kilobytes.',
        'string'  => 'Il campo :attribute non può essere maggiore di :max caratteri.',
        'array'   => 'Il campo :attribute non può avere un numero di elementi maggiore di :max.',
    ],
    'mimes'                => 'Il campo :attribute deve essere un file di tipo: :values.',
    'mimetypes'            => 'Il campo :attribute deve essere un file di tipo: :values.',
    'min'                  => [
        'numeric' => 'Il campo :attribute deve essere almeno pari a :min.',
        'file'    => 'La dimensione del campo :attribute deve essere almeno pari a :min kilobytes.',
        'string'  => 'Il campo :attribute deve avere almeno :min caratteri.',
        'array'   => 'Il campo :attribute deve avere almeno :min elementi.',
    ],
    'not_in'               => 'Il campo selezionato :attribute non è valido.',
    'numeric'              => 'Il campo :attribute deve essere un numero.',
    'present'              => 'Il campo :attribute deve essere presente.',
    'regex'                => 'Il campo :attribute format non è valido.',
    'required'             => 'Il campo :attribute è obbligatorio.',
    'required_if'          => 'Il campo :attribute è obbligatorio se :other è pari a :value.',
    'required_unless'      => 'Il campo :attribute è obbligatorio a meno che :other è contenuto in :values.',
    'required_with'        => 'Il campo :attribute è obbligatorio quando :values è presente.',
    'required_with_all'    => 'Il campo :attribute è obbligatorio quando è presente.',
    'required_without'     => 'Il campo :attribute è obbligatorio quando :values non è presente.',
    'required_without_all' => 'Il campo :attribute è obbligatorio quando nessuno dei valori in :values è presente.',
    'same'                 => 'Il campo :attribute and :oIl campor must match.',
    'size'                 => [
        'numeric' => 'Il campo :attribute deve essere :size.',
        'file'    => 'La dimensione del campo :attribute deve essere di :size kilobytes.',
        'string'  => 'Il campo :attribute deve avere :size caratteri.',
        'array'   => 'Il campo :attribute deve contenere :size elementi.',
    ],
    'string'               => 'Il campo :attribute deve essere una stringa.',
    'timezone'             => 'Il campo :attribute deve essere una timezone valida.',
    'unique'               => 'Il campo :attribute è già in uso.',
    'uploaded'             => "Non è stato possibile l'upload del campo :attribute.",
    'url'                  => 'Il formato del campo :attribute non è valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Il campo
    | convention "attribute.rule" to name Il campo lines. This makes it quick to
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
    | Il campo following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
