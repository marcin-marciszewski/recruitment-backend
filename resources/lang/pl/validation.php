<?php
return [
    'required' => 'To pole jest wymagane.',
    'email' => 'Adres email powinien mieć opdowieni format',
    'custom' => [
        'title' => [
            'unique' => 'Ten tytuł jest już w bazie danych.'
        ],
        'email' => [
            'unique' => 'Ten tytuł jest zajęty.'
        ],
        'name' => [
            'min' => 'To pole musi mieć przynajmniej 3 znaki.',
        ],
        'password' => [
            'confirmed' => 'Hasła muszą być takie same.',
            'min' => 'To pole musi mieć przynajmniej 6 znaków.',
        ],
    ],
];
