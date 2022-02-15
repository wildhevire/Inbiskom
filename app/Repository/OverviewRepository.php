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

    public function SelectPendaftarPerTahun($angkatan): ?array
    {
        $statement = $this->conn->prepare(
            "SELECT angkatan, COUNT(*) AS jml_pendaftar
            FROM detail_kelompok dk, kelompok k
            WHERE dk.id_kelompok = k.id_kelompok and k.angkatan=:angkatan
            GROUP BY YEAR(angkatan)"
        );

        $statement->bindParam("angkatan", $angkatan);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function SelectProdukPerKategori($angkatan): ?array
    {
        $statement = $this->conn->prepare(
            "SELECT nama_kategori, COUNT(*) AS jml_produk
                    FROM produk p, kategori ka, kelompok k
                    WHERE p.id_kelompok=k.id_kelompok AND k.id_kategori=ka.id_kategori AND k.angkatan=:angkatan
                    GROUP BY nama_kategori"
        );
        
        $statement->bindParam("angkatan", $angkatan);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function SelectPenjualPerTipe($angkatan): ?array
    {
        $statement = $this->conn->prepare(
            "SELECT tipe_kelompok, COUNT(*) as jml_penjual
                        FROM kelompok k, detail_kelompok dk
                        WHERE k.id_kelompok=dk.id_kelompok and k.angkatan=:angkatan
                        GROUP BY tipe_kelompok"
        );

        $statement->bindParam("angkatan", $angkatan);
        $statement->execute();
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
    public function SelectTotalProduk(): ?array
    {
        $statement = $this->conn->query(
            "SELECT COUNT(id_produk) AS total_produk FROM produk "
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
    public function SelectTotalKelompok(): ?array
    {
        $statement = $this->conn->query(
            "SELECT COUNT(id_kelompok) AS total_kelompok FROM kelompok "
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
    public function SelectTotalPenjual(): ?array
    {
        $statement = $this->conn->query(
            "SELECT COUNT(id_detail_kelompok) AS total_penjual FROM detail_kelompok "
        );

        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

}