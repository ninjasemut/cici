@extends('layouts.admin')
@section('main')
  <section class="flex flex-col gap-4 container">
    <div class="flex gap-3 items-center bg-gray-50 p-3 rounded">
      <i class="fa-solid fa-user"></i>
      <h1>Berikut data Booking Hari ini!</h1>
    </div>
     <!-- Tampilkan pesan dengan status "success" -->
     @if (session('success'))
     <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
       {{ session('success') }}
     </div>
   @endif
   
   <!-- Tampilkan pesan dengan status "error" -->
   @if (session('error'))
     <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
       {{ session('error') }}
     </div>
   @endif
    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500 rounded">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 rounded">
          <tr>
            <th scope="col" class="px-6 py-3">
              #
            </th>
            <th scope="col" class="px-6 py-3">
              Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
              Nama
            </th>
            <th scope="col" class="px-6 py-3">
              Ruangan
            </th>
            <th scope="col" class="px-6 py-3">
              Jam Mulai
            </th>
            <th scope="col" class="px-6 py-3">
              Jam Selesai
            </th>
            <th scope="col" class="px-6 py-3">
              Jumlah Orang
            </th>
            <th scope="col" class="px-6 py-3">
              Agenda
            </th>
            <th scope="col" class="px-6 py-3">
              Makanan
            </th>
            <th scope="col" class="px-6 py-3">
              Minuman
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bookings as $book)
            <tr class="bg-white border-b font-medium text-gray-900">
              <td class="px-6 py-4">
                {{ $loop->iteration }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $book->tanggal }}
              </td>
              <td class="px-6 py-4">
                {{ $book->nama }}
              </td>
              <td class="px-6 py-4">
                {{ $book->ruangan->nama_ruangan }}
              </td>
              <td class="px-6 py-4">
                {{ $book->jam_mulai }}
              </td>
              <td class="px-6 py-4">
                {{ $book->jam_selesai }}
              </td>
              <td class="px-6 py-4">
                {{ $book->jumlah }}
              </td>
              <td class="px-6 py-4">
                {{ $book->agenda }}
              </td>
              <td class="px-6 py-4">
                {{ $book->makanan->nama ?? '-' }}
              </td>
              <td class="px-6 py-4">
                {{ $book->minuman->nama ?? '-' }}
              </td>
              <td class="px-6 py-4">
                {{ $book->status }}
              </td>
              <td class="px-6 py-4 gap-2">
                <a href="{{ route('admin.book.edit', $book->id) }}"
                  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 " style="margin-bottom: 12px !important; display:inline-block;">
                  <i class="fa-solid fa-pen-to-square"></i></a>
               <form action="{{ route('admin.book.destroy', $book->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit"
                   class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm p-2" style="margin-bottom: 12px !important; display:inline-block;">
                   <i class="fa-solid fa-trash-can"></i>
                </button>
             </form>
                
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
@endsection
