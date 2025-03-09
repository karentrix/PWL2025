<!-- resources/views/employees/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        .btn {
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            width: 100%;
            margin-top: 20px;
        }

        .btn-simpan {
            background-color: #4CAF50;
            color: white;
        }

        .btn-perbarui:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Edit Pegawai</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ $employee->name }}" required><br>

        <label for="position">Jabatan:</label>
        <input type="text" name="position" id="position" value="{{ $employee->position }}" required><br>

        <label for="salary">Gaji:</label>
        <input type="text" name="salary" id="salary" value="{{ $employee->salary }}" required><br>

        <button class="btn btn-perbarui">Perbarui</button>
    </form>
</body>
</html>
