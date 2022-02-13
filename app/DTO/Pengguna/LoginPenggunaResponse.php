<?php

namespace app\DTO\Pengguna;

class LoginPenggunaResponse
{
    public ?string $id_pengguna = null;
    public ?string $username = null;
    public ?string $hak_akses = null;
    public ?string $status = null;
}