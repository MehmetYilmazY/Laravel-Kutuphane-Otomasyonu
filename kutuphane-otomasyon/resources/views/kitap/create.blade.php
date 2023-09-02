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
                        <div class="mb-3">
                            <label for="kitap_adi" class="form-label">Kitap Adı</label>
                            <input type="text" name="kitap_adi" id="kitap_adi" class="form-control" placeholder="Kitap Adı">
                        </div>
                        <div class="mb-3">
                            <label for="kitap_yazar" class="form-label">Kitap Yazarı</label>
                            <input type="text" name="kitap_yazar" id="kitap_yazar" class="form-control" placeholder="Kitap Yazarı">
                        </div>
                        <div class="mb-3">
                            <label for="kitap_ISBN" class="form-label">ISBN Kodu</label>
                            <input type="text" name="kitap_ISBN" id="kitap_ISBN" class="form-control" placeholder="ISBN Kodu">
                        </div>
                        <!-- Diğer gerekli alanları buraya ekleyin -->
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
