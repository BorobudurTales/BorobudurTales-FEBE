<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.user', [
            'title' => 'Halaman user',
            'users' => $users
        ]);
    }
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);

        return view('admin.detail-user', ['user' => $user, 'title' => 'Detail User']);
    }

    public function create()
    {
        return view('admin.tambah-user', ['title' => 'Tambah User']);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,user',
            'email_verified_at' => 'nullable|in:1',
        ]);
        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'email_verified_at' =>  $validated['email_verified_at'] ? now() : null,
        ]);
        $user->assignRole($validated['role']);
        // Jika belum verifikasi, kirim email verifikasi
        if (!$validated['email_verified_at']) {
            event(new Registered($user)); // trigger verification email
        }
        return redirect()->back()->with('success', 'Data user berhasil ditamabah.');
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
        ]);

        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
        ]);

        if ($request->email_verified_at) {
            $user->email_verified_at = now();
        } else {
            $user->email_verified_at = null;
        }
        $user->save();

        $user->syncRoles([$validated['role']]);

        return redirect()->back()->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $history = User::findOrFail($id);
        $history->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
