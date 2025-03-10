<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>
    <style>
        body {
            background-color: #e6eaed;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            border-radius: 10px; 
            overflow: hidden; 
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #5a93c4;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #cadade;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
            border-radius: 8px; 
            font-size: 1em;
            transition: background-color 0.3s ease; 
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-edit:hover {
            background-color: #45a049; 
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .btn-delete:hover {
            background-color: #e53935; 
        }

        .btn-tambah {
            background-color: #003092;
            color: white;
            align-items:left;
        }

        .btn-tambah:hover {
            background-color: #00276a;
        }

        .add-button-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-button-container a {
            float: left;
            margin-left: 65px;
            margin-bottom: 15px;
        }

        .alert {
            padding: 15px;
            margin: 10px 0;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

    </style>
</head>
<body>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>DAFTAR PEGAWAI</h1> 

    <div class="add-button-container">
        <a href="{{ route('employees.create') }}"><button class="btn btn-tambah">Tambah Pegawai</button></a>
    </div>

    <!-- Tabel untuk menampilkan daftar pegawai -->
    <table>
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
