@extends('layouts.app')

@section('content')
    <style>
        .card-modern {
            background: #fff;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
        }

        .table-modern thead {
            background: #0A3FA3;
            color: #fff;
            border-radius: 12px;
        }

        .table-modern tbody tr:hover {
            background: #f1f6ff;
        }

        .badge-role {
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 8px;
            background: #0D6EFD;
        }

        .btn-action {
            padding: 4px 10px;
            font-size: 13px;
            border-radius: 8px;
        }

        .btn-edit {
            background: #ffc107;
            color: #000;
        }

        .btn-delete {
            background: #dc3545;
            color: #fff;
        }
    </style>

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3 align-items-center">
            <h3 class="fw-bold">Daftar Konten</h3>
            <a href="{{ route('contents.create') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> Tambah Konten
            </a>
        </div>

        <div class="card-modern mt-3">

            <div class="table-responsive">
                <table class="table table-modern table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Program</th>
                            <th>Klasifikasi</th>
                            <th>Medsos</th>
                            <th>Role</th>
                            <th width="160">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contents as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->tanggal }}</td>
                                <td class="fw-semibold">{{ $c->judul }}</td>
                                <td>{{ $c->program->nama_program ?? '-' }}</td>
                                <td>{{ $c->klasifikasi->nama_klasifikasi ?? '-' }}</td>
                                <td>{{ $c->medsos->nama_medsos ?? '-' }}</td>

                                <td>
                                    @foreach ($c->persons as $p)
                                        <span class="badge bg-primary mb-1">
                                            {{ $p->name }} ({{ $p->pivot->role }})
                                        </span><br>
                                    @endforeach
                                </td>

                                <td>
                                    <a href="{{ route('contents.edit', $c) }}" class="btn btn-warning btn-sm btn-action">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('contents.destroy', $c) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-action">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
