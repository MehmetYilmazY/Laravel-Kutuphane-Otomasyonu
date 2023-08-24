<?php

namespace App\Http\Controllers;

use App\Models\Kitap;
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

    return redirect()->route('kitap.create')
        ->with('success', 'Kullanıcı başarıyla oluşturuldu.');
}

public function edit($id)
{
    $kitap = Kitap::findOrFail($id);
    return view('kitap.edit', compact('kitap'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'kitap_adi' => 'required',
        'kitap_yazar' => 'required',
        'kitap_ISBN' => 'required',
    ]);

    Kitap::where('id', $id)->update($validatedData);

    return redirect()->route('kitap.create')->with('success', 'Kitap başarıyla güncellendi.');
}
    public function kitaplar()
    {
        $kitaplar = Kitap::all();
        return view(' kitaplar', compact('kitaplar'));
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

}
