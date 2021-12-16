@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Peserta</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('peserta.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('email') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autofocus>

                                @error('nama')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nilai_X" class="col-md-4 col-form-label text-md-right">Nilai X</label>

                            <div class="col-md-6">
                                <input id="nilai_X" type="number" class="form-control @error('email') is-invalid @enderror" name="nilai_X" value="{{ old('nilai_X') }}" required autofocus>

                                @error('nilai_X')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nilai_Y" class="col-md-4 col-form-label text-md-right">Nilai Y</label>

                            <div class="col-md-6">
                                <input id="nilai_Y" type="number" class="form-control @error('email') is-invalid @enderror" name="nilai_Y" value="{{ old('nilai_Y') }}" required autofocus>

                                @error('nilai_Y')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nilai_Z" class="col-md-4 col-form-label text-md-right">Nilai Z</label>

                            <div class="col-md-6">
                                <input id="nilai_Z" type="number" class="form-control @error('email') is-invalid @enderror" name="nilai_Z" value="{{ old('nilai_Z') }}" required autofocus>

                                @error('nilai_Z')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nilai_W" class="col-md-4 col-form-label text-md-right">Nilai W</label>

                            <div class="col-md-6">
                                <input id="nilai_W" type="number" class="form-control @error('email') is-invalid @enderror" name="nilai_W" value="{{ old('nilai_W') }}" required autofocus>

                                @error('nilai_W')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Buat
                                </button>

                                <a class="btn btn-link" href="{{ route('peserta.index') }}">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection