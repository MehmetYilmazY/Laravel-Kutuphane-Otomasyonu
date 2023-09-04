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
                    <th>Kitap ISBN</th>
                    <th>Kitap Sahibi</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ($envanter as $satilikKitap)
                <tr>
                    <td>{{ $satilikKitap->id }}</td>
                    <td>{{ $satilikKitap->satilik->kitap_adi }}</td>
                    <td>{{ $satilikKitap->satilik->kitap_yazar }}</td>
                    <td>{{ $satilikKitap->satilik->kitap_ISBN }}</td>
                    <td>{{ $satilikKitap->user->name }}</td>


                </tr>
            @endforeach
            
                
            </tbody>
        </table>
    @else
        <p>Envanteriniz boş.</p>
    @endif
</div>
@endsection
