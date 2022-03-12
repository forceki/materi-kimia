<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class HomeController extends Controller
{
    public function index(){
        $materi = Materi::latest('id')->get();
        return view('index',compact('materi'));
    }

    public function view($id){
        $materiId = Materi::find($id);
        $materiAll = Materi::latest('id')
                            ->where([
                                ['id', '!=',$id],
                                ])->take(10)->get();

        $tanggal = $materiId->tanggal->format('M d Y');
        return view('view', compact('materiId','tanggal','materiAll'));
    }
}
