<?php

namespace app\Repository;

use app\DBModel\Produk;

class ProdukRepository
{
    private \PDO $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function Insert(Produk $produk): Produk
    {
        $statement = $this->conn->prepare(
            "INSERT INTO produk(id_produk, nama_produk, harga, deskripsi_produk, id_kelompok) values(?, ?, ?, ?, ?)"
        );
        $statement->execute([
            $produk->id_produk,
            $produk->nama_produk,
            $produk->harga,
            $produk->deskripsi_produk,
            $produk->id_kelompok
        ]);
        return $produk;
    }

    public function SelectById(string $id): ?Produk
    {
        $statement = $this->conn->prepare(
            "SELECT id_produk, nama_produk, harga, deskripsi_produk, id_kelompok FROM produk WHERE id_produk = ?"
        );
        $statement->execute([$id]);
        try {
            if ($row = $statement->fetch()) {
                $produk = new Produk();
                $produk->id_produk = $row['id_produk'];
                $produk->nama_produk = $row['nama_produk'];
                $produk->harga = $row['harga'];
                $produk->deskripsi_produk = $row['deskripsi_produk'];
                $produk->id_kelompok = $row['id_kelompok'];
                return $produk;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function DeleteAll(): void
    {
        $this->conn->exec("DELETE FROM produk");
    }

    public function SelectAll(): ?array
    {
        return null;
    }

}