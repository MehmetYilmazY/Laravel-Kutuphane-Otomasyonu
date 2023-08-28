@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2>Kitaplar</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kitap Adı</th>
                <th>Kitap Yazarı</th>
                <th>ISBN Kodu</th>
                <th>Stok</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
