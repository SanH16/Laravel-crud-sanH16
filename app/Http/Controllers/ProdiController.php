<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    //
    public function index()
    {
        $prodis = Prodi::all();
        return view("prodi.index")->with('prodis', $prodis);
    }

    public function show(Prodi $prodi)
    {
        return view("prodi.show", ['prodi' => $prodi]);
    }

    public function create()
    {
        return view("prodi.create");
    }

    public function store(Request $request)
    {
        // dump($reqeuest);
        // echo $reqeust->nama;

        $validateData = $request->validate(
            ['nama' => 'required|min:5|max:20']
        );
        // dump($validateData);
        // echo $validateData['nama'];
        
        //command u/ membuat model dan migration Prodi
        //php artisan make:model Prodi --migration

        $prodi = new Prodi(); //buat object Prodi
        $prodi->nama = $validateData['nama']; //simpan nilai input ($validateData['nama]) ke dalam property nama prodi ($prodi->nama)
        $prodi->save(); //simpan ke dalam tabel prodi

        //return "Data prodi $prodi->nama berhasil disimpan ke database"; //tampilkan pesan berhasil
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil disimpan ke database");
        return redirect()->route('prodi.create');
    }
}
