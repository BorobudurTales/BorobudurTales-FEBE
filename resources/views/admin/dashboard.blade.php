<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full p-5 border bg-white rounded-[20px] shadow-sm mb-5">
        <p class="mb-3 text-3xl font-bold text-gray-500">Dashboard Admin</p>
        <p class="text-sm text-gray-400">Selamat Datang {{ Auth::user()->username }}👋👋</p>
    </div>
    <div class="grid w-full grid-cols-3 gap-2">
        <div
            class="flex items-center justify-between p-6 transition bg-white border border-gray-100 shadow-md h-36 rounded-2xl hover:shadow-lg">
            <div>
                <p class="text-sm text-gray-400">Jumlah Pengguna</p>
                <h3 class="mt-1 text-3xl font-bold text-blue-600">{{ $jumlahUser }}</h3>
            </div>
            <div class="p-3 text-blue-600 bg-blue-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>

            </div>
        </div>
        <div
            class="flex items-center justify-between p-6 transition bg-white border border-gray-100 shadow-md h-36 rounded-2xl hover:shadow-lg">
            <div>
                <p class="text-sm text-gray-400">Jumlah History</p>
                <h3 class="mt-1 text-3xl font-bold text-yellow-600">{{ $jumlahHistory }}</h3>
            </div>
            <div class="p-3 text-blue-600 bg-blue-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
        </div>
        <div
            class="flex items-center justify-between p-6 transition bg-white border border-gray-100 shadow-md h-36 rounded-2xl hover:shadow-lg">
            <div>
                <p class="text-sm text-gray-400">Jumlah Data Cerita</p>
                <h3 class="mt-1 text-3xl font-bold text-sky-600">{{ $jumlahCerita }}</h3>
            </div>
            <div class="p-3 text-blue-600 bg-blue-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                </svg>

            </div>
        </div>
</x-admin.layout>
