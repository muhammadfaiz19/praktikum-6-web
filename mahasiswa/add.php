<?php
include("../controllers/Mahasiswa.php");
include("../lib/functions.php");
$obj = new MahasiswaController();
$msg = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $prodi = $_POST["prodi"];
    // Insert the database record using your controller's method
    $dat = $obj->addMahasiswa($nim, $nama, $jk, $prodi);
    $msg = getJSON($dat);
}
?>
<html>
<head>
    <title>Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Mahasiswa</h1>
        <p class="text-gray-600 mb-4">Entry Data</p>

        <?php 
        if ($msg === true) { 
            echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Insert Data Berhasil</div>';
            echo '<meta http-equiv="refresh" content="2;url='.base_url().'mahasiswa/">';
        } elseif ($msg === false) {
            echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Insert Gagal</div>'; 
        }
        ?>

        <div class="flex items-center mb-4">
            <i class="fas fa-user-graduate fa-4x mr-4"></i>
            <h2 class="text-xl font-semibold">Add New Data</h2>
        </div>
        <hr class="mb-4"/>

        <form name="formAdd" method="POST" action="">
            <div class="mb-4">
                <label for="nim" class="block text-sm font-medium text-gray-700">NIM:</label>
                <input type="text" id="nim" name="nim" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="jk" class="block text-sm font-medium text-gray-700">Jenis Kelamin:</label>
                <select id="jk" name="jk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    <option value="">--pilih--</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="prodi" class="block text-sm font-medium text-gray-700">Program Studi:</label>
                <select id="prodi" name="prodi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    <option value="">--pilih--</option>
                    <option value="INDUSTRI">INDUSTRI</option>
                    <option value="INFORMATIKA">INFORMATIKA</option>
                    <option value="PETERNAKAN">PETERNAKAN</option>
                </select>
            </div>
            <div class="flex justify-between">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600" type="submit">Save</button>
                <a href="#index" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </ div>
    </body>
</html>