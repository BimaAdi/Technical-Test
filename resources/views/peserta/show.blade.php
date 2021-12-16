@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laporan Peserta</div>

                <div class="card-body">
                    <div>Nama: {{ $peserta->nama}}</div>
                    <div>Email: {{ $peserta->email}}</div>
                    <table class="table table-bordered" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th scope="col">Aspek</th>
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                <th scope="col">5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col">Aspek Intelegensi</td>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($aspekIntelegensi == $i)
                                        <td scope="col">v</td>
                                    @else
                                        <td scope="col"></td>
                                    @endif
                                @endfor
                            </tr>
                            <tr>
                                <td scope="col">Aspek Numerical Ability</td>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($aspekNumericalAbility == $i)
                                        <td scope="col">v</td>
                                    @else
                                        <td scope="col"></td>
                                    @endif
                                @endfor
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-link" href="{{ route('peserta.index') }}">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection