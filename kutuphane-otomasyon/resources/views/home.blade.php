@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kütüphane Sistemi') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('kitap.create') }}" class="btn btn-primary">Yeni Kitap Ekle</a>
                    </div>
                    
                    <div class="mb-3">
                        <a href="{{ route('kitap.kitaplar') }}" class="btn btn-success">Kitapları Görüntüle</a>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
