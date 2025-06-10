<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full p-5 border bg-white rounded-[20px] shadow-sm mb-5">
        <p class="mb-3 text-3xl font-bold text-gray-500">Profil</p>
    </div>
    @if (session('success'))
        <div class="px-4 py-2 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="px-4 py-2 mb-4 text-red-700 bg-red-100 rounded">
            <ul class="pl-5 list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-full mx-auto">
        <div class="p-8 bg-white shadow-lg rounded-3xl">
            <form action="{{ route('profile.admin.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="flex items-center gap-6">
                    <div class="flex-shrink-0">
                        <div
                            class="flex items-center justify-center w-20 h-20 text-2xl font-bold text-gray-600 bg-gray-200 rounded-full">
                            {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->username }}</h2>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm text-gray-500">First Name</label>
                        <input type="text" name="first_name"
                            value="{{ old('first_name', Auth::user()->first_name) }}"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-500">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-500">Username</label>
                        <input type="text" name="username" value="{{ old('username', Auth::user()->username) }}"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-500">Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                            class="w-full px-3 py-2 mt-1 text-sm border rounded" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-500">Password</label>
                        <input type="password" name="password" class="w-full px-3 py-2 mt-1 text-sm border rounded">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 text-sm text-gray-700 sm:grid-cols-2">
                    <div>
                        <p class="font-medium text-gray-500">Tanggal Gabung</p>
                        <p class="mt-1">{{ Auth::user()->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-500">Verifikasi Email</p>
                        <p class="mt-1">
                            @if (Auth::user()->email_verified_at)
                                <span class="font-semibold text-green-600">Terverifikasi</span>
                            @else
                                <span class="font-semibold text-red-600">Belum Verifikasi</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="pt-6 text-right">
                    <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>
