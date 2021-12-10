<?php

namespace app\Repository;

use app\DBModel\Kategori;

class KategoriRepository
{
    private \PDO $conn;

    /**
     * @param \PDO $conn
     */
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function Insert(Kategori $kategori): Kategori
    {
        $statement = $this->conn->prepare(
            "INSERT INTO kategori(id_kategori, nama_kategori, id_pengguna) values (?, ?, ?)"
        );
        $statement->execute([
            $kategori->id_kategori,
            $kategori->nama_kategori,
            $kategori->id_pengguna
        ]);

        return $kategori;
    }

    public function SelectById(string $id): ?Kategori
    {
        $statement = $this->conn->prepare(
            "SELECT id_kategori, nama_kategori, id_pengguna FROM kategori WHERE id_kategori= ?"
        );
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $kategori = new Kategori();
                $kategori->id_kategori = $row['id_kategori'];
                $kategori->nama_kategori = $row['nama_kategori'];
                $kategori->id_pengguna = $row['id_pengguna'];
                return $kategori;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function DeleteAll(): void
    {
        $this->conn->exec("DELETE FROM kategori");
    }

    public function SelectAll(): ?array
    {
        return null;
    }

}