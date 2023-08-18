@extends('layouts.main')
@section('header')
  @include('components.AdminNavbar')
@endsection
@section('content')
  <main class="bg-white p-5 rounded h-screen sm:ml-64">
    @yield('main')
  </main>
@endsection
