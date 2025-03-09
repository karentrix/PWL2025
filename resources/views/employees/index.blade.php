<!-- resources/views/employees/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse; 
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd; 
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .btn-tambah {
            background-color: #003092;
            color: white;
        }
    </style>
    
</head>
<body>
    <h1 align='center'>DAFTAR PEGAWAI</h1>

    <!-- Tautan untuk menambah pegawai -->
    <a href="{{ route('employees.create') }}"><button class="btn btn-tambah">Tambah Pegawai</button></a>
<p>
    <!-- Tabel untuk menampilkan daftar pegawai -->
    <table border="3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>Rp {{ number_format($employee->salary, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}"><button class="btn btn-edit">Edit</button></a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
