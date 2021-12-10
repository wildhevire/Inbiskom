<?php

namespace app\Repository;

use app\DBModel\DetailKelompok;

class DetailKelompokRepository
{
    private \PDO $conn;

    /**
     * @param \PDO $conn
     */
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function Insert(DetailKelompok $detailKelompok): DetailKelompok
    {
        $statement = $this->conn->prepare(
            "INSERT INTO detail_kelompok(id_detail_kelompok, no_identitas, nama_penjual, id_kelompok) VALUES(?, ?, ?, ?)"
        );

        $statement->execute([
            $detailKelompok->id_detail_kelompok,
            $detailKelompok->no_identitas,
            $detailKelompok->nama_penjual,
            $detailKelompok->id_kelompok
        ]);

        return $detailKelompok;
    }

    public function SelectById(string $id): ?DetailKelompok
    {
        $statement = $this->conn->prepare(
            "SELECT id_detail_kelompok, no_identitas, nama_penjual, id_kelompok FROM detail_kelompok WHERE id_detail_kelompok= ?"
        );
        $statement->execute([$id]);
        try {
            if ($row = $statement->fetch()) {
                $detailKelompok = new DetailKelompok();
                $detailKelompok->id_detail_kelompok = $row['id_detail_kelompok'];
                $detailKelompok->no_identitas = $row['no_identitas'];
                $detailKelompok->nama_penjual = $row['nama_penjual'];
                $detailKelompok->id_kelompok = $row['id_kelompok'];
                return $detailKelompok;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function DeleteAll(): void
    {
        $this->conn->exec("DELETE FROM detail_kelompok");
    }

    public function SelectAll(): ?array
    {
        return null;
    }

}