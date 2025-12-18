@extends('layouts.app')

@section('title', 'Program')
@section('page-title', 'Data Program')

@section('content')
    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h3 class="fw-bold">List Program</h3>
            <a href="{{ route('programs.create') }}" class="btn btn-primary px-3">
                <i class="fa fa-plus me-1"></i> Tambah Program
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 60px" class="text-center">No</th>
                        <th>Nama Program</th>
                        <th style="width: 160px" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($programs as $item)
                        <tr>
                            <td class="text-center fw-bold">{{ $loop->iteration }}</td>

                            <td class="fw-semibold">
                                {{ $item->nama_program }}
                            </td>

                            <td class="text-center">

                                <a href="{{ route('programs.edit', $item) }}" class="btn btn-warning btn-sm px-3 me-1">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('programs.destroy', $item) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm px-3">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    @if ($programs->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                <i class="fa fa-folder-open mb-2"></i><br>
                                Data program belum ada.
                            </td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>

    </div>
@endsection
