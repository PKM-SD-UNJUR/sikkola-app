<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        $user = User::with('kelas')->get();
        $kelas = kelas::all();
        return view('auth.profil',compact('user','kelas'));
    }

    public function updateProfil(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'kelas' => ['required']
        ]);

        $user = User::find($id);

        $user->name  = $request-> nama;
        $user->email  = $request-> email;
        $user->kelas_id  = $request-> kelas;

        $user->save();
            

        return back()->with('success', 'Profil Berhasil Diubah!');
    }

    public function updatePassword(Request $request, $id)
    {
        //
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::find($id);

        $user->password  = Hash::make($request-> password);

        $user->save();
            

        return back()->with('success', 'Password Berhasil Diubah!');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
