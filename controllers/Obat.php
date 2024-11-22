<?php
include_once('../models/ObatModel.php');

class ObatController
{
    private $model;

    public function __construct()
    {
        $this->model = new ObatModel();
    }

    public function addObat($kode_obat, $nama_obat, $produsen, $bentuk, $berat)
    {
        return $this->model->addObat($kode_obat, $nama_obat, $produsen, $bentuk, $berat);
    }

    public function getObat($id)
    {
        return $this->model->getObat($id);
    }

    public function updateObat($id, $kode_obat, $nama_obat, $produsen, $bentuk, $berat)
    {
        return $this->model->updateObat($id, $kode_obat, $nama_obat, $produsen, $bentuk, $berat);
    }

    public function deleteObat($id)
    {
        return $this->model->deleteObat($id);
    }

    public function getObatList()
    {
        return $this->model->getObatList();
    }
}