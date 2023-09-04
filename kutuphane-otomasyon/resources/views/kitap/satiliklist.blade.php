@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Kitaplar</h2>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kitap Adı</th>
                <th>Kitap Yazarı</th>
                <th>ISBN Kodu</th>
                <th>Stok</th>
                <th>Fiyat (₺)</th>
                <th>Satın Al</th>
            </tr>
        </thead>
        <tbody>
            @foreach($satiliklar as $satilik)
    <tr>
        <td>{{ $satilik->id }}</td>
        <td>{{ $satilik->kitap_adi }}</td>
        <td>{{ $satilik->kitap_yazar }}</td>
        <td>{{ $satilik->kitap_ISBN }}</td>
        <td>{{ $satilik->kitap_stok }}</td>
        <td>{{ $satilik->kitap_fiyat }} ₺</td>
        <td>
            <form action="{{ route('kitap.satinAl', $satilik->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Satın Al</button>
            </form>
                     
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
</div>
@endsection
