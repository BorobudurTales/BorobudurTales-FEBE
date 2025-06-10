<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full p-5 border bg-white rounded-[20px] shadow-sm mb-5">
        <p class="mb-3 text-3xl font-bold text-gray-500">Tambah Pengguna</p>
    </div>
   @if (session('success'))
        <div class="px-4 py-2 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="px-4 py-2 mb-4 text-red-700 bg-red-100 rounded">
            {{ session('red') }}
        </div>
    @endif
    <div class="max-w-4xl mx-auto">
        <div class="p-8 bg-white shadow-lg rounded-3xl">
            <form action="{{ route('user.admin.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-500">First Name</label>
                        <input type="text" name="first_name"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" placeholder="Masukan Nama Depan Anda" required>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Last Name</label>
                        <input type="text" name="last_name" 
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" placeholder="Masukan Nama Belakang Anda" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Username</label>
                        <input type="text" name="username"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" placeholder="Masukan Username Anda" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Email</label>
                        <input type="email" name="email" 
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" placeholder="Masukan Email Anda" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Password</label>
                        <input type="password" name="password" 
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" placeholder="Masukan Password Anda" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Role</label>
                        <select name="role" class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                            <option value="admin" >Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Verifikasi Email</label>
                        <select name="email_verified_at" class="w-full px-3 py-2 mt-1 text-sm border rounded">
                            <option value="">Belum
                                Verifikasi</option>
                            <option value="1">
                                Terverifikasi</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-6">
                    <a href="{{ route('user.admin') }}"
                        class="px-4 py-2 text-sm text-white bg-gray-400 rounded-xl hover:bg-gray-600">
                        ← Kembali
                    </a>
                    <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-blue-500 rounded-xl hover:bg-blue-600">
                        Tambah Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>
