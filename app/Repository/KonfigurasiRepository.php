<?php

namespace app\Repository;

use app\DBModel\Konfigurasi;

class KonfigurasiRepository
{
    private \PDO $conn;

    /**
     * @param \PDO $conn
     */
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function Insert(Konfigurasi $konfigurasi): Konfigurasi
    {
        $statement = $this->conn->prepare(
            "INSERT INTO 
    konfigurasi(nip, nama_ketua, url_logo, 
                alamat_inbiskom, no_hp, no_wa, email, 
                username_ig, id_pengguna) 
values (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $statement->execute([

            $konfigurasi->nip,
            $konfigurasi->nama_ketua,
            $konfigurasi->url_logo,
            $konfigurasi->alamat_inibiskom,
            $konfigurasi->no_hp,
            $konfigurasi->no_wa,
            $konfigurasi->email,
            $konfigurasi->username_ig,
            $konfigurasi->id_pengguna
        ]);

        return $konfigurasi;
    }

    public function SelectById(string $id): ?Konfigurasi
    {
        $statement = $this->conn->prepare(
            "SELECT id_konfigursi, nip, nama_ketua, url_logo, alamat_inbiskom, no_hp, no_wa, email, username_ig, id_pengguna FROM konfigurasi WHERE id_konfigurasi= ?"
        );
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $konfigurasi = new Konfigurasi();
                $konfigurasi->id_konfigurasi = $row['id_konfigurasi'];
                $konfigurasi->nip = $row['nip'];
                $konfigurasi->nama_ketua = $row['nama_ketua'];
                $konfigurasi->url_logo = $row['url_logo'];
                $konfigurasi->alamat_inibiskom = $row['alamat_inbiskom'];
                $konfigurasi->no_hp = $row['no_hp'];
                $konfigurasi->no_wa = $row['no_wa'];
                $konfigurasi->email = $row['email'];
                $konfigurasi->username_ig = $row['username_ig'];
                $konfigurasi->id_pengguna = $row['id_pengguna'];
                return $konfigurasi;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function DeleteAll(): void
    {
        $this->conn->exec("DELETE FROM konfigurasi");
    }

    public function SelectAll(): ?array
    {
        return null;
    }

    public function SelectLast()
    {
        $statement = $this->conn->prepare(
            "SELECT * FROM konfigurasi  ORDER BY id_konfigurasi DESC LIMIT 1"
        );

        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
}