@extends('layouts.admin')
@section('main')
  <section class="flex flex-col gap-4 container">
    <div class="flex gap-3 items-center justify-between bg-gray-50 p-3 rounded">
      <div class="flex gap-2 items-center">
        <i class="fa-solid fa-door-open"></i>
        <h1>Ini adalah daftar ruangan yang tersedia!</h1>
      </div>
      <a href="{{ route('room.create') }}" class="outline-none no-underline">
        <button
          class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
          <i class="fa-solid fa-plus mr-3"></i> Input Ruangan
        </button>
      </a>
    </div>
    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500 rounded">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 rounded">
          <tr>
            <th scope="col" class="px-6 py-3">
              #
            </th>
            <th scope="col" class="px-6 py-3">
              Nama Ruangan
            </th>
            <th scope="col" class="px-6 py-3">
              Fasilitas Ruangan
            </th>
            <th scope="col" class="px-6 py-3">
              Kapasitas Ruangan
            </th>
            <th scope="col" class="px-6 py-3">
              Status Ruangan
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rooms as $room)
            <tr class="bg-white border-b font-medium text-gray-900">
              <td class="px-6 py-4">
                {{ $loop->iteration }}
              </td>
              <td class="px-6 py-4 ">
                {{ $room->nama_ruangan }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @foreach ($room->facilities as $facility)
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">
                    {{ $facility->name }}
                  </span>
                @endforeach
              </td>
              <td class="px-6 py-4">
                {{ $room->kapasitas }}
              </td>
              <td class="px-6 py-4">
                {{ $room->status }}
              </td>
              <td class="px-6 py-4 flex flex-col gap-2">
                <a href="{{ route('room.edit', $room->id) }}" class="no-underline">
                  <button type="button"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 w-full">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                </a>
                <form action="{{ route('room.destroy', $room->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="_method" value="DELETE" class="d-none">
                  <button type="submit"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm p-2 w-full">
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
