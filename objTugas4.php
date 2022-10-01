<?php
require 'Tugas4.php';
//object instance data pegawai
$p1 = new Pegawai('001','Safira Marwah','Staff','Islam','Menikah');
$p2 = new Pegawai('002','Wisnu Adamsyah','Asisten Manager','Konghucu','Belum Menikah');
$p3 = new Pegawai('003','Fiqri Haqial','Manager','Kristen','Menikah');
$p4 = new Pegawai('004','Sofia Arizka','Kabag','Islam','Belum Menikah');
$p5 = new Pegawai('005','Wina Dewi','Asisten Manager','Budha','Menikah');
$p6 = new Pegawai('006','Kirana ali','Staff','Hindu','Menikah');

//array associative
$d_pegawai = [$p1,$p2,$p3,$p4,$p5,$p6];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 4 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center"><?= Pegawai::perusahaan?></h1>
   <table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nip</th>
            <th>Nama Pegawai</th>
            <th>Agama</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Nomor</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan Jabatan</th>
            <th>Zakat Profesi</th>
            <th>Gaji Kotor</th>
            <th>Gaji Bersih</th>
        </tr>  
    </thead>
    <tbody>
            <?php
            foreach ($d_pegawai as $pgw) {
                $pgw->cetak();
            }
            ?>
    </tbody>
    <tfoot>

        <tr>
            <th>Jumlah Pegawai: <?=Pegawai::$no-1?></th>
        </tr>
    </tfoot>
   </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>