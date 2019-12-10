@extends('layout.base')
@section('title', 'Kecilkan Ukuran Foto')
@section('content')
<div class="container my-5">
    <h1 class='mb-5'>
        <i class='fa fa-icon'></i>
        Kecilkan Ukuran Foto / Gambar
        <p class="lead">
            Untuk Segala Macam Kebutuhan Seperti Foto PNS / Registrasi Mahasiswa dan Lain-Lain
        </p>
    </h1>

    <div class="card">
        <div class="card-body">
            <form
                method='POST'
                action='{{ route('image-size-reducement.store') }}'
                enctype="multipart/form-data"
                >
                @csrf

                <div class='form-group'>
                    <label for='image'>
                         Gambar:
                    </label>

                    <input
                        id='image'
                        name='image'
                        type='file'
                        placeholder='Gambar'
                        class='form-control {{ $errors->has('image') ? 'is-invalid' : '' }}'>

                    <div class='invalid-feedback'>
                        {{ $errors->first('image') }}
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">
                        Upload dan Kecilkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
