<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DateTesteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return response()->json([['batch_date'=> 144729364305000], ['batch_date'=> 20051116082815]]);
  }
}
