<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Laporan Saya
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 text-green-600">{{ session('success') }}</div>
                @endif

                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Barang</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporans as $laporan)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $laporan->nama_barang }}</td>
                                <td class="px-4 py-2 capitalize">{{ $laporan->status }}</td>
                                <td class="px-4 py-2">
    {{ $laporan->tanggal_lapor->format('d M Y') }}
</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('laporan.show', $laporan->id) }}"
                                       class="text-blue-600 underline">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">Belum ada laporan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
