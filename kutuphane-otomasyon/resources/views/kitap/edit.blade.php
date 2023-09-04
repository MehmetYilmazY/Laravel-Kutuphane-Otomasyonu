@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kitap Düzenle') }}</div>

                <div class="card-body">
                    <form action="{{ route('kitap.update', $kitap->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kitap_adi">Kitap Adı</label>
                            <input type="text" class="form-control" id="kitap_adi" name="kitap_adi" value="{{ $kitap->kitap_adi }}" placeholder="Kitap Adı">
                        </div>
                        <div class="form-group">
                            <label for="kitap_yazar">Kitap Yazarı</label>
                            <input type="text" class="form-control" id="kitap_yazar" name="kitap_yazar" value="{{ $kitap->kitap_yazar }}" placeholder="Kitap Yazarı">
                        </div>
                        <div class="form-group">
                            <label for="kitap_ISBN">ISBN Kodu</label>
                            <input type="text" class="form-control" id="kitap_ISBN" name="kitap_ISBN" value="{{ $kitap->kitap_ISBN }}" placeholder="ISBN Kodu">
                        </div>
                        <div class="form-group">
                            <label for="kitap_kimde">Kitap Kimde</label>
                            <select class="form-control" id="kitap_kimde" name="kitap_kimde">
                                @foreach ($insanlar as $insan)
                                    <option value="{{ $insan->name }}" {{ $insan->name == $kitap->kitap_kimde ? 'selected' : '' }}>
                                        {{ $insan->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <!-- Diğer gerekli alanları buraya ekleyin -->
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
