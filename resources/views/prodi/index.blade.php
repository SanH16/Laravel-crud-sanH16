<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Program Studi
        </h2>
    </x-slot>
    <div class="row pt-4">
        <div class="col">
            <h2>Prodi</h2>

            @if (session()->has('info'))
            <div class="alert alert-success">
                {{ session()->get('info') }}
            </div>
            @endif

            <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('prodi.create')}}" class="btn btn-primary">Tambah</a>
            </div>

            <table class="table-auto">
                <thead>
                    <tr>
                        <th>Nama Prodi</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodis as $item)
                        <tr>
                            <td>{{ $item->nama}}</td>
                            <td>
                                <img src="{{ asset('storage/'.$item->foto) }}" alt="logo" width="100">
                            </td>
                            <td>
                                <form action="{{ route('prodi.destroy', ['prodi' => $item->id]) }}" 
                                method="post">
                                    <a href="{{ url('/prodi/'.$item->id) }}" class="btn btn-warning">Detail</a>
                                    <a href="{{ url('/prodi/'.$item->id.'/edit') }}" class="btn btn-info">Ubah</a>
                                    @method('DELETE')
                                    @csrf 
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
