@extends('layouts.admin')
@section('main')
  <section class="flex flex-col gap-4 container">
    <form action="{{ route('admin.book.update', $booking->id) }}" method="POST" class="bg-white p-3 rounded-md">
      @csrf
      @method('PUT')
      <h1 class="text-lg font-semibold mb-6">Edit Booking Ruangan</h1>
      <div class="mb-6">
        <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">
          Tanggal
        </label>
        <input type="date" id="tanggal" name="tanggal"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required value="{{ $booking->tanggal }}">
      </div>
      <div class="mb-6">
        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
          Nama
        </label>
        <input type="text" id="text" name="nama"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required value="{{ $booking->nama }}">
      </div>
      <div class="mb-6">
        <label for="ruangan" class="block mb-2 text-sm font-medium text-gray-900">
          Ruangan
        </label>
        <select data-placeholder="Pilih Ruangan" id="ruangan" name="ruangan_id"
          class="single-select-field bg-gray-50 border block w-full p-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500">
          <option selected>Pilih Ruangan</option>
          @foreach ($ruangan as $item)
            <option value="{{ $item->id }}" {{ $booking->ruangan_id == $item->id ? 'selected' : '' }}>{{ $item->nama_ruangan }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-6">
        <label for="start" class="block mb-2 text-sm font-medium text-gray-900">
          Jam Mulai
        </label>
        <input type="time" id="start" name="jam_mulai"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required value="{{ $booking->jam_mulai }}">
      </div>
      <div class="mb-6">
        <label for="end" class="block mb-2 text-sm font-medium text-gray-900">
          Jam Selesai
        </label>
        <input type="time" id="end" name="jam_selesai"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required value="{{ $booking->jam_selesai }}">
      </div>
      <div class="mb-6">
        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900">
          Jumlah Orang
        </label>
        <input type="number" id="jumlah" name="jumlah"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required value="{{ $booking->jumlah }}">
      </div>
      <div class="mb-6">
        <label for="event" class="block mb-2 text-sm font-medium text-gray-900">
          Agenda
        </label>
        <input type="text" id="event" name="agenda"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required value="{{ $booking->agenda }}">
      </div>
      <div class="mb-6">
        <label for="makanan" class="block mb-2 text-sm font-medium text-gray-900">
          Makanan
        </label>
        <select id="makanan" name="id_makanan"
          class="single-select-field bg-gray-50 border block w-full p-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500">
          <option value="" selected>Pilih Makanan</option>
          @foreach ($makanans as $makanan)
            <option value="{{ $makanan->id }}" {{ $booking->id_makanan == $makanan->id ? 'selected' : '' }}>{{ $makanan->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-6">
        <label for="minuman" class="block mb-2 text-sm font-medium text-gray-900">
          Minuman
        </label>
        <select id="minuman" name="id_minuman"
          class="single-select-field bg-gray-50 border block w-full p-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500">
          <option value="" selected>Pilih Minuman</option>
          @foreach ($minumans as $minuman)
            <option value="{{ $minuman->id }}" {{ $booking->id_minuman == $minuman->id ? 'selected' : '' }}>{{ $minuman->nama }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit"
        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Update
      </button>
    </form>
  </section>
@endsection
