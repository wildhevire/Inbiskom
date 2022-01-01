<?php

namespace app\DTO\Pengguna;

class AddPenggunaRequest
{
    public ?string $id_pengguna = null;
    public ?string $nama_pengguna = null;
    public ?string $username = null;
    public ?string $password = null;
    public ?string $hak_akses = null;
    public ?string $status = null;
    public ?string $tahun_aktif = null;
}