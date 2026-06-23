<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Menampilkan semua user kecuali ID 1 (biasanya superadmin)
        $user = User::where('id', '!=', 1)->get();
        return view('admin.anggota.index', compact('user'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        $status = Status::all();
        return view('admin.anggota.user_add', compact('prodi', 'status'));
    }

    public function store(Request $request)
    {
        // Validasi Email hanya jika email diisi
        if ($request->email && !filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->with('error', 'Format Email tidak valid');
        }

        // Pengecekan NIA (Hanya jika status bukan 1 dan NIA diisi)
        if ($request->status != 1 && $request->nia) {
            if (User::where('nia', $request->nia)->exists()) {
                return redirect()->back()->withInput()->with('error', 'NIA sudah digunakan!');
            }

            if (strlen($request->nia) !== 19) {
                return redirect()->back()->withInput()->with('error', 'Format NIA tidak sesuai (harus 19 karakter)');
            }
        }

        // Simpan ke Database (Semua yang nullable di migration akan aman di sini)
        User::create([
            'nama'          => $request->nama,
            'id_prodi'      => $request->prodi,     // Bisa null
            'tahun'         => $request->tahun,     // Bisa null
            'jenis_kelamin' => $request->jk,        // Bisa null
            'nia'           => $request->nia,       // Bisa null
            'id_status'     => $request->status,    // Bisa null
            'email'         => $request->email,     // Bisa null
            'no_hp'         => $request->no_hp,     // Bisa null
            'password'      => Hash::make('ahaha'), // Default password
        ]);

        return redirect()->route('user.index')->withSuccess('Data Anggota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $prodi = Prodi::all();
        $status = Status::all();
        return view('admin.anggota.user_edit', compact('user', 'prodi', 'status'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi Email jika ada perubahan
        if ($request->email && $request->email !== $user->email) {
            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return redirect()->back()->with('error', 'Format Email tidak valid');
            }
            
            if (User::where('email', $request->email)->where('id', '!=', $id)->exists()) {
                return redirect()->back()->with('error', 'Email sudah digunakan oleh user lain');
            }
        }

        // Logika NIA untuk Update
        if ($request->status != 1 && $request->nia) {
            if (strlen($request->nia) !== 19) {
                return redirect()->back()->with('error', 'Format NIA tidak sesuai');
            }
        }

        // Update data
        $user->update([
            'nama'          => $request->nama,
            'id_prodi'      => $request->prodi,
            'tahun'         => $request->tahun,
            'jenis_kelamin' => $request->jk,
            'nia'           => $request->nia,
            'id_status'     => $request->status,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            // Password tidak diupdate di sini agar tidak berubah jadi 'ahaha' terus
        ]);

        return redirect()->route('user.index')->withSuccess('Data Anggota berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->withSuccess('Data Anggota berhasil dihapus');
    }
}