<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Laporan Kerusakan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6 space-y-4">

                <div>
                    <strong>Nama Barang:</strong><br>
                    {{ $laporan->nama_barang }}
                </div>

                <div>
                    <strong>Deskripsi Kerusakan:</strong><br>
                    {{ $laporan->deskripsi }}
                </div>

                <div>
                    <strong>Status:</strong>
                    <span class="uppercase px-2 py-1 rounded {{ $laporan->status === 'pending' ? 'bg-yellow-200' : 'bg-green-200' }}">
                        {{ $laporan->status }}
                    </span>
                </div>

                <div>
                    <strong>Tanggal Laporan:</strong><br>
                    {{ \Carbon\Carbon::parse($laporan->tanggal_lapor)->format('d M Y') }}
                </div>

               <div>
    <strong>Media Bukti:</strong><br>
    @if($laporan->media)
        @if(\Illuminate\Support\Str::endsWith($laporan->media, ['.mp4']))
            <video controls class="w-full max-w-xl rounded">
                <source src="{{ asset('storage/' . $laporan->media) }}" type="video/mp4">
                Browsermu tidak mendukung video.
            </video>
        @else
            <img src="{{ asset('storage/' . $laporan->media) }}" alt="Bukti" class="max-w-full h-auto rounded shadow">
        @endif
    @else
        <p class="text-gray-500 italic">Tidak ada media dilampirkan.</p>
    @endif
</div>


            </div>
        </div>
    </div>
</x-app-layout>
