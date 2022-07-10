<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php include_once ('../../navbar.php'); ?>
    <div id="pebungkus">
    <div class="card">
        <h4 class="card-header">Pembayaran Parkir</h4>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Waktu Keluar</th>
                    <th>Total Waktu</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td><?= $waktu_keluar ?></td>
                    <td><?= $rumus.' Jam' ?></td>
                    <td><?= 'Rp. '.$harga ?></td>
                </tr>
            </table>
        <center><a href="<?=BASE_URL.'laporan.php'?>" class="btn btn-primary">Detail</a></center>
        </div>
    </div>
    </div>
</body>
</html>