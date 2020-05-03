@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary mb-3 btn-sm" href="{{route('siswa.index')}}"><i
                        class="fas fa-arrow-left"></i></a>

                <h5 class="header-title mb-3">Tambah Siswa</h5>

                <form action="{{route('siswa.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3">Nama Siswa</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_siswa"
                                class="form-control @error('nama_siswa') is-invalid @enderror">

                            @error('nama_siswa')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror ">
                            @error('kelas')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary float-right col-3">tambah</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection