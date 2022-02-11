<?php

namespace app\Repository;

class OverviewRepository
{
    private \PDO $conn;

    /**
     * @param \PDO $conn
     */
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function SelectPendaftarPerTahun(): ?array
    {
        $statement = $this->conn->query(
            "SELECT angkatan, COUNT(*) AS jml_pendaftar
            FROM detail_kelompok dk, kelompok k
            WHERE dk.id_kelompok = k.id_kelompok
            GROUP BY YEAR(angkatan)"
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function SelectProdukPerKategori(): ?array
    {
        $statement = $this->conn->query(
            "SELECT nama_kategori, COUNT(*) AS jml_produk
                    FROM produk p, kategori ka, kelompok k
                    WHERE p.id_kelompok=k.id_kelompok AND k.id_kategori=ka.id_kategori
                    GROUP BY nama_kategori"
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function SelectPenjualPerTipe(): ?array
    {
        $statement = $this->conn->query(
            "SELECT tipe_kelompok, COUNT(*) as jml_penjual
                        FROM kelompok k, detail_kelompok dk
                        WHERE k.id_kelompok=dk.id_kelompok
                        GROUP BY tipe_kelompok"
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function SelectPenjualPerKategori(): ?array
    {
        $statement = $this->conn->query(
"SELECT tipe_kelompok, nama_kategori, COUNT(*) AS jml_produk
        FROM kelompok k, detail_kelompok dk, kategori ka
        WHERE k.id_kelompok=dk.id_kelompok AND k.id_kategori=ka.id_kategori
        GROUP BY tipe_kelompok, nama_kategori"
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }


}