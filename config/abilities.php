<?php

return [
    'admin' => ['*'],

    'user' => [
        'user:ler', 'user:editar', 'user:apagar',
        'livro:ler',
        'autor:ler',
        'resenha:ler', 'resenha:criar', 'resenha:editar', 'resenha:apagar',
    ],
];


?>