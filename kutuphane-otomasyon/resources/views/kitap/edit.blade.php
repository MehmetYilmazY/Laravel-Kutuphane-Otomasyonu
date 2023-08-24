@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kitap Düzenle') }}</div>

                <div class="card-body">
                    <form action="{{ route('kitap.update', $kitap->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="kitap_adi" placeholder="Kitap Adı" value="{{ $kitap->kitap_adi }}">
                        <input type="text" name="kitap_yazar" placeholder="Kitap Yazarı" value="{{ $kitap->kitap_yazar }}">
                        <input type="text" name="kitap_ISBN" placeholder="ISBN Kodu" value="{{ $kitap->kitap_ISBN }}">

                         <!-- Dropdown listesi için select etiketi -->
                         <select name="kitap_kimde">
                            @foreach ($insanlar as $insan)
                                <option value="{{ $insan->Ad_Soyad }}" {{ $insan->Ad_Soyad == $kitap->Ad_Soyad ? 'selected' : '' }}>
                                    {{ $insan->Ad_Soyad }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Diğer gerekli alanları buraya ekleyin -->
                        <button type="submit">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection