 @extends('layouts.app')
 @section('title', 'Buku saya')
 @section('Tabel Buku saya', 'bg-gray-300 dark:bg-gray-700')

 @section('content')
     @if (session()->has('success'))
         <div id="toast-success"
             class="mt-3 flex items-center w-full max-w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-md  dark:text-gray-400 dark:bg-gray-800"
             role="alert">
             <div
                 class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                 <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                     <path
                         d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                 </svg>
                 <span class="sr-only">Check icon</span>
             </div>
             <div class="ms-3 text-sm font-normal">{{ Session('success') }}</div>
             <button type="button"
                 class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                 data-dismiss-target="#toast-success" aria-label="Close">
                 <span class="sr-only">Close</span>
                 <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                 </svg>
             </button>
         </div>
     @endif
     @if (session()->has('error'))
         <div id="toast-warning"
             class="flex items-center w-full max-w-full p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
             role="alert">
             <div
                 class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                 <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 20 20">
                     <path
                         d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                 </svg>
                 <span class="sr-only">Warning icon</span>
             </div>
             <div class="ms-3 text-sm font-normal">{{ Session('error') }}</div>
             <button type="button"
                 class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                 data-dismiss-target="#toast-warning" aria-label="Close">
                 <span class="sr-only">Close</span>
                 <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                 </svg>
             </button>
         </div>
     @endif
     <div
         class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
         <div class="w-full mb-1">
             <div class="mb-4">
                 <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Buku Yang Di Upload
                 </h1>
             </div>
             <div class="sm:flex space-between">
                 <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                     <form class="lg:pr-3" action="{{ route('dashboard.buku.user') }}" method="GET">
                         <label for="users-search" class="sr-only">Search</label>
                         <div class="flex items-center">
                             <input type="text" name="judul" value="{{ old('judul') }}"
                                 class="flex-1 bg-gray-50 w-[20rem] border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                 placeholder="Cari Judul Buku">
                             <select name="kategori"
                                 class="ml-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                 <option value="">Pilih Kategori</option>
                                 @foreach ($kategori as $k)
                                     <option value="{{ $k->id }}">{{ $k->kategori_buku }}</option>
                                 @endforeach
                             </select>
                             <button type="submit"
                                 class="ml-2 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800">
                                 Cari
                             </button>
                         </div>
                     </form>
                 </div>

                 <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                     <!-- Tombol Tambah -->
                     <div class="relative inline-block text-left">
                         <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                             class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800"
                             id="dropdownButton" aria-expanded="true" aria-haspopup="true">
                             <svg class="w-5 h-5 mr-2 -ml-1 transition-transform duration-300" id="plusIcon"
                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd"
                                     d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                     clip-rule="evenodd"></path>
                             </svg>
                             Tambah
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="flex flex-col">
         <div class="overflow-x-auto w-full-sm">
             <div class="inline-block min-w-full align-middle">
                 <div class="overflow-hidden shadow">
                     <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                         <thead class="bg-gray-100 dark:bg-gray-700">
                             <tr>
                                 <th scope="col" class="p-4 text-l font-medium text-center text-gray-500 uppercase">
                                     #
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-m font-medium text-left text-gray-500 dark:text-gray-400">
                                     Sampul Buku
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-m font-medium text-left text-gray-500 dark:text-gray-400">
                                     Judul Buku
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-m font-medium text-gray-500 dark:text-gray-400 text-left">
                                     Kategori Buku
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-m font-medium text-gray-500 dark:text-gray-400 text-left">
                                     Jumlah Buku
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-m font-medium text-gray-500 dark:text-gray-400 text-left">
                                     Deskripsi
                                 </th>
                                 <th scope="col"
                                     class="p-4 text-m font-medium text-gray-500 dark:text-gray-400 text-center">
                                     Aksi
                                 </th>
                             </tr>
                         </thead>
                         <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                             @forelse($buku as $b)
                                 <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                     <td class="w-4 p-4">
                                         <div
                                             class="max-w-sm p-4 overflow-hidden text-base font-medium text-gray-900 truncate xl:max-w-xs dark:text-white">
                                             {{ $loop->iteration }}
                                         </div>
                                     </td>
                                     <td class="w-4 p-4">
                                         <div
                                             class="max-w-sm p-4 overflow-hidden text-base font-medium text-gray-900 truncate xl:max-w-xs dark:text-white">
                                             <img src="{{ $b->cover_buku ? asset('storage/' . $b->cover_buku) : asset('/img/default-profile.png') }}"
                                                 class="img-fluid" style="max-width: 50px; cursor: pointer">
                                         </div>
                                     </td>

                                     <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         {{ $b->judul_buku }}
                                     </td>
                                     <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         {{ $b->kategori->kategori_buku }}

                                     </td>
                                     <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         {{ $b->jumlah_buku }}

                                     </td>
                                     <td class="p-4 text-base font-medium text-gray-900 whitespace-normal dark:text-white">
                                         @php
                                             $wordLimit = 6;
                                             $words = explode(' ', $b->deskripsi);
                                         @endphp

                                         @if (count($words) > $wordLimit)
                                             <span class="short-description block whitespace-pre-wrap">
                                                 {{ implode(' ', array_slice($words, 0, $wordLimit)) }}...
                                             </span>
                                             <span class="full-description hidden whitespace-pre-wrap">
                                                 {{ $b->deskripsi }}
                                             </span>
                                             <button onclick="toggleDescription(this)"
                                                 class="text-blue-500 hover:underline mt-2">
                                                 Lihat lebih lengkap
                                             </button>
                                         @else
                                             <span class="block whitespace-pre-wrap">{{ $b->deskripsi }}</span>
                                         @endif
                                     </td>
                                     <td class="p-4 space-x-2 whitespace-nowrap text-center">
                                         <button data-modal-target="buku-modal-{{ $b->id }}"
                                             data-modal-toggle="buku-modal-{{ $b->id }}" type="button"
                                             data-modal-toggle="delete-user-modal-3"
                                             class=" inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                                             <i class="fa-solid fa-eye"></i>
                                         </button>
                                         @if ((Auth::check() && Auth::user()->id == $b->user_id) || Auth::user()->role == 'admin')
                                             <button data-modal-target="edit-modal-{{ $b->id }}"
                                                 data-modal-toggle="edit-modal-{{ $b->id }}" type="button"
                                                 data-modal-toggle="delete-user-modal-3"
                                                 class=" inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-500 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900">
                                                 <i class="fa-solid fa-pen"></i>
                                             </button>

                                             <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                 type="button" data-modal-toggle="delete-user-modal-3"
                                                 class=" inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900">

                                                 <i class="fa-solid fa-trash"></i>
                                             </button>
                                         @endif
                                     </td>
                                 </tr>
                                 <x-modal.buku.modalDelete id='{{ $b->id }}' />
                                 <x-modal.buku.modalEditBuku :kategori='$kategori' :buku='$bukuEdit[$b->id]' />
                                 <x-modal.buku.modalLihatBuku :buku='$bukuEdit[$b->id]' />
                             @empty
                                 <tr>
                                     <td colspan="7" class="p-4 text-center text-gray-500 dark:text-gray-400">
                                         Tidak ada data ditemukan
                                     </td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>

     </div>
     </div>
     </div>

     <div
         class=" my-4 sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
         <div class="flex items-center mb-4 sm:mb-0">
             <a href=""
                 class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                 <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                         d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                         clip-rule="evenodd"></path>
                 </svg>
             </a>
             <a href=""
                 class="inline-flex justify-center p-1 mr-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                 <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                         d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                         clip-rule="evenodd"></path>
                 </svg>
             </a>
             <span class="text-sm font-normal text-gray-500 dark:bg-red-600">
                 Showing
                 <span class="font-semibold text-gray-900 dark:text-white"></span>-
                 <span class="font-semibold text-gray-900 dark:text-white"></span>
                 of
                 <span class="font-semibold text-gray-900 dark:text-white"></span>
             </span>

         </div>
         <div class="flex items-center space-x-3">
             <a href=""
                 class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                 <svg class="w-5 h-5 mr-1 -ml-1"" fill=" currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                         d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                         clip-rule="evenodd"></path>
                 </svg>
                 Previous
             </a>
             <a href=""
                 class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                 Next
                 <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                         d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                         clip-rule="evenodd"></path>
                 </svg>
             </a>
         </div>
     </div>
     </div>
     </div>

     <x-modal.buku.modalCreateBuku :kategori='$kategori' />
 @endsection

 <script>
     function toggleDescription(button) {
         const shortDescription = button.previousElementSibling.previousElementSibling;
         const fullDescription = button.previousElementSibling;

         if (fullDescription.classList.contains('hidden')) {
             shortDescription.classList.add('hidden');
             fullDescription.classList.remove('hidden');
             button.textContent = 'Lihat lebih sedikit';
         } else {
             shortDescription.classList.remove('hidden');
             fullDescription.classList.add('hidden');
             button.textContent = 'Lihat lebih lengkap';
         }
     }
 </script>
