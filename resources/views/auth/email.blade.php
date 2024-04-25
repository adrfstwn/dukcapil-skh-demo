<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        /* Inline CSS for styling */
        body {
            font-family: 'Montserrat', sans-serif;
            background-image: url(https://i.postimg.cc/jDCxP34x/bg-auth.jpg);
            background-size: cover;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
            height: auto;
        }

        .content {
            background-image: url(https://i.postimg.cc/jDCxP34x/bg-auth.jpg);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333333;
            margin-bottom: 10px;
        }

        .content p {
            color: #666666;
            margin-bottom: 20px;
        }

        .cta-button {
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            /* Mengatur lebar tombol secara manual */
            width: 120px;
            display: block;
            margin: 0 auto;
        }

        .cta-button:hover {
            background-color: #000000;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .footer p {
            color: #999999;
        }
        .content h2 {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333333;
    margin-bottom: 10px;
    /* Mengatur teks di tengah */
    text-align: center;
}
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="https://i.postimg.cc/QK9cKdPs/Logo-header.png" alt="SKH Logo">
        </div>
        <div class="content">
            <h2>Konfirmasi Reset Password</h2>
            <p>Silakan klik Reset Password.</p>
            <p>Abaikan jika Anda tidak ingin merubah password Anda.</p>
            <!-- Mengatur lebar tombol secara manual -->
            <a href="{{ $actionUrl }}" class="cta-button">Reset Password</a>
        </div>
        <div class="footer">
            <p>Terima kasih, <br> Tim DUKCAPIL | SKH</p>
        </div>
    </div>
</body>

</html>
