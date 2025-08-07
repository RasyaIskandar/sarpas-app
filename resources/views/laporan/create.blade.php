<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Laporan Sarpras Disini
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Deskripsi Kerusakan</label>
                        <textarea name="deskripsi" rows="4" class="form-input rounded-md shadow-sm mt-1 block w-full" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Upload Foto/Video</label>
                        <input type="file" name="media" class="form-input rounded-md shadow-sm mt-1 block w-full" accept="image/*,video/*" required>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>Kirim Laporan</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
