<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full p-5 border bg-white rounded-[20px] shadow-sm mb-5">
        <p class="mb-3 text-3xl font-bold text-gray-500">Riwayat Pengguna</p>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-xl">
        <table class="w-full text-sm divide-y divide-gray-200">
            <thead class="bg-gray-500 ">
                <tr>
                    <th class="px-6 py-3 font-semibold text-left text-white">Nama Pengguna</th>
                    <th class="px-6 py-3 font-semibold text-left text-white">Gambar</th>
                    <th class="px-6 py-3 font-semibold text-left text-white">Akurasi</th>
                    <th class="px-6 py-3 font-semibold text-left text-white">Waktu</th>
                    <th class="px-6 py-3 font-semibold text-center text-white">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-100">
                @forelse ($histories as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $item->user->username ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @if ($item->filename)
                                <img src="{{ asset('storage/uploads/' . $item->filename) }}"
                                    alt="Gambar {{ $item->user->username ?? 'N/A' }}"
                                    class="object-cover w-16 h-16 rounded shadow">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 font-semibold rounded-full text-md ">
                                {{ number_format(($item->similarity ?? 0) * 100, 2) }}%
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $item->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center">
                                <form action="{{ route('history.admin.destroy', $item->id) }}" method="post"
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
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data histori pengguna.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-6 py-2">
            {{ $histories->links() }}
        </div>
    </div>
</x-admin.layout>
