@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kitap Ekle') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    
                    

                    <form action="{{ route('kitap.store') }}" method="POST">
                        @csrf
                        <input type="text" name="kitap_adi" placeholder="Kitap Adı">
                        <input type="text" name="kitap_yazar" placeholder="Kitap Yazarı">
                        <input type="text" name="kitap_ISBN" placeholder="ISBN Kodu">                     
                        <!-- Diğer gerekli alanları buraya ekleyin -->
                        <button type="submit">Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
