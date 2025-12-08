<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Cifaw Buketin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman', serif;
        }
        
        body {
            background: #d4b8b8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.15);
            padding: 50px;
            max-width: 450px;
            width: 100%;
        }
        
        .login-title {
            text-align: center;
            color: #4b0000;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #4b0000;
            font-weight: bold;
            font-size: 18px;
        }
        
        input {
            width: 100%;
            padding: 15px;
            border: 2px solid #d4b8b8;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        input:focus {
            outline: none;
            border-color: #4b0000;
        }
        
        .btn-login {
            width: 100%;
            padding: 15px;
            background: #4b0000;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background: #6b0000;
            transform: translateY(-2px);
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: #4b0000;
            text-decoration: none;
            font-weight: bold;
        }
        
        .error-message {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
        }

        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Login Admin</h1>
        
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div style="background: #fee2e2; color: #dc2626; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-login">Login</button>
        </form>
        
        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Home</a>
    </div>
</body>
</html>