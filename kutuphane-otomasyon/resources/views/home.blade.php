@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card text-center ">
                <div class="card-header">{{ __('Kütüphane Sistemi') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('kitap.create') }}" class="btn btn-outline-primary btn-lg btn-block">Yeni Kitap Ekle</a>
                    </div>
                    
                    <div class="mb-3">
                        <a href="{{ route('kitap.kitaplar') }}" class="btn btn-outline-primary btn-lg btn-block">Kitapları Görüntüle</a>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('kitap.kisiler') }}" class="btn btn-outline-danger btn-lg btn-block">Üyeleri Ekle</a>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('kitap.uyeler') }}" class="btn btn-outline-danger btn-lg btn-block">Üyeleri Görüntüle</a>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
