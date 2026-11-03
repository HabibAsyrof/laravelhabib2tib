```blade
@extends('layouts.admin.app')

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#"><i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit User</h1>
            <p class="mb-0">Form untuk memperbarui data user.</p>
        </div>

        <div>
            <a href="{{ route('user.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">

                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-12">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text"
                                       id="name"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name', $user->name) }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email', $user->email) }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password Baru
                                </label>
                                <input type="password"
                                       id="password"
                                       name="password"
                                       class="form-control">

                                <small class="text-muted">
                                    Kosongkan jika tidak ingin mengganti password.
                                </small>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Perbarui
                            </button>

                            <a href="{{ route('user.index') }}"
                               class="btn btn-outline-secondary ms-2">
                                Batal
                            </a>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
