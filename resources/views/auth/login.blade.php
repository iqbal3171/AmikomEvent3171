<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - AmikomEventHub</title>
    <meta name="description" content="Login to AmikomEventHub Admin Panel">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-dark {
            background: rgba(30, 27, 75, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .gradient-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }

        .input-glass {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(79, 70, 229, 0.2);
            transition: all 0.3s ease;
        }

        .input-glass:focus {
            background: rgba(255, 255, 255, 1);
            border-color: rgba(79, 70, 229, 0.5);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(79, 70, 229, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(79, 70, 229, 0.4);
        }

        .blob {
            position: absolute;
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Animated Background Blobs -->
    <div class="blob w-80 h-80 bg-indigo-600 opacity-20 absolute top-10 -left-20 animate-blob"></div>
    <div class="blob w-80 h-80 bg-purple-600 opacity-20 absolute top-40 -right-20 animate-blob animation-delay-2000"></div>
    <div class="blob w-80 h-80 bg-indigo-400 opacity-20 absolute -bottom-20 left-40 animate-blob" style="animation-delay: 4s;"></div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-md mx-4">
        
        <!-- Logo & Branding -->
        <div class="text-center mb-12 animate-float">
            <div class="inline-flex items-center justify-center gap-3 mb-8">
                <div class="w-14 h-14 gradient-primary rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div>
                    <h2 class="text-white text-2xl font-bold">AmikomEventHub</h2>
                    <p class="text-indigo-300 text-sm">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Login Card -->
        <div class="glass rounded-3xl shadow-2xl p-8 space-y-6">
            
            <!-- Header -->
            <div class="text-center space-y-2">
                <h1 class="text-2xl font-bold text-slate-900">Selamat Datang Kembali</h1>
                <p class="text-slate-600 text-sm">Masuk ke akun admin Anda untuk mengelola event</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                @csrf

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-slate-700">
                        <i class="fas fa-envelope text-indigo-600 mr-2"></i>Email Anda
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        class="input-glass w-full px-4 py-3 rounded-xl text-slate-900 placeholder-slate-400" 
                        placeholder="admin@example.com"
                    >
                    @error('email')
                        <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-slate-700">
                        <i class="fas fa-lock text-indigo-600 mr-2"></i>Password
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        class="input-glass w-full px-4 py-3 rounded-xl text-slate-900 placeholder-slate-400" 
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="btn-primary w-full py-3 px-4 rounded-xl text-white font-semibold text-base flex items-center justify-center gap-2"
                >
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk ke Dashboard
                </button>
            </form>

            <!-- Divider -->
            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-slate-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-slate-500">Sistem Admin Panel</span>
                </div>
            </div>

            <!-- Info Section -->
            <div class="bg-indigo-50 rounded-xl p-4 border border-indigo-200">
                <p class="text-xs text-slate-600 text-center">
                    <i class="fas fa-info-circle text-indigo-600 mr-2"></i>
                    Universitas AMIKOM Yogyakarta | Sistem Informasi
                </p>
            </div>

        </div>

        <!-- Footer Text -->
        <div class="text-center mt-8">
            <p class="text-slate-400 text-xs">
                © 2024 AmikomEventHub | Powered by Laravel & Tailwind CSS
            </p>
        </div>

    </div>

</body>

</html>
