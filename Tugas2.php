<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 1 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <div class="container px-5 my-5">
    <form method="POST">
        <div class="form-floating mb-3">
            <input class="form-control" name="namapegawai" id="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
            <label for="namaPegawai">Nama Pegawai</label>
            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="agama" id="agama" aria-label="Agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            <label for="agama">Agama</label>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="manager" id="manager" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="asisten" id="asisten" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="asisten">Asisten</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="kabag" id="kabag" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="staff" id="staff" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="menikah" id="menikah" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="belumMenikah" id="BelumMenikah" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="jumlahAnak" id="jumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
            <label for="jumlahAnak">Jumlah Anak</label>
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" name="submint" type="submit">Submit</button>
        </div>
    </form>
</div>

    <?php
    if (isset($_POST["submint"])) {
        $namapegawai=$_POST["namapegawai"];
        $agama=$_POST["agama"];
        $jabatan=$_POST["jabatan"];
        $status=$_POST["status"];
        $jumlahAnak=$_POST["jumlahAnak"];

    switch ($jabatan) {
        case 'manager': $gapok=20000000;break;
        case 'asisten': $gapok=15000000;break;
        case 'kabag': $gapok=10000000;break;
        case 'staff': $gapok=4000000;break;
    }
    $tunjab = 0.2 * $gapok;
    if ($status == "menikah" && $jumlahAnak <=2 ) {
        $tunkel = 0.05 * $gapok;
    }
    elseif ($status == "menikah" && $jumlahAnak <=5) {
        $tunkel = 0.1 * $gapok;
    }
    elseif ($status == "menikah" && $jumlahAnak >5){
        $tunkel = 0.15 * $gapok;
    }
    else{
        $tunkel=0;
    }
    $gator = $gapok + $tunjab + $tunkel;
    $zakprof = ($agama == "Islam" && $gator >= 6000000) ? 0.025 * $gator : 0;
    $thp = $gator - $zakprof;
    ?>
    <!-- Modal -->
    <div class="modal fade" id="mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Nama Pegawai: <?=$namapegawai?></p>
            <p>Agama: <?=$agama?></p>
            <p>Jabatan: <?=$jabatan?></p>
            <p>Status: <?=$status?></p>
            <p>jumlah Anak: <?=$jumlahAnak?></p>
            <p>Gaji Pokok: Rp.<?= number_format ($gapok, 2, ',', '.');?></p>
            <p>Gaji Kotor: Rp.<?= number_format ($gator, 2, ',', '.');?></p>
            <p>Tunjangan Jabatan: Rp.<?= number_format ($tunjab, 2, ',', '.');?></p>
            <p>Tunjangan Keluarga: Rp.<?= number_format ($tunkel, 2, ',', '.');?></p>
            <p>Zakat : Rp.<?= number_format ($zakprof, 2, ',', '.');?></p>
            <p>Take Home Pay : Rp.<?= number_format ($thp, 2, ',', '.');?></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <?php
    }
    
    ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> 
    <script>
        const modal = new bootstrap.Modal("#mymodal")
        modal.show()
    </script>
    </body>
</html>