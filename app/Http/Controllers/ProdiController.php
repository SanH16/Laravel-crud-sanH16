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
        // dump($request);
        // echo $request->nama;

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

    public function edit(Prodi $prodi)
    {
        return view("prodi.edit", ['prodi' => $prodi]);
    }

    public function update(Request $request, Prodi $prodi)
    {
        // dump($request->all());
        // dump($prodi);

        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);

        Prodi::where('id', $prodi->id)->update($validateData);
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil diubah");
        return redirect()->route('prodi.index');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with("info", "Prodi $prodi->nama berhasil dihapus");
    }
}
