@extends('layouts.admin')
@section('main')
  <section class="flex flex-col gap-4 container">
    <form action="{{ route('admin.makanan.store') }}" method="POST" class="bg-white p-3 rounded-md">
      @csrf
      <h1 class="text-lg font-semibold mb-6">Tambah Makanan Baru</h1>
      <div class="mb-6">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">
          Nama Makanan
        </label>
        <input type="text" id="nama" name="nama"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
          required>
      </div>
      <div class="mb-6">
        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">
          Kategori
        </label>
        <select id="kategori" name="kategori"
          class="single-select-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500">
          <option value="makanan">Makanan</option>
          <option value="minuman">Minuman</option>
        </select>
      </div>
      <button type="submit"
        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Tambahkan
      </button>
    </form>
  </section>
@endsection
