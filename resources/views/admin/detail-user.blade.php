<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full p-5 border bg-white rounded-[20px] shadow-sm mb-5">
        <p class="mb-3 text-3xl font-bold text-gray-500">Detail Pengguna</p>
    </div>
    @if (session('success'))
        <div class="px-4 py-2 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-4xl mx-auto">
        <div class="p-8 bg-white shadow-lg rounded-3xl">
            <form action="{{ route('user.admin.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-500">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Username</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Role</label>
                        <select name="role" class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                            <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label class="text-sm text-gray-500">Verifikasi Email</label>
                        <select name="email_verified_at" class="w-full px-3 py-2 mt-1 text-sm border rounded">
                            <option value="" {{ $user->email_verified_at == null ? 'selected' : '' }}>Belum
                                Verifikasi</option>
                            <option value="1" {{ $user->email_verified_at != null ? 'selected' : '' }}>
                                Terverifikasi</option>
                        </select>
                    </div>
                </div>

                <div class="grid gap-6 text-sm text-gray-700 sm:grid-cols-2">
                    <div>
                        <p class="font-medium text-gray-500">Tanggal Gabung</p>
                        <p class="mt-1">{{ $user->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-500">Status Verifikasi Saat Ini</p>
                        <p class="mt-1">
                            @if ($user->email_verified_at)
                                <span class="font-semibold text-green-600">Terverifikasi</span>
                            @else
                                <span class="font-semibold text-red-600">Belum Verifikasi</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6">
                    <a href="{{ route('user.admin') }}"
                        class="px-4 py-2 text-sm text-white bg-gray-400 rounded-xl hover:bg-gray-600">
                        ← Kembali
                    </a>
                    <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-blue-500 rounded-xl hover:bg-blue-600">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-admin.layout>
