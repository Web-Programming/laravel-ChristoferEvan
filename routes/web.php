<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/  

Route::get('/', function () {
    return view('welcome');
});

//buat route ke halaman profil
Route::get("/profil",function(){
    return view("profil");
});

Route::get('/mahasiswa', function(){
     echo "Mahasiswa";
});
// route dengan parameter
// Route::get("/mahasiswa/{nama}",function($nama = "Nur"){
//     echo "<h1>halo nama saya $nama </h1>";
// });

//route dengan parameter
// Route::get("/mahasiswa2/{nama?}",function($nama = "Nur"){
//     echo "<h1>halo nama saya $nama </h1>";
// });

// route dengan parameter >1
// Route::get("/profil/{nama?}/{pekerjaan?}",function($nama = "Nur", $pekerjaan="Mahasiswa"){
//     echo "<h1>halo nama saya $nama. Saya adalah $pekerjaan </h1>";
// });

//redirect
Route::get("/hubungi",function(){
    echo "<h1>hubungi kami</h1>";
})->name("call"); //named route

Route::redirect("/contact","/hubungi");

Route::get("/halo",function(){
    echo " <a href='".route('call')."'>". route('call')."</a> ";
});

Route::prefix("/dosen")->group(function(){
    route::get("/jadwal",function(){
        echo" <h1>Jadwal Dosen</h1> ";
    });
    route::get("/materi",function(){
        echo " <h1> Materi Perkuliahan</h1> ";
    });
    //dan lain lain
});

Route::get('/dosen/index',function(){
    return view('dosen.index');
});



Route::get('/fakultas',function(){
    // return view('fakultas.index',["ilkom"=>"Fakultas Ilmu Komputer dan Rekayasa"]);
    // return view('fakultas.index',["fakultas"=>["Fakultas Ilmu Komputer dan Rekayasa"
    // ,"Fakultas Ilm"u Ekonomi"]]);
//    return view('fakultas.index')->with("fakultas",["Fakultas Ilmu Komputer dan Rekayasa"
//    ,"Fakultas Ilmu Komputer"]); 
// $fakultas=["Fakultas Ilmu Komputer dan Rekayasa","Fakultas Ilmu Ekonomi"];
// return view('fakultas.index',compact('fakultas'));

// $fakultas=["Fakultas Ilmu Komputer Dan Rekayasa","Fakultas Ilmu Ekonomi"];
// return view('fakultas.index',compact('fakultas'));

// $fakultas=[];
// return view('fakultas.index',compact('fakultas'));
});
// $kampus="Universitas Multi Data Palembang";
// // $fakultas=[];
// $fakultas=["Fakultas Ilmu Komputer dan Rekayasa","Fakultas Ilmu Ekonomi"];
// return view('fakultas.index',compact('fakultas','kampus'));

Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacade']);

Route::get('/prodi/all-join-elq',[ProdiController::class,'allJoinElq']);

Route::get('/mahasiswa/all-join-elq', [MahasiswaController::class, 'allJoinElq']);

Route::get('/prodi/create',[ProdiController::class,'create']);

Route::post('prodi/store',[ProdiController::class,'store']);

//read
Route::get('/prodi',[ProdiController::class,'index'])->name('prodi.index');

Route::get('/prodi/{id}',[ProdiController::class,'show'])->name('prodi.show');

Route::get('/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');

Route::patch('/prodi/{prodi}', [ProdiController::class,'update'])->name('prodi.update');

// Route::get('/prodi/create', 'ProdiController@create')->name('prodi.create');

Route::delete('/prodi/{prodi}',[ProdiController::class,'destroy'])->name('prodi.destroy');

