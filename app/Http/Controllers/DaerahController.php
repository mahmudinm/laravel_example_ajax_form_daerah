<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daerah;

class DaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daerahs = Daerah::where('lokasi_kabupatenkota', 0)
                            ->where('lokasi_kecamatan', 0)
                            ->where('lokasi_kelurahan', 0)
                            ->orderBy('lokasi_nama')
                            ->get();    
        return view('daerah.index', compact('daerahs'));
    }

    public function kabupatenkota($provinsi){
        $kabupatenkota = Daerah::select('lokasi_kabupatenkota', 'lokasi_nama')
                            ->where('lokasi_propinsi', $provinsi)
                            ->where('lokasi_kabupatenkota', '!=', 0)
                            ->where('lokasi_kecamatan', 0)
                            ->where('lokasi_kelurahan', 0)
                            ->get();    

        echo "<option value='' id='0/0'>Pilih Kabupaten/Kota</option>";
        foreach ($kabupatenkota as $data) {  
            echo "<option value='$data->lokasi_nama' id='$provinsi/$data->lokasi_kabupatenkota'>$data->lokasi_nama</option>";
        }  
    }

    public function kecamatan($provinsi, $kabupatenkota){

        $kecamatan = Daerah::select('lokasi_kecamatan', 'lokasi_nama')
                            ->where('lokasi_propinsi', $provinsi)
                            ->where('lokasi_kabupatenkota', $kabupatenkota)
                            ->where('lokasi_kecamatan', '!=', 0)
                            ->where('lokasi_kelurahan', 0)
                            ->get();    

        echo "<option value='' id='0/0/0'>Pilih Kecamatan</option>";
        foreach ($kecamatan as $data) {  
            echo "<option value='$data->lokasi_nama' id='$provinsi/$kabupatenkota/$data->lokasi_kecamatan'>$data->lokasi_nama</option>";
        }   
    }

    public function kelurahan($provinsi, $kabupatenkota, $kecamatan){

        $kelurahan = Daerah::select('lokasi_kecamatan', 'lokasi_nama')
                            ->where('lokasi_propinsi', $provinsi)
                            ->where('lokasi_kabupatenkota', $kabupatenkota)
                            ->where('lokasi_kecamatan',  $kecamatan)
                            ->where('lokasi_kelurahan', '!=', 0)
                            ->get();    

        echo "<option value=''>Pilih Kelurahan</option>";
        foreach ($kelurahan as $data) {  
            echo "<option value='$data->lokasi_nama'>$data->lokasi_nama</option>";
        }   
    }


}
