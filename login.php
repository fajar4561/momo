<?php 
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/resources/assets/images/head.ico">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url('public/resources/assets/images/bg3.webp');
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
            animation: fadeIn 1s ease-in-out;
            color: #fff;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            width: 90%;
            max-width: 400px;
            animation: slideIn 0.5s forwards;
            animation-delay: 0.5s;
        }
        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .login-container h2 {
            margin-bottom: 30px;
            color: #333;
            font-weight: bold;
        }
        .form-group label {
            color: #000;
        }
        .form-control {
            border-radius: 25px;
            border: 2px solid #007bff;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0056b3;
        }
        .btn-primary {
            border-radius: 25px;
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .changelog-box {
            background-color: #f8f9fa;
            border: 1px solid #007bff;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            color: #333;
            max-height: 150px;
            overflow-y: auto;
            display: none;
        }
        .changelog-box::-webkit-scrollbar {
            width: 8px;
        }
        .changelog-box::-webkit-scrollbar-track {
            background: #f8f9fa;
        }
        .changelog-box::-webkit-scrollbar-thumb {
            background-color: #007bff;
            border-radius: 10px;
        }
        .changelog-item {
            background-color: rgba(0, 123, 255, 0.1);
            border-left: 4px solid #007bff;
            border-radius: 5px;
            padding: 10px;
            margin: 5px 0;
            transition: background-color 0.3s ease;
        }
        .changelog-item:hover {
            background-color: rgba(0, 123, 255, 0.2);
        }
        .footer-note {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        .input-group-text {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            transition: background-color 0.3s;
        }

        .input-group-text:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">RSPM</h2>
        <form id="loginForm" action="app/controller/cek-login.php" method="post">
            <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan NIK (Nomor Induk Karyawan)" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </form>
        
        <!-- Changelog Box -->
        <div class="changelog-box">
            <h5>Changelog</h5>
            <ul class="list-unstyled"></ul>
        </div>
        <div class="footer-note">
            <p>Apa yang Baru ? <a id="toggleChangelog" href="#">Klik Saya</a></p>
        </div>
        <div class="footer-note">
            <p class="text-muted">V2.0.1</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#toggleChangelog').on('click', function(event) {
            event.preventDefault(); // Mencegah aksi default tautan
            $('.changelog-box').toggle(); // Menampilkan atau menyembunyikan changelog box
            if ($('.changelog-box').is(':visible') && $('.changelog-box').find('ul').children().length === 0) {
                $.ajax({
                    url: 'changelog.txt', // Ganti dengan path ke file TXT di server Anda
                    dataType: 'text',
                    success: function(data) {
                        var items = data.split('\n');
                        var changelogList = $('.changelog-box ul');
                        changelogList.empty(); // Kosongkan daftar sebelum menambahkan item baru
                        items.forEach(function(item) {
                            if (item.trim() !== '') {
                                changelogList.append('<li class="changelog-item"><i class="fas fa-info-circle"></i> ' + item + '</li>');
                            }
                        });
                    },
                    error: function() {
                        $('.changelog-box ul').append('<li class="changelog-item">Gagal memuat changelog.</li>');
                    }
                });
            }
        });
    });

     $('#togglePassword').on('click', function () {
        const passwordField = $('#password');
        const eyeIcon = $('#eyeIcon');

        const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);

        // Ganti ikon mata
        if (type === 'text') {
            eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
    </script>
</body>

</html>
