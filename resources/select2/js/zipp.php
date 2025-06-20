<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['zip_file'])) {
    $allowedExtensions = array("zip");
    $uploadExtension = strtolower(pathinfo($_FILES['zip_file']['name'], PATHINFO_EXTENSION));

    if (!in_array($uploadExtension, $allowedExtensions)) {
        $errorMessage = "File yang diunggah harus memiliki ekstensi .zip.";
    } else {
        $zipFilePath = $_FILES['zip_file']['tmp_name'];
        $extractTo = rtrim($_POST['extract_to'], '/'); // Mengambil direktori tujuan dari input form dan menghapus trailing slash

        function extractZipFile($zipFilePath, $extractTo) {
            // Periksa apakah file ZIP ada
            if (!file_exists($zipFilePath)) {
                return "File ZIP tidak ditemukan.";
            }

            // Periksa apakah direktori tujuan ada
            if (!is_dir($extractTo)) {
                return "Direktori tujuan tidak ditemukan.";
            }

            // Buat instance dari ZipArchive
            $zip = new ZipArchive();

            // Buka file ZIP
            if ($zip->open($zipFilePath) === TRUE) {
                // Ekstrak file ke direktori tujuan
                $zip->extractTo($extractTo);
                $zip->close();
                return "File ZIP berhasil diekstrak ke $extractTo.";
            } else {
                return "Tidak dapat membuka file ZIP.";
            }
        }

        $successMessage = extractZipFile($zipFilePath, $extractTo);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload dan Ekstrak File ZIP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
            max-width: 400px;
            width: 100%;
            margin: 50px auto;
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }
        label {
            margin-bottom: 5px;
            color: #333333;
        }
        input[type="file"],
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        input[type="submit"] {
            background-color: #333333;
            color: #ffffff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 15px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1;
        }
        input[type="submit"]:hover {
            background-color: #555555;
        }
        input[type="submit"]::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.5s ease;
            z-index: 0;
            transform: translate(-50%, -50%);
        }
        input[type="submit"]:hover::before {
            width: 0;
            height: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .success-message,
        .error-message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            animation: slideIn 0.5s forwards;
        }
        .success-message {
            background-color: #228B22;
            color: #fff;
        }
        .error-message {
            background-color: #FF0000;
            color: #fff;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Unggah File ZIP untuk Diekstrak</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="zip_file">Pilih file ZIP:</label>
                <input type="file" name="zip_file" id="zip_file" accept=".zip" required>
            </div>
            <div class="form-group">
                <label for="extract_to">Direktori Tujuan:</label>
                <input type="text" name="extract_to" id="extract_to" class="form-control" value="<?php echo __DIR__; ?>" required>
            </div>
            <input type="submit" value="Unggah dan Ekstrak" class="btn btn-primary">
        </form>
        <?php if (isset($successMessage)): ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <?php if (isset($errorMessage)): ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>