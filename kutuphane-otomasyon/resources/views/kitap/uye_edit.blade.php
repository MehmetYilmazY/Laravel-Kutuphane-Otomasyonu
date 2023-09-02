@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kitap Düzenle') }}</div>

                <div class="card-body">
                    <form action="{{ route('kitap.uyeUpdate', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Ad Soyad:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-posta:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="irtibat">İrtibat Numarası:</label>
                            <input type="text" name="irtibat" id="irtibat" class="form-control" value="{{ $user->irtibat }}">
                        </div>

                        <div class="form-group">
                            <label for="usertype">Kullanıcı Türü:</label>
                            <select name="usertype" id="usertype" class="form-control">
                                <option value="admin" {{ $user->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="kullanici" {{ $user->usertype === 'kullanici' ? 'selected' : '' }}>Kullanıcı</option>
                            </select>
                        </div>

                        <!-- Diğer gerekli alanları buraya ekleyin -->

                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection