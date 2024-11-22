<?php
include("../controllers/Obat.php");
include("../lib/functions.php");
$obj = new ObatController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST["id"];
    $kode_obat = $_POST["kode_obat"];
    $nama_obat = $_POST["nama_obat"];
    $produsen = $_POST["produsen"];
    $bentuk = $_POST["bentuk"];
    $berat = $_POST["berat"];

    // Update the database record using your controller's method
    $dat = $obj->updateObat($id, $kode_obat, $nama_obat, $produsen, $bentuk, $berat);
    $msg = getJSON($dat);
}

$rows = $obj->getObat($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Obat</h1>
        <p class="text-gray-600 mb-4">Edit Data</p>

        <?php 
        if ($msg === true) { 
            echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Update Data Berhasil</div>';
            echo '<meta http-equiv="refresh" content="2;url=index.php">';
        } elseif ($msg === false) {
            echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Update Gagal</div>'; 
        }
        ?>

        <div class="flex items-center mb-4">
            <i class="fas fa-pills fa-4x mr-4"></i>
            <h2 class="text-xl font-semibold">Edit Data Obat</h2>
        </div>
        <hr class="mb-4"/>

        <form name="formEdit" method="POST" action="">
            <input type="hidden" name="submitted" value="1"/>
            <?php foreach ($rows as $row): ?>
                <div class="mb-4">
                    <label for="id" class="block text-sm font-medium text-gray-700">ID:</label>
                    <input type="text" id="id" name="id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['id']; ?>" readonly/>
                </div>
                <div class="mb-4">
                    <label for="kode_obat" class="block text-sm font-medium text-gray-700">Kode Obat:</label>
                    <input type="text" id="kode_obat" name="kode_obat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['kode_obat']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="nama_obat" class="block text-sm font-medium text-gray-700">Nama Obat:</label>
                    <input type="text" id="nama_obat" name="nama_obat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['nama_obat']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="produsen" class="block text-sm font-medium text-gray-700">Produsen:</label>
                    <input type="text" id="produsen" name="produsen" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['produsen']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="bentuk" class="block text-sm font-medium text-gray-700">Bentuk:</label>
                    <input type="text" id="bentuk" name="bentuk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['bentuk']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="berat" class="block text-sm font-medium text-gray-700">Berat:</label>
                    <input type="number" id="berat" name="berat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['berat']; ?>" required/>
                </div>
            <?php endforeach; ?>
            <div class="flex justify-between">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600" type="submit">Save</button>
                <a href="index.php" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>