<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>
    <link rel="stylesheet"
          href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Edit Data Pelanggan</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('pelanggan.update', $pelanggan->pelanggan_id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name"
                           class="form-control"
                           value="{{ old('first_name', $pelanggan->first_name) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name"
                           class="form-control"
                           value="{{ old('last_name', $pelanggan->last_name) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Birthday</label>
                    <input type="date" name="birthday"
                           class="form-control"
                           value="{{ old('birthday', $pelanggan->birthday) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="Male"
                            {{ old('gender', $pelanggan->gender) == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>
                        <option value="Female"
                            {{ old('gender', $pelanggan->gender) == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email"
                           class="form-control"
                           value="{{ old('email', $pelanggan->email) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone"
                           class="form-control"
                           value="{{ old('phone', $pelanggan->phone) }}"
                           required>
                </div>

                <button type="submit" class="btn btn-success">
                    Update Pelanggan
                </button>

                <a href="{{ route('pelanggan.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html>