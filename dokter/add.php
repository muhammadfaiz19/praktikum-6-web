<?php
include("../controllers/Dokter.php");
include("../lib/functions.php");
$obj = new DokterController();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the insert here
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $spesialis = $_POST["spesialis"];
    $tempat_praktek = $_POST["tempat_praktek"];
    
    // Insert the database record using your controller's method
    $dat = $obj->addDokter($nip, $nama, $jk, $spesialis, $tempat_praktek);
    $msg = getJSON($dat);
}
?>
<html>
<head>
    <title>Dokter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Dokter</h1>
        <p class="text-gray-600 mb-4">Entry Data</p>

        <?php 
        if ($msg === true) { 
            echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Insert Data Berhasil</div>';
            echo '<meta http-equiv="refresh" content="2;url='.base_url().'dokter/">';
        } elseif ($msg === false) {
            echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Insert Gagal</div>'; 
        }
        ?>

        <div class="flex items-center mb-4">
            <i class="fas fa-user-md fa-4x mr-4"></i>
            <h2 class="text-xl font-semibold">Add New Data</h2>
        </div>
        <hr class="mb-4"/>

        <form name="formAdd" method="POST" action="">
            <div class="mb-4">
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP:</label>
                <input type="text" id="nip" name="nip" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
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
                <label for="spesialis" class="block text-sm font-medium text-gray-700">Spesialis:</label>
                <input type="text" id="spesialis" name="spesialis" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="tempat_praktek" class="block text-sm font-medium text-gray-700">Tempat Praktek:</label>
                <input type="text" id="tempat_praktek" name="tempat_praktek" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="flex justify-between">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600" type=" submit">Save</button>
                <a href="#index" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>