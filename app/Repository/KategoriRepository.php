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
            "INSERT INTO kategori(nama_kategori, id_pengguna) values (?, ?)"
        );
        $statement->execute([
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

    public function SelectByNama(string $id): ?Kategori
    {
        $statement = $this->conn->prepare(
            "SELECT id_kategori, nama_kategori, id_pengguna FROM kategori WHERE nama_kategori= ?"
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

    public function DeleteById(string $id):void
    {
        $statement = $this->conn->prepare("DELETE FROM kategori WHERE id_kategori = ?");
        $statement->execute([$id]);
    }

    public function SelectAll(): ?array
    {
        $statement = $this->conn->query(
            "SELECT * FROM kategori");

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function Update(Kategori $kategori): Kategori
    {
        $statement = $this->conn->prepare("UPDATE kategori SET nama_kategori = ?, id_pengguna = ? WHERE id_kategori = ?");
        $statement->execute([
            $kategori->nama_kategori, $kategori->id_pengguna, $kategori->id_kategori
        ]);
        return $kategori;
    }

}