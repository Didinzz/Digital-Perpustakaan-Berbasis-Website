@extends('layouts.app')
@section('title', 'Dashboard')
@section('dashboard', 'bg-gray-100 dark:bg-gray-700')

@section('content')
    <div class="text-white">
        <div class="box-border w-full p-4">
            <h1 class="font-bold text-2xl text-black dark:text-white">Selamat Datang Di Perpustakaan Digital</h1>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="px-4 py-3 mb-4 bg-green-400 text-white flex justify-between rounded" id="message">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-6" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
            <button class="text-green-100 hover:text-white" id="close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <div
        class="block p-4 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-700 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-4 mx-auto my-2">
                <!-- Metric Card 1 -->
                <div
                    class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                    <div class="flex items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-green-600">
                                <i class="fas fa-book fa-2x fa-fw fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Buku Tersedia</h5>
                            <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $totalBuku }} <span
                                    class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            @if (Auth::user()->role == 'user')
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-4 mx-auto my-2">
                    <!-- Metric Card 2 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-pink-600">
                                    <i class="fas fa-upload fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Buku Yang Diupload
                                </h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $totalBukuUploads }}<span
                                        class="text-pink-500"><i class="fas fa-caret-down ml-2"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            @endif
            @if (Auth::user()->role == 'admin')
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-4 mx-auto my-2">
                    <!-- Metric Card 3 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-blue-600">
                                    <i class="fas fa-tags fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Kategori</h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $totalKategori }}<span
                                        class="text-blue-500"><i class="fas fa-caret-down ml-2"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-4 mx-auto my-2">
                    <!-- Metric Card 4 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600">
                                    <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total User</h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $totalUser }}<span
                                        class="text-red-500"><i class="fas fa-caret-down ml-2"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            @endif
        </div>
    </div>

    {{-- @endif --}}
@endsection
