<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Makanan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['create', 'store']]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $bookings = Booking::all();
    foreach ($bookings as $booking) {
      $makanan = Makanan::where('id', $booking->id_makanan)->first();
      $minuman = Makanan::where('id', $booking->id_minuman)->first();

      $booking->makanan = $makanan;
      $booking->minuman = $minuman;
  }
    return view('pages.admin.book', compact('bookings'));
  }

  public function home()
  {
    $bookings = Booking::all();

    foreach ($bookings as $booking) {
        $makanan = Makanan::where('id', $booking->id_makanan)->first();
        $minuman = Makanan::where('id', $booking->id_minuman)->first();

        $booking->makanan = $makanan;
        $booking->minuman = $minuman;
    }

    return view('pages.admin.home', compact('bookings'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $ruangan = Ruangan::all();
    $makanan = Makanan::where('kategori', 'makanan')->get();
    $minuman = Makanan::where('kategori', 'minuman')->get();
    return view('pages.user.booking', compact('ruangan','makanan','minuman'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreBookingRequest $request)
  {
    $data = $request->validated();
    // Menambahkan id_makanan dan id_minuman ke dalam array atribut
    $data['id_makanan'] = $request->input('id_makanan');
    $data['id_minuman'] = $request->input('id_minuman');
    Booking::create($data);
    return redirect()->route('user.home');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Booking  $booking
   * @return \Illuminate\Http\Response
   */
  public function show(Booking $booking)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Booking  $booking
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $booking = Booking::find($id);
      $makanans = Makanan::where('kategori', 'makanan')->get();
      $minumans = Makanan::where('kategori', 'minuman')->get();
      if (!$booking) {
          return redirect()->route('admin.book.index')->with('error', 'Data booking tidak ditemukan.');
      }
  
      $ruangan = Ruangan::all(); // Ambil data ruangan
  
      return view('pages.admin.book.edit', compact('booking', 'ruangan','makanans','minumans'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Booking  $booking
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $booking)
{
  $data = $request->all();
    // Menambahkan id_makanan dan id_minuman ke dalam array atribut
    $data['id_makanan'] = $request->input('id_makanan');
    $data['id_minuman'] = $request->input('id_minuman');
  $sukses=Booking::findOrFail($booking)->update($data);
  if($sukses){
    return redirect()->route('admin.booking.index')->with('success', 'Data booking berhasil diperbarui.');
  }
}

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Booking  $booking
   * @return \Illuminate\Http\Response
   */
  public function destroy(Booking $booking)
{
    $booking->delete();
    return redirect()->route('admin.booking.index')->with('success', 'Data booking berhasil dihapus.');
  }
}
