@extends('layouts.admin')
@section('main')
  <section class="flex flex-col gap-4 container">
    <h1 class="text-xl font-semibold">Input Ruangan</h1>
    <hr>
    <form method="POST" action="{{ route('room.store') }}" class="flex flex-col gap-6">
      @csrf
      <div>
        <label for="room_name" class="block mb-2 text-sm font-medium text-gray-900">
          Nama Ruangan
        </label>
        <input type="text" id="room_name" name="nama_ruangan"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-1/2 p-2.5"
          placeholder="Ruangan 1" required>
      </div>
      <div>
        <label for="room_capacity" class="block mb-2 text-sm font-medium text-gray-900">
          Kapasitas Ruangan
        </label>
        <input type="number" id="room_capacity" name="kapasitas"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-1/2 p-2.5"
          placeholder="50" required>
      </div>
      <div>
        <label for="room_facilities" class="block mb-2 text-sm font-medium text-gray-900">
          Fasilitas Ruangan
        </label>
        @foreach ($facilities as $facility)
          <div class="flex items-center mb-4">
            <input id="ac" type="checkbox" name="fasilitas[]" value="{{ $facility->id }}"
              class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
            <label for="ac" class="ml-2 text-sm font-medium text-gray-900">{{ $facility->name }}</label>
          </div>
        @endforeach
      </div>
      <div>
        <label for="room_status" class="block mb-2 text-sm font-medium text-gray-900 ">
          Status Ruangan
        </label>
        <select id="room_status" name="status" required
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-1/2 p-2.5">
          <option value="Baik">Baik</option>
          <option value="Renovasi">Renovasi</option>
        </select>
      </div>
      <div>
        <button type="submit"
          class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
          Submit
        </button>
      </div>
    </form>
  </section>
@endsection
