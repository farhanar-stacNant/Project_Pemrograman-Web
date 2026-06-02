@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Tambah Buku Baru</h2>
            <p class="mt-1 text-sm text-gray-500">Masukkan detail informasi buku ke dalam sistem.</p>
        </div>
        <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="col-span-1 md:col-span-2">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Judul Buku <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-lg border-gray-300 border px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all @error('title') border-red-500 @enderror" placeholder="Contoh: Bumi Manusia">
                    @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="author" class="block text-sm font-semibold text-gray-700 mb-1">Penulis <span class="text-red-500">*</span></label>
                    <input type="text" name="author" id="author" value="{{ old('author') }}" class="w-full rounded-lg border-gray-300 border px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all @error('author') border-red-500 @enderror" placeholder="Nama penulis">
                    @error('author') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="publisher" class="block text-sm font-semibold text-gray-700 mb-1">Penerbit <span class="text-red-500">*</span></label>
                    <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}" class="w-full rounded-lg border-gray-300 border px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all @error('publisher') border-red-500 @enderror" placeholder="Nama penerbit">
                    @error('publisher') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="year" class="block text-sm font-semibold text-gray-700 mb-1">Tahun Terbit <span class="text-red-500">*</span></label>
                    <input type="number" name="year" id="year" value="{{ old('year') }}" class="w-full rounded-lg border-gray-300 border px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all @error('year') border-red-500 @enderror" placeholder="Contoh: 2023">
                    @error('year') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="category" id="category" value="{{ old('category') }}" class="w-full rounded-lg border-gray-300 border px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all @error('category') border-red-500 @enderror" placeholder="Fiksi, Sejarah, dsb.">
                    @error('category') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-gray-300 border px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all @error('description') border-red-500 @enderror" placeholder="Sinopsis atau deskripsi buku">{{ old('description') }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="cover" class="block text-sm font-semibold text-gray-700 mb-1">Cover Buku (Opsional)</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition-colors bg-gray-50">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="cover" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none px-1">
                                    <span>Upload file gambar</span>
                                    <input id="cover" name="cover" type="file" class="sr-only" accept="image/*">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG maksimal 2MB</p>
                        </div>
                    </div>
                    @error('cover') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg shadow-sm transition duration-150 ease-in-out focus:ring-4 focus:ring-blue-200">
                    Simpan Buku
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
