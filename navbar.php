<!-- navbar -->
<!DOCTYPE html>
<html>

<head>
    <title>Parkir</title>
    <link href="<?=BASE_URL.'vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?=BASE_URL.'css/style.css'?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" target="_blank" href="masuk.php">Parkir</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=BASE_URL.'masuk.php'?>">Kendaraan Masuk</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=BASE_URL.'keluar.php'?>">Kendaraan Keluar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=BASE_URL.'laporan.php'?>">Laporan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?=BASE_URL.'out.php'?>">Keluar</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>