@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Koleksi Buku</h2>
        <p class="mt-1 text-sm text-gray-500">Kelola perpustakaan digital Anda dengan mudah.</p>
    </div>
    <a href="{{ route('books.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-5 rounded-lg shadow-sm transition duration-150 ease-in-out flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Tambah Buku
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse($books as $book)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col">
        <div class="relative w-full pt-[140%] overflow-hidden bg-gray-100">
            @if($book->cover)
                <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover {{ $book->title }}" class="absolute top-0 left-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
            @else
                <div class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-sm font-medium">Cover tidak tersedia</span>
                </div>
            @endif
        </div>
        <div class="p-5 flex flex-col flex-grow">
            <div class="flex justify-between items-start mb-3">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    {{ $book->category }}
                </span>
                <span class="text-sm text-gray-500 font-semibold">{{ $book->year }}</span>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-1 line-clamp-1" title="{{ $book->title }}">{{ $book->title }}</h3>
            <p class="text-sm text-gray-600 mb-3 font-medium">{{ $book->author }}</p>
            <p class="text-sm text-gray-500 mb-4 line-clamp-2 flex-grow">{{ $book->description }}</p>
            
            <div class="flex justify-between items-center pt-4 border-t border-gray-100 mt-auto">
                <a href="{{ route('books.edit', $book) }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit
                </a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium text-sm flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white p-12 rounded-2xl shadow-sm border border-gray-200 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
        <p class="text-gray-900 text-lg font-medium mb-1">Belum ada buku</p>
        <p class="text-gray-500 mb-4">Mulailah dengan menambahkan buku pertama Anda.</p>
        <a href="{{ route('books.create') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
            + Tambah Buku Sekarang
        </a>
    </div>
    @endforelse
</div>
@endsection
