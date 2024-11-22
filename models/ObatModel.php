<?php

include_once('../db/database.php');

class ObatModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addObat($kode_obat, $nama_obat, $produsen, $bentuk, $berat)
    {
        $sql = "INSERT INTO obat (kode_obat, nama_obat, produsen, bentuk, berat) VALUES (:kode_obat, :nama_obat, :produsen, :bentuk, :berat)";
        $params = array(
            ":kode_obat" => $kode_obat,
            ":nama_obat" => $nama_obat,
            ":produsen" => $produsen,
            ":bentuk" => $bentuk,
            ":berat" => $berat
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode(array("success" => $result, "message" => $result ? "Insert successful" : "Insert failed"));
    }

    public function getObat($id)
    {
        $sql = "SELECT * FROM obat WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateObat($id, $kode_obat, $nama_obat, $produsen, $bentuk, $berat)
    {
        $sql = "UPDATE obat SET kode_obat = :kode_obat , nama_obat = :nama_obat, produsen = :produsen, bentuk = :bentuk, berat = :berat WHERE id = :id";
        $params = array(
            ":kode_obat" => $kode_obat,
            ":nama_obat" => $nama_obat,
            ":produsen" => $produsen,
            ":bentuk" => $bentuk,
            ":berat" => $berat,
            ":id" => $id
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode(array("success" => $result, "message" => $result ? "Update successful" : "Update failed"));
    }

    public function deleteObat($id)
    {
        $sql = "DELETE FROM obat WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        return json_encode(array("success" => $result, "message" => $result ? "Delete successful" : "Delete failed"));
    }

    public function getObatList()
    {
        $sql = 'SELECT * FROM obat LIMIT 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}