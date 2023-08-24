@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2>Kütüphane Üyeleri</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ad Soyad</th>
                <th>İrtibat No</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uyeler as $uye)
            <tr>
                <td>{{ $uye->id }}</td>
                <td>{{ $uye->Ad_Soyad }}</td>
                <td>{{ $uye->irtibat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
