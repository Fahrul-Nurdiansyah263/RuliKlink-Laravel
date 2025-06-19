<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Mail\FormInput;
use Illuminate\Support\Facades\Mail;

class FormInputController extends Controller
{
    public function create()
    {
        return view('frontend.forminput');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_pasien' => 'required|max:50',
            'email_pasien' => 'required|email|max:50',
            'tanggal' => 'required|max:50',
            'jam' => 'required|max:50',
        ]);
        $pasien = Pasien::create($validateData);

        Mail::to($pasien->email_pasien)->send(new FormInput($pasien));
        return redirect()->route('pasien.form.create')
                         ->with('succes', 'Data berhasil ditambahkan!');
    }
}
