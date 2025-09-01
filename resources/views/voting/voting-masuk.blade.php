<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dengan Kode</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* Reset CSS dasar dan pengaturan font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            /* Warna latar belakang abu-abu lembut */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Kontainer utama untuk kartu login */
        .login-container {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            /* Lebar maksimum agar tidak terlalu besar di desktop */
            text-align: center;
        }

        /* Styling untuk judul */
        .login-container h1 {
            color: #333;
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 24px;
        }

        /* Styling untuk paragraf deskripsi */
        .login-container p {
            color: #666;
            margin-bottom: 30px;
            font-size: 15px;
        }

        /* Styling untuk input field */
        .form-control {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            /* Warna biru saat input aktif */
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        /* Styling untuk tombol submit */
        .btn {
            width: 100%;
            padding: 12px 15px;
            background-color: #007bff;
            /* Warna tombol biru */
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
            /* Warna tombol menjadi lebih gelap saat disentuh */
        }

        /* Styling untuk kotak error */
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-top: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            text-align: left;
        }

        .alert-success {
            background-color: #8EFAA0FF;
            color: #000000FF;
            padding: 15px;
            margin-top: 20px;
            border: 1px solid #20CA5EFF;
            border-radius: 8px;
            text-align: left;
        }

        .alert-error strong {
            display: block;
            margin-bottom: 5px;
        }

        .alert-error ul {
            list-style-position: inside;
            padding-left: 5px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h1>Login dengan Kode</h1>
        <p>Silakan masukkan kode unik yang Anda terima untuk melanjutkan.</p>

        <form action="{{ route('voting.codeLogin') }}" method="POST">
            @csrf
            <input type="text" name="code" class="form-control" placeholder="Masukkan kode unik di sini" required>
            <button type="submit" class="btn">Login</button>
        </form>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Note: </strong>
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

</body>

</html>
