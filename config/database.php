<?php

function DatabaseConfig(): array
{
    return [
        "database" => [
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=inbiskom_test",
                "username" => "root",
                "password" => ""
            ],
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=inbiskom_test",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}
