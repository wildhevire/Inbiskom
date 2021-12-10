<?php

namespace app\Repository;

use app\DBModel\Foto;

class FotoRepository
{
    private \PDO $conn;

    /**
     * @param \PDO $conn
     */
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function Insert(Foto $foto): Foto
    {
        $statement = $this->conn->prepare(
            "INSERT INTO foto(id_foto, url, is_primary, id_produk) values (?, ?, ?, ?)"
        );

        $statement->execute([
            $foto->id_foto,
            $foto->url,
            $foto->is_primary,
            $foto->id_produk
        ]);

        return $foto;
    }

    public function SelectById(string $id): ?Foto
    {
        $statement = $this->conn->prepare(
            "SELECT id_foto, url, is_primary, id_produk FROM foto WHERE id_foto= ?"
        );
        $statement->execute([$id]);
        try {
            if ($row = $statement->fetch()) {
                $foto = new Foto();
                $foto->id_foto = $row['id_foto'];
                $foto->url = $row['url'];
                $foto->is_primary = $row['is_primary'];
                $foto->id_produk = $row['id_produk'];
                return $foto;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function DeleteAll(): void
    {
        $this->conn->exec("DELETE FROM foto");
    }

    public function SelectAll(): ?array
    {
        return null;
    }

}