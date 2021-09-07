<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KarteController extends Controller
{
  public function add()
    {
      return view('admin.karte.create');
    }
  
  public function create()
    {
        return redirect('admin/karte/create');
    }

    public function edit()
    {
        return view('admin.karte.edit');
    }

    public function update()
    {
        return redirect('admin/karte/edit');
    }
}
