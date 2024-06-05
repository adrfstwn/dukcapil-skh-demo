@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $persyaratan->judul }}</div>

                    <div class="card-body">
                        <p>{{ $persyaratan->created_at }}</p>
                        <img src="{{ asset('storage/' . $persyaratan->gambar) }}" alt="Foto Kegiatan Karyawan" class="rounded-sm">
                        <p>{{ $persyaratan->deskripsi_detail_persyaratan }}</p>
                        <a href="#" class="btn btn-primary">Klik disini untuk lebih lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
