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
                <div class="card-header">Dashboard Administrator
                    <div class="text-right">
                        <a href="{{ route('admin/tambah') }}" class="btn btn-primary">+ Tambah Mata Kuliah</a>
                    </div>
                </div>

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
                                    <!-- <a href="{{ route('admin/edit', ['id' => $m->id]) }}" class="btn btn-warning">Edit</a> -->
                                    <div class='row'>
                                        <form action="{{ route('admin/edit', ['id' => $m->id]) }}" method="GET">
                                            <input type="hidden" name="id" value="{{$m->id}}">
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>
                                        <form action="{{ route('admin/hapus', ['id' => $m->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$m->id}}">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        <!-- <a href="update?id={{$m -> id}}" class="btn btn-warning">Edit</a>
                                            <a href="update?id={{$m -> id}}" class="btn btn-danger">Hapus</a> -->
                                    </div>
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