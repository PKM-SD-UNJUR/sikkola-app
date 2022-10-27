<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\kelas;
use App\Models\submission;
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
        return view('auth.profil', compact('user', 'kelas'));
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

        $user->name  = $request->nama;
        $user->email  = $request->email;
        $user->kelas_id  = $request->kelas;

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

        $user->password  = Hash::make($request->password);

        $user->save();


        return back()->with('success', 'Password Berhasil Diubah!');
    }

    public function statistik()
    {
        $users = user::all();
        $kelas = kelas::all();
        return view('dashboard-layout.pengguna.statistik', compact('users', 'kelas'), ['title' => 'pengguna', 'subtitle' => 'statistik']);
    }


    public function index(Request $request)
    {
        $users = user::where('kelas_id', $request->id)->where('role', 'siswa')->get();
        $gurus = user::where('role', 'guru')->get();
        $kelas = kelas::all();
        return view('dashboard-layout.pengguna.index', compact('users', 'kelas','gurus'), ['title' => 'pengguna', 'subtitle' => $request->nama]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = user::where('kelas_id', $request->kelasID)->where('role',$request->role)->get();
        $kelas = kelas::all();

        if($request->role=='siswa') {       
            return view('dashboard-layout.pengguna.create', compact('users', 'kelas'), ['title' => 'pengguna', 'subtitle' => $request->nama, 'kelasID' => $request->kelasID]);
        } else {
            return view('dashboard-layout.pengguna.create', compact('users', 'kelas'), ['title' => 'pengguna', 'subtitle' => 'guru', 'kelasID' => $request->kelasID]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'jenisKelamin' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);


        User::create([
            'name'  => $request->nama,
            'jenisKelamin'  => $request->jenisKelamin,
            'kelas_id'  => $request->kelasID,
            'email'  => $request->email,
            'role'  => $request->role,
            'password'  => Hash::make($request->password)
        ]);

        $namaKelas = kelas::where('id', $request->kelasID)->get();
        foreach ($namaKelas as $namaKls) {
            $kelasNama = $namaKls->nama;
        }

        if($request->role=='siswa') {  
            return redirect()->route('kelola.index', ['id' => $request->kelasID, 'nama' => $kelasNama, 'role' => $request->role])->with('success', 'Pengguna Berhasil Ditambahkan!');
        } else {
            return redirect()->route('kelola.index', ['id' => $request->kelasID, 'nama' => 'guru', 'role' => $request->role])->with('success', 'Pengguna Berhasil Ditambahkan!');
        }
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
    public function edit($id, Request $request)
    {
        $user = user::find($id);
        $kelas = kelas::all();

        if($request->role=='siswa') {    
            return view('dashboard-layout.pengguna.edit', compact('user', 'kelas'), ['title' => 'pengguna', 'subtitle' => $request->nama]);
        }  else {
            return view('dashboard-layout.pengguna.edit', compact('user', 'kelas'), ['title' => 'pengguna', 'subtitle' => 'guru']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'jenisKelamin' => ['required'],
            'kelas' => ['required']
        ]);


        $user = user::find($id);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->jenisKelamin = $request->jenisKelamin;
        $user->kelas_id = $request->kelas;
        $user->save();

        $namaKelas = kelas::where('id', $request->kelasID)->get();
        foreach ($namaKelas as $namaKls) {
            $kelasNama = $namaKls->nama;
        }

        if($request->role=='siswa') {    
            return redirect()->route('kelola.index', ['id' => $request->kelasID, 'nama' => $kelasNama, 'role' => $request->role])->with('success', 'Pengguna Berhasil Diubah!');
        } else {
            return redirect()->route('kelola.index', ['id' => $request->kelasID, 'nama' => 'guru', 'role' => $request->role])->with('success', 'Pengguna Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $submission = submission::where('user_id', $id)->count();

        $namaKelas = kelas::where('id', $request->kelasID)->get();
        foreach ($namaKelas as $namaKls) {
            $kelasNama = $namaKls->nama;
        }

        if($request->role=='siswa') {
            if ($submission == 0) {

                user::find($id)->delete();

                return redirect()->route('kelola.index', ['id' => $request->kelasID, 'nama' => $kelasNama, 'role' => $request->role])->with('success', 'Pengguna Berhasil Dihapus!');
            } else {
                return redirect()->route('kelola.index', ['id' => $request->kelasID, 'nama' => $kelasNama, 'role' => $request->role])->with('warning', 'Pengguna Gagal Dihapus, Akun Sedang Digunakan!');
            }
        } else {
            if ($submission == 0) {

                user::find($id)->delete();

                return redirect()->route('kelola.index', ['id' => $request->kelasID, 'nama' => $request->role, 'role' => $request->role])->with('success', 'Pengguna Berhasil Dihapus!');
            } else {
                return redirect()->route('kelola.index', ['id' => $request->kelasID, 'nama' => $request->role, 'role' => $request->role])->with('warning', 'Pengguna Gagal Dihapus, Akun Sedang Digunakan!');
            }
        }
    }
}
