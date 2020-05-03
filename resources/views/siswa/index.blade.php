@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if (session('berhasil'))
                <div class="alert alert-success" role="alert">
                    {{session('berhasil')}}
                </div>
                @endif

                <a href="{{route('siswa.create')}}" class="btn btn-primary mb-3">Tambah Siswa</a>

                <div class="col-4 float-right">
                    <form action="" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari siswa" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary btn-icon" type="button"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $siswa)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$siswa->nama_siswa}}</td>
                            <td>{{$siswa->kelas}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('siswa.edit', ['siswa' => $siswa->id])}}"
                                        class="btn btn-info mr-2">edit</a>
                                    <form action="{{route('siswa.destroy', ['siswa' => $siswa->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-delete">hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty

                        <p>Tidak ada siswa</p>

                        @endforelse
                    </tbody>
                </table>

                {{$siswas->links()}}
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    let btnDelete = document.querySelectorAll('.btn-delete');

    btnDelete.forEach(i => {
        i.addEventListener('click', event => {

            let deleteForm = event.toElement.parentElement;

            event.preventDefault()
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        deleteForm.submit()
                    }
                })
            })
        } )

</script>
@endpush