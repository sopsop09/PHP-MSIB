<?php
class Pegawai{
    //variabel
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;

    //const & static
    const perusahaan = 'PT. SSS';
    static $no = 1;

    //constructor
    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
    }

    //inisialisasi
    public function setGapok(){
        switch ($this->jabatan) {
            case 'Manager':
                $gapok = 15000000;
                break;
            case 'Asisten Manager':
                $gapok = 10000000;
                break;
            case 'Kabag':
                $gapok = 7000000;
                break;
            case 'Staff':
                $gapok = 4000000;
                break;
            default: $gapok = 0;
                break;
        }
        return $gapok;
    }

    public function setTunjab (){
        $tunjab = $this->setGapok() * 0.2;
        return $tunjab;
    }

    public function setTunkel(){
        $tunkel = ($this->status == 'Menikah') ? $this->setGapok() * 0.1 : 0;
        return $tunkel;
    }

    public function setZakprof(){
        $zakprof = ($this->agama == 'Islam' && $this->setGator() >= 6000000) ? $this->setGator() * 0.025 : 0;
        return $zakprof;
    }

    public function setGator(){
        $gator = $this->setGapok() + $this->setTunjab() + $this->setTunkel();
        return $gator;
    }

    public function setTakeHomePay(){
        $thp = $this->setGator() - $this->setZakprof();
        return $thp;
    }

    public function setGaber(){
        $gaber = $this->setGator() - $this->setZakprof();
        return $gaber;
    }

    public function cetak(){
        echo "
        <tr>
                <td>".self::$no++."</td>
                <td>".$this->nip."</td>
                <td>".$this->nama."</td>
                <td>".$this->agama."</td>
                <td>".$this->jabatan."</td>
                <td>".$this->status."</td>
                <td>".$this->setGapok()."</td>
                <td>".$this->setTunjab()."</td>
                <td>".$this->setTunkel()."</td>
                <td>".$this->setZakprof()."</td>
                <td>".$this->setGator()."</td>
                <td>".$this->setGaber()."</td>
            </tr>
        ";
    }
}
