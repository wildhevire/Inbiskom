<?php

namespace app\DTO\Produk;

class ProdukRequest
{
    public ?string $id_produk;
    public ?string $nama_produk;
    public ?string $harga;
    public ?string $deskripsi_produk;
    public ?string $id_kelompok;
}