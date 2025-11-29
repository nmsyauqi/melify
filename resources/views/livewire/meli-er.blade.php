<div class="max-w-4xl mx-auto p-4 bg-gray-50">
    <h1 class="text-2xl font-bold mb-4">Katalog Mineral</h1>

    @if (session()->has('success'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-4 mb-6 border border-gray-300 rounded bg-white shadow-sm">
        <h2 class="text-xl font-semibold mb-3">
            {{ $editingMeliId ? 'Edit Meli' : 'Tambah Mineral Baru' }}
        </h2>

        <form wire:submit.prevent="save" class="flex flex-col gap-3">
            <label class="block">
                <span class="text-sm font-medium text-gray-700">Grup/Kategori Mineral:</span>
                <select wire:model.defer="meli_uri_id" class="w-full border border-gray-300 p-2 rounded mt-1">
                    <option value="">-- Pilih Grup --</option>
                    @foreach($uris as $uri)
                        <option value="{{ $uri->id }}">{{ $uri->name }}</option>
                    @endforeach
                </select>
                @error('meli_uri_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </label>

            <label class="block">
                <span class="text-sm font-medium text-gray-700">Nama Mineral:</span>
                <input wire:model.defer="name" type="text" class="w-full border border-gray-300 p-2 rounded mt-1">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </label>

            <label class="block">
                <span class="text-sm font-medium text-gray-700">Rumus Kimia:</span>
                <input wire:model.defer="formula" type="text" class="w-full border border-gray-300 p-2 rounded mt-1">
            </label>

            <div class="flex gap-4">
                <label class="block w-1/2">
                    <span class="text-sm font-medium text-gray-700">Warna:</span>
                    <input wire:model.defer="color" type="text" class="w-full border border-gray-300 p-2 rounded mt-1">
                </label>
                
                <label class="block w-1/2">
                    <span class="text-sm font-medium text-gray-700">Kekerasan Mohs (1-10):</span>
                    <input wire:model.defer="mohs_hardness" type="number" class="w-full border border-gray-300 p-2 rounded mt-1">
                </label>
            </div>

            <button type="submit" class="p-2 mt-2 font-semibold text-white bg-indigo-600 rounded hover:bg-indigo-700">
                {{ $editingMeliId ? 'Simpan Perubahan' : 'Tambah Mineral' }}
            </button>
            
            @if ($editingMeliId)
                <button type="button" wire:click="reset(['meli_uri_id', 'name', 'formula', 'color', 'mohs_hardness', 'editingMeliId'])" class="text-sm text-gray-500 hover:text-gray-700 mt-1">
                    Batal Edit
                </button>
            @endif
        </form>
    </div>

    <div class="border border-gray-300 rounded shadow-sm overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Grup</th> <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Formula</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Warna</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kekerasan</th>
                    <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($melis as $meli)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">{{ $meli->uri->name ?? 'N/A' }}</td> <td class="px-4 py-2 whitespace-nowrap">{{ $meli->name }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $meli->formula ?? '-' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $meli->color ?? '-' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $meli->mohs_hardness ?? '-' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" wire:click.prevent="edit({{ $meli->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                            <a href="#" wire:click.prevent="delete({{ $meli->id }})" class="text-red-600 hover:text-red-900" 
                                onclick="confirm('Yakin ingin menghapus meli ini?') || event.stopImmediatePropagation()">Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada data meli.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>