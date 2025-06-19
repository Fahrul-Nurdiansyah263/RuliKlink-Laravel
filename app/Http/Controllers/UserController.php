<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{

    
    public function index()
    {
        $user = User::orderBy('id', 'desc')->get();
        
        return view('backend.v_user.index', compact('user'));
    }

    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'nama'     => 'required|max:255',
            'email'    => 'required|max:255',
            
            'password' => 'required|max:20',
         ]);
         
        User::create($validatedData);
        return redirect('/backend/user');
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.v_user.edit', [
            'judul' => 'Ubah User',
            'edit' => $user
        ]);
        return redirect('/backend/user');
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'nama'     => 'required|max:255',
            'email'    => 'required|max:255',
            
            'password' => 'required|min:4',
        ];
        $validatedData = $request->validate($rules);
        User::where('id', $id)->update($validatedData);
        return redirect('backend/user');
       
    }

    public function create()
    {
        return view('backend.v_user.create');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/backend/user');
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view('backend.v_user.trashed', compact('users'));
    }

    public function restore($id)
    {
        User::withTrashed()->where('id', $id)->restore();
        return redirect()->route('backend.user.trashed')->with('success', 'Data Admin Berhasil Dipulihkan');
    }

    public function forceDelete($id)
    {
        User::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('backend.user.trashed')->with('success', 'Data berhasil dihapus permanen');
    }
}
