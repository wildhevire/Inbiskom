<?php

namespace app\Repository;

use app\DBModel\Foto;
use mysql_xdevapi\Result;

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
            "INSERT INTO foto(url, is_primary, id_produk) values ( ?, ?, ?)"
        );

        $statement->execute([
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
        $statement = $this->conn->query(
            "SELECT id_foto, url, is_primary, id_produk
                    FROM foto");

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function DeleteById(strint $id): void
    {
        $statement = $this->conn->prepare("DELETE FROM foto WHERE id_foto = ?");
        $statement->execute([$id]);
    }

    public function Update(Foto $foto) :Foto
    {
        $statement = $this->connection->prepare("
                UPDATE foto SET url = ?, is_primary = ?, id_produk = ?
                WHERE id_foto = ?,
            ");
        $statement->execute([
           $foto->url, $foto->is_primary, $foto->id_produk, $foto->id_foto
        ]);
        return $foto;
    }

    public function SelectByIdProduk($id_produk)
    {
        $statement = $this->conn->prepare(
            "SELECT url, is_primary
                        FROM foto f, produk p
                        WHERE f.id_produk=p.id_produk AND p.id_produk=?"
        );
        $statement->execute([$id_produk]);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}