<?php
include_once('../models/DokterModel.php');

class DokterController
{
    private $model;

    public function __construct()
    {
        $this->model = new DokterModel();
    }

    public function addDokter($nip, $nama, $jk, $spesialis, $tempat_praktek)
    {
        return $this->model->addDokter($nip, $nama, $jk, $spesialis, $tempat_praktek);
    }

    public function getDokter($id)
    {
        return $this->model->getDokter($id);
    }

    public function updateDokter($id, $nip, $nama, $jk, $spesialis, $tempat_praktek)
    {
        return $this->model->updateDokter($id, $nip, $nama, $jk, $spesialis, $tempat_praktek);
    }

    public function deleteDokter($id)
    {
        return $this->model->deleteDokter($id);
    }

    public function getDokterList()
    {
        return $this->model->getDokterList();
    }
}