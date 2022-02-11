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
            "INSERT INTO produk(nama_produk, harga, deskripsi_produk, id_kelompok) values(?, ?, ?, ?)"
        );
        $statement->execute([
            $produk->nama_produk,
            $produk->harga,
            $produk->deskripsi_produk,
            $produk->id_kelompok
        ]);
        $lastId = $this->conn->lastInsertId();
        $produk->id_produk = $lastId;
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
        $statement = $this->conn->query(
            "SELECT id_produk, k.id_kelompok, nama_produk, deskripsi_produk, harga, nama_kategori, nama_kelompok
            FROM produk p, kategori ka, kelompok k
            WHERE p.id_kelompok=k.id_kelompok AND k.id_kategori=ka.id_kategori"
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function DeleteById(string $id): void
    {
        $statement = $this->conn->prepare("DELETE FROM produk WHERE id_produk = ?");
        $statement->execute([$id]);
    }

    public function Update(Produk $produk): Produk
    {
        $statement = $this->conn->prepare("
                UPDATE produk SET nama_produk = ?, harga = ?, 
                                deskripsi_produk = ?, id_kelompok = ?
                WHERE id_produk = ?
            ");
        $statement->execute([
            $produk->nama_produk,
            $produk->harga,
            $produk->deskripsi_produk,
            $produk->id_kelompok,
            $produk->id_produk
        ]);
        return $produk;
    }

    public function UpdateViewsCount(string $id_produk)
    {
        $statement = $this->conn->prepare("UPDATE produk
        SET view_count = IFNULL(view_count, 0) + 1 WHERE id_produk = ?");
        $statement->execute([$id_produk]);
    }
}
