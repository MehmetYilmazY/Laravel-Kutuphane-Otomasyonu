<?php

namespace App\Http\Controllers;

use App\Models\Kitap;
use App\Models\Insan;
use App\Models\satilik;
use Illuminate\Http\Request;



class KitapController extends Controller
{


    
    public function create()
    {
        return view('kitap.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'kitap_adi' => 'required',
        'kitap_yazar' => 'required',
        'kitap_ISBN' => 'required',
    ],
    
    [
        'kitap_adi.required' => 'Kitap adı zorunludur.',
        'kitap_yazar.required' => 'Kitap yazarı zorunludur.',
        'kitap_ISBN.required' => 'ISBN kodu zorunludur.',
    ]);

    Kitap::create($validatedData);

    return redirect()->route('kitap.kitaplar')
        ->with('success', 'Kullanıcı başarıyla oluşturuldu.');
}


public function kullaniciCreate()
{
    return view('kitap.kisiler');
}

public function kullaniciStore(Request $request)
{
$validatedData = $request->validate([
    'Ad_Soyad' => 'required',
    'irtibat' => 'required'    
    

]);
    Insan::create($validatedData);

    return redirect()->route('kitap.kisiler')
        ->with('success', 'Kullanıcı başarıyla oluşturuldu.');
}

public function edit($id)
{
    $kitap = Kitap::findOrFail($id);
    $insanlar = Insan::all();

    return view('kitap.edit', compact('kitap', 'insanlar'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'kitap_adi' => 'required',
        'kitap_yazar' => 'required',
        'kitap_ISBN' => 'required',
        'kitap_kimde' => 'required',

    ]);

    Kitap::where('id', $id)->update($validatedData);

    return redirect()->route('kitap.kitaplar')->with('success', 'Kitap başarıyla güncellendi.');
}
    public function kitaplar()
    {
        $kitaplar = Kitap::all();
        return view('kitaplar', compact('kitaplar'));
    }

    public function uyeler()
    {
        $uyeler = Insan::all();
        return view('kitap.uyeler', compact('uyeler'));
    }

    public function destroy($id)
{
    $kitap = Kitap::find($id);
    $kitap->delete();

    return redirect()->route('kitap.kitaplar')->with('success', 'Kitap başarıyla silindi.');
}

public function __construct()
{
    $this->middleware('auth'); 
}

public function satilikCreate()
{
    return view('kitap.satilik');
}

public function satilikStore(Request $request)
{
$validatedData = $request->validate([
    'kitap_adi' => 'required',
    'kitap_yazar' => 'required',
    'kitap_ISBN' => 'required',    

]);
    satilik::create($validatedData);

    return redirect()->route('kitap.satilik')
        ->with('success', 'Kullanıcı başarıyla oluşturuldu.');
}

public function satilikList()
{
    $satiliklar = satilik::all();
    return view('kitap.satiliklist', compact('satiliklar'));
}


}