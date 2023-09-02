@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kişi Ekle') }}</div>

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
                    
                    

                    <form action="{{ route('kitap.kullaniciStore') }}" method="POST">
                        @csrf
                        <input type="text" name="Ad_Soyad" placeholder="Ad Soyad">
                        <input type="text" name="irtibat" placeholder="İrtibat Numarası">  
                        <input type="email" name="email" placeholder="E-Posta">
                        <input type="password" name="password" placeholder="Şifre">
                        <!-- Diğer gerekli alanları buraya ekleyin -->
                        <button type="submit">Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
