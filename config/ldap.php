<?php

return [
    'logging' => env('LDAP_LOGGING', true),
    'connections' => [
        'ldap_ooredoo' => [
            'hosts' => [env('LDAP_HOST', 'ldap.forumsys.com')],
            'username' => env('LDAP_USERNAME', 'cn=read-only-admin,dc=example,dc=com'),
            'password' => env('LDAP_PASSWORD', 'password'),
            'port' => env('LDAP_PORT', 389),
            'base_dn' => env('LDAP_BASE_DN', 'dc=example,dc=com'),
            'timeout' => env('LDAP_TIMEOUT', 5),
            'use_ssl' => env('LDAP_SSL', false),
            'use_tls' => env('LDAP_TLS', false),
            'version' => 3,
        ],
    ],
];