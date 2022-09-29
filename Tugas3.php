<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <h3 align="center">DATA NILAI</h3>
  <?php
    //array scalar
    $m1 = ['nim'=>'2005102017','nama'=>'Sofia Arizka','nilai'=>'90'];
    $m2 = ['nim'=>'2004091901','nama'=>'Shofwan Abd Kadir Nst','nilai'=>'95'];
    $m3 = ['nim'=>'2005102027','nama'=>'Siti Dwi Fadhilla','nilai'=>'80'];
    $m4 = ['nim'=>'2005102001','nama'=>'Muhammad Sadam','nilai'=>'70'];
    $m5 = ['nim'=>'2005101829','nama'=>'Arif Kartyas','nilai'=>'85'];
    $m6 = ['nim'=>'2005101799','nama'=>'Miftah Khairiyyah','nilai'=>'85'];
    $m7 = ['nim'=>'2005101287','nama'=>'Khairunnisa Aprilza','nilai'=>'43'];
    $m8 = ['nim'=>'2005103471','nama'=>'Ricky Arnanda','nilai'=>'77'];
    $m9 = ['nim'=>'2005102547','nama'=>'Haiqal Fikri','nilai'=>'69'];
    $m10 = ['nim'=>'2005105503','nama'=>'Muhammad Haris','nilai'=>'50'];

    $ar_judul = ['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat'];

    //array asocitive
    $mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

    ?>
    <div class="container">
    <table class="table table-bordered table-dark">
    <thead>
        <tr>
        <?php
        foreach ($ar_judul as $judul) { ?>
        <th><?=$judul?></th>
        <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($mahasiswa as $mhs) {
            $nim=$mhs["nim"];
            $nama=$mhs["nama"];
            $nilai=$mhs["nilai"];
            
            $keterangan = ($nilai >= 60) ? "Lulus" : "Gagal";

            if ($nilai >= 90 && $nilai <= 100){
                $grade = "A";
            }
            elseif ($nilai >= 80 && $nilai < 90) {
                $grade = "B";
            }
            elseif ($nilai >= 70 && $nilai < 80) {
                $grade = "C";
            }
            elseif ($nilai >= 60 && $nilai < 70) {
                $grade = "D";
            }
            else{
                $grade = "E";
            }

            switch ($grade) {
                case 'A':
                    $predikat = "Memuaskan";
                    break;
                case 'B':
                    $predikat = "Baik";
                    break;
                case 'C':
                    $predikat = "Cukup";
                    break;
                case 'D':
                    $predikat = "Kurang";
                    break;
                case 'E':
                    $predikat = "Buruk";
                    break;
            }

            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $nim ?></td>
                <td><?= $nama ?></td>
                <td><?= $nilai ?></td>
                <td><?= $keterangan ?></td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php } ?> 
    </tbody>
    <tfoot>
        <?php
        $jlhMhs = count($mahasiswa);
        $kumpulanNilai = array_column($mahasiswa,"nilai");
        $totalNilai = array_sum($kumpulanNilai);
        $n_tertinggi= max($kumpulanNilai);
        $n_terendah= min($kumpulanNilai);
        $rata2= $totalNilai / $jlhMhs;

        $tfoot = [
            'nilai tertinggi'=> $n_tertinggi,
            'nilai terendah' => $n_terendah,
            'Rata-rata' => $rata2,
            'Jumlah Mahasiswa' => $jlhMhs,
        ];
        foreach ($tfoot as $key => $value) { ?>
            <tr>
                <th colspan="4"><?=$key?></th>
                <th colspan="3"><?=$value?></th>
            </tr>
        <?php
        }
        ?>
    </tfoot>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>