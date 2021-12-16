@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- success message -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert-peserta-index" onclick="hideSuccessMessage()">
                {{ session('success') }}
            </div>
            @endif
            <!-- error message -->
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="danger-alert-peserta-index" onclick="hideDangerMessage()">
                {{ session('error') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">Peserta</div>

                <div class="card-body">
                    <div class="flex-right">
                        <a class="btn btn-success" href="{{ route('peserta.create') }}">Tambah Peserta</a>
                    </div>
                    <!-- table -->
                    <table class="table table-bordered">
                        <caption>List peserta</caption>
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">X</th>
                                <th scope="col">Y</th>
                                <th scope="col">Z</th>
                                <th scope="col">W</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesertas as $peserta)
                            <tr>
                                <th>{{ $peserta->nama }}</th>
                                <td>{{ $peserta->email }}</td>
                                <td>{{ $peserta->nilai_X }}</td>
                                <td>{{ $peserta->nilai_Y }}</td>
                                <td>{{ $peserta->nilai_Z }}</td>
                                <td>{{ $peserta->nilai_W }}</td>
                                <td>
                                    <a href="{{ url('peserta/'.$peserta->id) }}" type="button" class="btn btn-primary">Lihat Laporan</a>
                                    <a href="{{ url('peserta/'.$peserta->id).'/edit' }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" action="{{ url('peserta/'.$peserta->id) }}" style="display: inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <p>Tidak ada peserta</p>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @for ($i = 1; $i <= $numPage; $i++)
                                @if ($page == $i)
                                    <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ url('peserta/?page='.$i.'&&pageSize='.$pageSize.'') }}">{{ $i }}</a></li>
                                @endif
                            @endfor()
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection