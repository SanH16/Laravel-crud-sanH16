<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    //
    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        // dump($reqeuest);
        // echo $reqeust->nama;

        $validateData = $request->validate(
            ['nama' => 'required|min:5|max:20']
        );
        dump(validateData);
        echo $validateData['nama'];
    }
}
