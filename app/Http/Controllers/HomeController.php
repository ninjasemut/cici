<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $rooms = Ruangan::with('facilities', 'booking')->get();
    return view('pages.user.index', compact('rooms'));
  }
}
