<?php

include_once('../db/database.php');

class MahasiswaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addMahasiswa($nim,$nama,$jk,$prodi)
    {
        $sql = "INSERT INTO mahasiswa (nim, nama, jk, prodi) VALUES (:nim,:nama,:jk,:prodi)";
        $params = array(
          ":nim" => $nim,
          ":nama" => $nama,
          ":jk" => $jk,
          ":prodi" => $prodi);

        $result= $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getMahasiswa($id)
    {
        $sql = "SELECT * FROM mahasiswa WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateMahasiswa($id,$nim,$nama,$jk,$prodi)
    {
        $sql = "UPDATE mahasiswa SET nim = :nim, nama = :nama, jk = :jk, prodi = :prodi WHERE id = :id";
        $params = array(
          ":nim" => $nim,
          ":nama" => $nama,
          ":jk" => $jk,
          ":prodi" => $prodi,
          ":id" => $id
        );
    
        // Execute the query
        $result = $this->db->executeQuery($sql, $params);
    
        // Check if the update was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }
    

    public function deleteMahasiswa($id)
    {
        $sql = "DELETE FROM mahasiswa WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        // Check if the delete was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }

    public function getMahasiswaList()
    {
        $sql = 'SELECT * FROM mahasiswa limit 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM mahasiswa';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

