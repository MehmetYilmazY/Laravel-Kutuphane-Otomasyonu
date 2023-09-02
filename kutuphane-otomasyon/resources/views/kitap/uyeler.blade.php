@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (auth()->user()->usertype === 'admin')

    <h2 class="mt-4">Kütüphane Üyeleri</h2>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ad Soyad</th>
                <th>İrtibat Numarası</th>
                <th>Hesap Oluşturma Tarihi</th>
                <th>Düzenle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uyeler as $uye)
                <tr>
                    <td>{{ $uye->id }}</td>
                    <td>{{ $uye->name }}</td>
                    <td>{{ $uye->irtibat }}</td>
                    <td>{{ $uye->created_at }}</td>
                    <td>
                        <a href="{{ route('kitap.uyeEdit', $uye->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-danger" role="alert">
        Bu sayfayı görüntülemek için yetkiniz yok.
    </div>
    @endif
</div>

@endsection
