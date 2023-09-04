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
                <th>Kimde</th>
                @if (auth()->user()->usertype === 'admin')
                    <th>Düzenle</th>
                    <th>Sil</th>
                @endif
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
                    @if (auth()->user()->usertype === 'admin')
                        <td>
                            <a href="{{ route('kitap.edit', $kitap->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                        </td>
                        <td>
                            <form action="{{ route('kitap.destroy', $kitap->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
