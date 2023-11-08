<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function allJoinElq(){
        $kampus ="Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::has('prodi')->get();
        return view('mahasiswa.index',['allmahasiswa'=>$mahasiswa, 'kampus' =>$kampus]);
    }
}
