@extends('layouts.app')

@section('content')
    <style>
        .card-modern {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e5e7eb;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
        }

        .table thead {
            background: #1f2937 !important;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background: #f3f4f6;
        }

        .action-btn {
            padding: 6px 10px;
            border-radius: 8px;
        }

        .dropdown-menu {
            border-radius: 10px;
            padding: 8px;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 8px 12px;
        }

        .dropdown-item:hover {
            background: #f3f4f6;
        }
    </style>

    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">Daftar Person</h3>

            <a href="{{ route('persons.create') }}" class="btn btn-primary px-3">
                <i class="fa fa-plus"></i> Tambah Person
            </a>
        </div>

        <div class="card-modern">

            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th width="120" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($persons as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ ucfirst($p->type) }}</td>

                            <td class="text-center">

                                <div class="dropdown">
                                    <button class="btn btn-light border action-btn dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">

                                        <li>
                                            <a href="{{ route('persons.edit', $p) }}" class="dropdown-item text-warning">
                                                <i class="fa fa-edit me-2"></i> Edit
                                            </a>
                                        </li>

                                        <li>
                                            <form action="{{ route('persons.destroy', $p) }}" method="POST"
                                                onsubmit="return confirm('Yakin hapus?')">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item text-danger">
                                                    <i class="fa fa-trash me-2"></i> Hapus
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection
