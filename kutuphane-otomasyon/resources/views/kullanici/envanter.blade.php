@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Envanter</h2>
    @if($envanter !== null && count($envanter) > 0)
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kitap Adı</th>
                    <th>Kitap Yazarı</th>
                </tr>
            </thead>
            <tbody>
                @foreach($envanter as $kitap)
                    <tr>
                        <td>{{ $kitap->id }}</td>
                        <td>{{ $kitap->kitap_adi }}</td>
                        <td>{{ $kitap->kitap_yazar }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    @else
        <p>Envanteriniz boş.</p>
    @endif
</div>
@endsection
