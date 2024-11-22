<?php
include("../controllers/Mahasiswa.php");
include("../lib/functions.php");
$obj = new MahasiswaController();
$rows = $obj->getMahasiswaList();
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
        <p class="text-gray-600 mb-4">List All Data</p>
        <a style="margin:10px 0px;" class="bg-blue-500 text-white px-2 py-1 rounded mr-2" href="add.php"><i class="fas fa-plus"></i> Create New Data</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">id</th>
                        <th class="py-2 px-4 border-b">nim</th>
                        <th class="py-2 px-4 border-b">nama</th>
                        <th class="py-2 px-4 border-b">jk</th>
                        <th class="py-2 px-4 border-b">prodi</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row){ ?>
                    <tr class="bg-gray-100">
                        <td class="py-2 px-4 border-b"><?php echo $row['id']; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo $row['nim']; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo $row['nama']; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo $row['jk']; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo $row['prodi']; ?></td>
                        <td class="py-2 px-4 border-b">
                        <a class="bg-blue-500 text-white px-2 py-1 rounded mr-2" href="edit.php?id=<?php echo $row['id']; ?>"><i class="fas fa-pen"></i></a>
                        <a class="bg-red-500 text-white px-2 py-1 rounded" href="delete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>