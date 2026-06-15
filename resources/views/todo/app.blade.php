<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans text-gray-800 antialiased">
    
    <nav class="bg-gray-900 shadow-md">
        <div class="max-w-3xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-white text-lg font-semibold">Simple To Do List</div>
            @auth
                <div class="flex items-center gap-4">
                    <div class="text-gray-300 text-sm">
                        Halo, <span class="font-semibold text-white">{{ Auth::user()->name }}</span>
                        <span class="text-xs px-2 py-0.5 bg-blue-600 text-white rounded-full capitalize">{{ Auth::user()->role }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1.5 rounded transition font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>
    
    <div class="max-w-3xl mx-auto px-4 mt-8">
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">To Do List</h1>
        
        <div class="flex flex-col gap-6">

            {{-- Menampilkan Alert Error Validasi --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 mb-3 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Menampilkan Alert Sukses dari Session --}}
            @if (session('success'))
                <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 mb-3 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Panel Statistik Tugas (Integrasi API JSON via Fetch) --}}
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 text-center">
                    <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Tugas</span>
                    <h3 id="stat-total" class="text-2xl font-bold text-gray-800 mt-1">...</h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 text-center">
                    <span class="text-xs font-semibold text-green-600 uppercase tracking-wider">Selesai</span>
                    <h3 id="stat-completed" class="text-2xl font-bold text-green-700 mt-1">...</h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 text-center">
                    <span class="text-xs font-semibold text-amber-600 uppercase tracking-wider">Tertunda</span>
                    <h3 id="stat-pending" class="text-2xl font-bold text-amber-700 mt-1">...</h3>
                </div>
            </div>
            
            {{-- Form Input Task Baru --}}
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <form id="todo-form" action="{{ route('todo.post') }}" method="POST">
                    @csrf
                    <div class="flex gap-2">
                        <input type="text" name="task" id="todo-input"
                            value="{{ old('task') }}" 
                            placeholder="Tambah task baru" required
                            class="flex-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-md transition duration-150 ease-in-out shadow-sm">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
            
            {{-- Area Menampilkan List Data --}}
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                
                {{-- FORM SEARCH (Sudah diperbaiki ke route('todo') dengan method GET) --}}
                <form id="search-form" action="{{ route('todo') }}" method="GET" class="mb-6">
                    <div class="flex gap-2">
                        {{-- Atribut value ditambahkan request('search') agar keyword tidak hilang dari input box setelah diklik --}}
                        <input type="text" name="search" value="{{ request('search') }}" 
                            placeholder="Masukkan kata kunci"
                            class="flex-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                        <button type="submit" 
                            class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-5 py-2 rounded-md transition duration-150 ease-in-out shadow-sm">
                            Cari
                        </button>
                    </div>
                </form>
                
                <ul class="flex flex-col gap-2 mb-4" id="todo-list">
                    
                    {{-- Loop data dinamis dari database --}}
                    @forelse ($todos as $d)
                        <li class="border border-gray-200 rounded-md p-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100 transition duration-150">
                            {{-- Jika status tugas sudah selesai (is_done = 1), teks dicoret --}}
                            <span class="text-gray-700 font-medium {{ $d->is_done ? 'line-through text-gray-400' : '' }}">
                                {{ $d->task }}
                            </span>
                            
                            <div class="flex gap-1">
                                {{-- 1. FORM LOKASI DELETE (TOMBOL HAPUS) --}}
                                <form action="{{ route('todo.delete', ['id' => $d->id]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus task ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-sm transition shadow-sm" title="Hapus">
                                        ✕
                                    </button>
                                </form>

                                {{-- Tombol untuk membuka panel edit collapse --}}
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded text-sm transition shadow-sm" 
                                    onclick="toggleCollapse('collapse-{{ $d->id }}')" title="Edit">
                                    ✎
                                </button>
                            </div>
                        </li>
                        
                        {{-- 2. FORM LOKASI UPDATE (PANEL EDIT COLLAPSE) --}}
                        <li id="collapse-{{ $d->id }}" class="hidden border border-gray-200 rounded-md p-4 bg-white shadow-inner mb-2">
                            <form action="{{ route('todo.update', ['id' => $d->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-2 mb-3">
                                    <input type="text" name="task" value="{{ $d->task }}" required
                                        class="flex-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                                    <button type="submit" 
                                        class="border-2 border-blue-500 text-blue-600 hover:bg-blue-50 font-medium px-4 py-2 rounded-md transition duration-150">
                                        Update
                                    </button>
                                </div>
                                
                                <div class="flex items-center gap-6 mt-3 px-1">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="radio" value="1" name="is_done" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ $d->is_done == 1 ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Selesai</span>
                                    </label>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="radio" value="0" name="is_done" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ $d->is_done == 0 ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Belum Selesai</span>
                                    </label>
                                </div>
                            </form>
                        </li>
                    @empty
                        {{-- Keadaan jika database kosong / tidak ditemukan kata kunci pencarian --}}
                        <li class="text-center py-4 text-gray-500 bg-gray-50 border border-gray-200 rounded-md">
                            Tidak ada task yang cocok atau daftar agenda masih kosong.
                        </li>
                    @endforelse
                    
                </ul>
            </div>
            
        </div>
    </div>

    <script>
        function toggleCollapse(elementId) {
            const element = document.getElementById(elementId);
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        }

        // Fetch Todo Stats API
        document.addEventListener('DOMContentLoaded', function() {
            fetchStats();
        });

        function fetchStats() {
            fetch('{{ route("api.todo-stats") }}')
                .then(response => response.json())
                .then(result => {
                    if (result.status === 'success') {
                        document.getElementById('stat-total').innerText = result.data.total;
                        document.getElementById('stat-completed').innerText = result.data.completed;
                        document.getElementById('stat-pending').innerText = result.data.pending;
                    }
                })
                .catch(error => {
                    console.error('Error fetching statistics:', error);
                });
        }
    </script>
</body>

</html>