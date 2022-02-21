<?php

function DatabaseConfig(): array
{
    return [
        "database" => [
            "prod" => [
                "url" => "mysql:host=127.0.0.1:8079;dbname=inbiskom_test",
                "username" => "inbiskom",
                "password" => "inbiskom##89"
            ],
            "test" => [
                "url" => "mysql:host=127.0.0.1:8079;dbname=inbiskom_test",
                "username" => "inbiskom",
                "password" => "inbiskom##89"
            ]
        ]
    ];
}
