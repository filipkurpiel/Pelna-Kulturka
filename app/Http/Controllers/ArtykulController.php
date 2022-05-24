<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artykul;
use App\Models\User;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\Http;

class ArtykulController extends Controller
{

        //Wyświetl snippet artykułu na stronie głównej
        public function pokazsnippet()
        {
            $snippet= Artykul::all();
            return view('index', compact('snippet'));
        }

        //Wyświetl pojedyńczy post
        public function pokazartykul($id)
        {
            $artykulData= Artykul::all()
            ->where('id', '=', $id);
            return view('artykul', compact('artykulData'));
        }    

        // Stwórz artykuł
        public function ZapiszArtykul(Request $request)
        {
            $data= new Artykul();
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('img'), $filename);
            $data['image']= $filename;
            $data['tytul']=$request->tytul;
            $data['autor']=$request->autor;
            $data['zawartosc']=$request->zawartosc;
            $data->save();

                return back()->with("Sukces", "Artykuł dodany");
            
        }
}