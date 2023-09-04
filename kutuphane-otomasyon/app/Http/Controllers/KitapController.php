<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kitap;
use App\Models\Insan;
use App\Models\satilik;
use App\Models\SatilikKitap;
use App\Models\User;



class KitapController extends Controller
{


    
    public function create()
    {
     
        if (auth()->user()->usertype === 'admin') {
        return view('kitap.create');
    } else {
        abort(403); // Yetki yoksa hata sayfasına yönlendirme
    }
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
        if (auth()->user()->usertype === 'admin') {
            // Sadece admin yetkisi olan kullanıcılar bu sayfayı görüntüleyebilir.
            $uyeler = Insan::all();
            return view('kitap.uyeler', compact('uyeler'));
        } else {
            abort(403); // Yetki yoksa hata sayfasına yönlendirme
        }
        
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
    if (auth()->user()->usertype === 'admin') {
    return view('kitap.satilik');
} else {
    abort(403); // Yetki yoksa hata sayfasına yönlendirme
}
}

public function satilikStore(Request $request)
{
$validatedData = $request->validate([
    'kitap_adi' => 'required',
    'kitap_yazar' => 'required',
    'kitap_ISBN' => 'required',    
    'kitap_stok' => 'required',    
    'kitap_fiyat' => 'required'    

]);
    satilik::create($validatedData);

    return redirect()->route('kitap.satilik')
        ->with('success', 'Kitap başarıyla listelendi.');
}

public function satilikList()
{
    $satiliklar = satilik::all();
    return view('kitap.satiliklist', compact('satiliklar'));
}


public function uyeEdit($id)
{
    $user = Insan::findOrFail($id); // Tekil bir kullanıcı nesnesi çekin
    $insanlar = Insan::all();

    return view('kitap.uye_edit', compact('user', 'insanlar')); // $users yerine $user kullanın
}

public function uyeUpdate(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'irtibat' => 'required',
        'usertype' => 'required',
    ]);

    Insan::where('id', $id)->update($validatedData);

    return redirect()->route('kitap.uyeler')->with('success', 'Üye başarıyla güncellendi.');
}

public function satinAl($id)
{
    $kitap = satilik::find($id);

    if ($kitap && $kitap->kitap_stok > 0) {
        // Kitap stokta mevcutsa ve stok değeri sıfırdan büyükse
        // Stok değerini azalt
        $kitap->kitap_stok -= 1;
        $kitap->save();

        if (auth()->check()) {
            $kullanici = auth()->user();
            // Kullanıcının envanterine kitabı ekle
            $kullanici->envanter()->attach($kitap->id);
        }

        return redirect()->back()->with('success', 'Kitap başarıyla satın alındı.');
    } 
    else {
        return redirect()->back()->with('error', 'Kitap satın alınamadı. Stokta Yok!');
    }
}


public function envanter()
{
    $kullaniciId = auth()->user()->id;

    // Kullanıcının kendi envanterini alın
    $envanter = SatilikKitap::whereHas('user', function ($query) use ($kullaniciId) {
        $query->where('id', $kullaniciId);
    })->get();

    return view('kullanici.envanter', compact('envanter'));
}

    
}