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

                        <!-- Diğer gerekli alanları buraya ekleyin -->
                        <button type="submit">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection