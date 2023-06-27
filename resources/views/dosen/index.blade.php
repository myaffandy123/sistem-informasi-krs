@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()-> has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success')}}
            </div>
            
            @elseif (session()-> has('danger')) 
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('danger')}}
            </div>
            
            @endif
            <div class="card">
                <div class="card-header bg-primary">Dashboard Dosen
                </div>
                <div class="card-body">
                    <h3>Mata Kuliah yang Diampu</h3>
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
                            @foreach ($matkulAmpu as $ma)
                            <tr>
                                <td>{{$ma -> kode}}</td>
                                <td>{{$ma -> nama}}</td>
                                <td>{{$ma -> kelas}}</td>
                                <td>{{$ma -> ruang}}</td>
                                <td>{{$ma -> dosen_nama}}</td>
                                <td>
                                    <form action="{{ route('dosen/hapus') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$ma->id}}">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
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
                                    <form action="{{ route('dosen/ampu') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$m->id}}">
                                        <button type="submit" class="btn btn-success">Ampu</button>
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