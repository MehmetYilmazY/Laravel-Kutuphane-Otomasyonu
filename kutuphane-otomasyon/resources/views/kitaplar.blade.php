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
                <th>Kimde</th>
                <th>Düzenle</th>
                <th>Sil</th>

            </tr>
        </thead>
        <tbody>
            @foreach($kitaplar as $kitap)
            <tr>
                <td>{{ $kitap->id }}</td>
                <td>{{ $kitap->kitap_adi }}</td>
                <td>{{ $kitap->kitap_yazar }}</td>
                <td>{{ $kitap->kitap_ISBN }}</td>
                <td>{{ $kitap->kitap_kimde }}</td>
                <td><a href="{{ route('kitap.edit', $kitap->id) }}" class="btn btn-primary">Düzenle</a></td>
                <td><form action="{{ route('kitap.destroy', $kitap->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
