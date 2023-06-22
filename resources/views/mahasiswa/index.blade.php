@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()-> has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard Mahasiswa</div>

                <div class="card-body">
                    <h3>Kartu Rencana Studi (KRS)</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Ruang</th>
                                <th>Dosen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matkulAmbil as $ma)
                            <tr>
                                <td>{{$ma -> kode}}</td>
                                <td>{{$ma -> nama}}</td>
                                <td>{{$ma -> kelas}}</td>
                                <td>{{$ma -> ruang}}</td>
                                <td>{{$ma -> dosen_nama}}</td>
                                <td>
                                    <form action="{{ route('mahasiswa/hapus') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$ma->id}}">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                    <!-- <a href="mahasiswa/hapus?id={{$ma -> id}}" class="btn btn-danger">Hapus</a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class=""></div>

                <div class="card-body">
                    <h3>List Mata Kuliah</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Ruang</th>
                                <th>Dosen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matkul as $m)
                            <tr>
                                <td>{{$m -> kode}}</td>
                                <td>{{$m -> nama}}</td>
                                <td>{{$m -> kelas}}</td>
                                <td>{{$m -> ruang}}</td>
                                <td>{{$m -> dosen_nama}}</td>
                                <td>
                                    <form action="{{ route('mahasiswa/tambah') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$m->id}}">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection