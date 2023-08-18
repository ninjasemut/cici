@extends('layouts.main')
@section('content')
  <section class="flex flex-col gap-8 px-16">
    <form action="{{ route('booking.store') }}" method="POST" class="bg-white p-3 rounded-md">
      @csrf
      <h1 class="text-lg font-semibold mb-6">Booking Ruangan</h1>
      <div class="mb-6">
        <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">
          Tanggal
        </label>
        <input type="date" id="tanggal" name="tanggal"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>
      <div class="mb-6">
        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
          Nama
        </label>
        <input type="text" id="text" name="nama"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>
      <div class="mb-6">
        <label for="ruangan" class="block mb-2 text-sm font-medium text-gray-900">
          Ruangan
        </label>
        <select data-placeholder="Pilih Ruangan" id="ruangan" name="ruangan_id"
          class="single-select-field bg-gray-50 border block w-full p-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500">
          <option selected>Pilih Ruangan</option>
          @foreach ($ruangan as $item)
            <option value="{{ $item->id }}">{{ $item->nama_ruangan }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-6">
        <label for="start" class="block mb-2 text-sm font-medium text-gray-900">
          Jam Mulai
        </label>
        <input type="time" id="start" name="jam_mulai"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>
      <div class="mb-6">
        <label for="end" class="block mb-2 text-sm font-medium text-gray-900">
          Jam Selesai
        </label>
        <input type="time" id="end" name="jam_selesai"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>
      <div class="mb-6">
        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900">
          Jumlah Orang
        </label>
        <input type="number" id="jumlah" name="jumlah"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>
      <div class="mb-6">
        <label for="event" class="block mb-2 text-sm font-medium text-gray-900">
          Agenda
        </label>
        <input type="text" id="event" name="agenda"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>
      
      <!-- Optional Select for Makanan -->
      <h1 class="text-lg font-semibold mb-6">Konsumsi</h1>

      <div class="mb-6">
        <label for="makanan" class="block mb-2 text-sm font-medium text-gray-900">
          Pilih Makanan
        </label>

        {{-- <select id="makanan" name="id_makanan"
          class="single-select-field bg-gray-50 border block w-full p-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500">
          <option value="">Tidak Memilih</option>
          @foreach ($makanan as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
          @endforeach
        </select> --}}

        @foreach ($makanan as $item)
          <div class="flex items-center mb-4">
            <input id="ac" type="checkbox" name="fasilitas[]" value="{{ $item->id }}"
              class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
            <label for="ac" class="ml-2 text-sm font-medium text-gray-900">{{ $item->nama }}</label>
          </div>
        @endforeach
      </div>
      <div class="mb-6">
        <label for="event" class="block mb-2 text-sm font-medium text-gray-900">
         Masukan Jumlah
        </label>
        <input type="text" id="event" name="agenda"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>

      <!-- Optional Select for Minuman -->
      <div class="mb-6">
        <label for="minuman" class="block mb-2 text-sm font-medium text-gray-900">
          Pilih Minuman
        </label>
        {{-- <select id="minuman" name="id_minuman"
          class="single-select-field bg-gray-50 border block w-full p-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500">
          <option value="">Tidak Memilih</option>
          @foreach ($minuman as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
          @endforeach
        </select> --}}

        @foreach ($minuman as $item)
        <div class="flex items-center mb-4">
          <input id="ac" type="checkbox" name="fasilitas[]" value="{{ $item->id }}"
            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
          <label for="ac" class="ml-2 text-sm font-medium text-gray-900">{{ $item->nama }}</label>
        </div>
      @endforeach
      </div>
      <div class="mb-6">
        <label for="event" class="block mb-2 text-sm font-medium text-gray-900">
         Masukan Jumlah
        </label>
        <input type="text" id="event" name="agenda"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>
      <button type="submit"
        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Submit
      </button>
    </form>
  </section>
@endsection
