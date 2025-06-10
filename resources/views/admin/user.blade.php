<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full p-5 border bg-white rounded-[20px] shadow-sm mb-5">
        <p class="mb-3 text-3xl font-bold text-gray-500">Daftar Pengguna</p>
    </div>
    <div class="mb-4">
        <a href="{{ route('user.admin.create') }}" class="px-4 py-2 text-white bg-gray-400 rounded-md hover:bg-gray-500">
            Tambah Pengguna
        </a>
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
    <div class="overflow-x-auto bg-white shadow rounded-xl">
        <table class="w-full text-sm divide-y divide-gray-200">
            <thead class="bg-gray-500 ">
                <tr>
                    <th class="px-6 py-3 font-semibold text-left text-white">Nama Pengguna</th>
                    <th class="px-6 py-3 font-semibold text-left text-white">Email</th>
                    <th class="px-6 py-3 font-semibold text-left text-white">Role</th>
                    <th class="px-6 py-3 font-semibold text-center text-white">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-100">
                @forelse ($users as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $item->username }}</td>
                        <td class="px-6 py-4">{{ $item->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            @foreach ($item->roles as $role)
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold text-white rounded-full
                                        {{ $role->name === 'admin' ? 'bg-gray-500' : ($role->name === 'user' ? 'bg-blue-400' : 'bg-yellow-500') }}">
                                    {{ ucfirst($role->name) }}
                                </span>
                            @endforeach

                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('user.admin.detail', $item->id) }}') }}"
                                    class="text-blue-500 hover:text-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                <form action="{{ route('user.admin.destroy', $item->id) }}" method="post"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data histori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-6 py-4">
            {{ $users->links() }}
        </div>
    </div>
</x-admin.layout>
