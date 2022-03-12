<?php
namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function index() {
        $materi = Materi::latest('id')->get();
        return view('cms.materi.index',compact('materi'));
    }

    public function create(){
        return view('cms.materi.create');
    }

    public function Add(Request $request){
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tanggal'=>'required',
            'foto' => 'required',
            'guru' => 'required',  
        ]);


        $image = $request->file('foto');
       
        if($image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = public_path('/assets/image/');
            $path = 'assets/image/';
            $last_img = $path.$img_name;
            $image->move($up_location, $img_name);
            Materi::insert([
                    'judul' => $request->judul,
                    'isi' => $request->isi,
                    'tanggal' => $request->tanggal,
                    'path_image' => $last_img,
                    'guru' => $request->guru
                ]);
        }else{
            Materi::insert([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'guru' => $request->guru
            ]);
        }

        return redirect('/admin/materi')->with('success', ' insert success');
    }


    public function Delete($id)
    {
        $materi = Materi::find($id);
        $old_image = $materi->path_image;

        unlink($old_image);

        Materi::find($id)->delete();

        return Redirect('/admin/materi')->with('success', 'delete success');
    }
}
