<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechBlog - Register</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#715fbc",
                        "background-light": "#F9FAFB",
                        "background-dark": "#111827",
                        "card-light": "#FFFFFF",
                        "card-dark": "#1F2937",
                    },
                    fontFamily: {
                        display: ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "12px",
                    },
                },
            },
        };
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            -webkit-tap-highlight-color: transparent;
            min-height: max(884px, 100dvh);
        }
        .ios-blur {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark min-h-screen flex flex-col transition-colors duration-300">
    
    <div class="h-12 w-full"></div>
    
    <main class="flex-1 flex flex-col px-6 pb-10 max-w-md mx-auto w-full">
        <!-- Logo Section -->
        <div class="mt-8 mb-12 flex flex-col items-center">
            <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center shadow-lg mb-4">
                <span class="material-icons-round text-white text-4xl">terminal</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">TechBlog</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2 text-center">Your daily dose of modern engineering</p>
        </div>
        
        <!-- Register Form -->
        <div class="bg-card-light dark:bg-card-dark p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 transition-all">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Create Account</h2>
            
            <form action="/register" method="POST" class="space-y-5">
                @csrf
                
                <!-- Name Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5 ml-1" for="name">
                        Name
                    </label>
                    <div class="relative">
                        <span class="material-icons-round absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">person</span>
                        <input 
                            class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-800 border-none rounded-2xl focus:ring-2 focus:ring-primary text-gray-900 dark:text-white placeholder-gray-400 transition-all" 
                            id="name" 
                            name="name" 
                            placeholder="Enter your name" 
                            required 
                            type="text"
                        />
                    </div>
                </div>
                
                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5 ml-1" for="email">
                        Email Address
                    </label>
                    <div class="relative">
                        <span class="material-icons-round absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">alternate_email</span>
                        <input 
                            class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-800 border-none rounded-2xl focus:ring-2 focus:ring-primary text-gray-900 dark:text-white placeholder-gray-400 transition-all" 
                            id="email" 
                            name="email" 
                            placeholder="your@email.com" 
                            required 
                            type="email"
                        />
                    </div>
                </div>
                
                <!-- Password Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5 ml-1" for="password">
                        Password
                    </label>
                    <div class="relative">
                        <span class="material-icons-round absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">lock_open</span>
                        <input 
                            class="w-full pl-12 pr-12 py-3.5 bg-gray-50 dark:bg-gray-800 border-none rounded-2xl focus:ring-2 focus:ring-primary text-gray-900 dark:text-white placeholder-gray-400 transition-all" 
                            id="password" 
                            name="password" 
                            placeholder="••••••••" 
                            required 
                            type="password"
                        />
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary transition-colors" type="button" onclick="togglePassword('password')">
                            <span class="material-icons-round text-xl" id="password-icon">visibility_off</span>
                        </button>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button class="w-full bg-primary text-white font-bold py-4 rounded-2xl shadow-lg shadow-primary/30 hover:shadow-primary/40 active:scale-[0.98] transition-all flex items-center justify-center gap-2 mt-2" type="submit">
                    Create Account
                    <span class="material-icons-round text-xl">arrow_forward</span>
                </button>
            </form>
            
            <!-- Additional Options -->
            <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-800 flex flex-col gap-4">
                <p class="text-center text-gray-500 dark:text-gray-400 text-sm">
                    Already have an account? 
                    <a class="text-primary font-bold hover:underline" href="/login">Log In</a>
                </p>
                
                <div class="relative py-2">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-100 dark:border-gray-800"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-card-light dark:bg-card-dark px-2 text-gray-400">Or sign up with</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl border border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <img alt="Google" class="w-5 h-5" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD1k9QW90a9wGonV1gOaqnqCmnQjsGaBiRv0DLLZGQ0QjvCQKUxPNKCFMxsoDQO5MzUcRUSvJQKFYtUKyjqd65j81xVN3tIOHhtaPn3HPLDHmg0LsaEUxLncAXxfYNRQbt-iCXXwzGwRz14iQRqycn-2lGMi99CwWyznu0W1IxuVbBjkS8bfY-EsLXu0azpM7CqD4dz74nJdtEBjigck0FTtpSF0EhaW3pAsuY9Ya_X57G0lzMPzQfxwGBdRKu10mT-68kqky4io750" />
                        <span class="text-sm font-medium dark:text-white">Google</span>
                    </button>
                    <button class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl border border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <span class="material-icons-round text-xl dark:text-white">apple</span>
                        <span class="text-sm font-medium dark:text-white">Apple</span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Back to Home -->
        <div class="mt-8 text-center">
            <a href="/" class="text-sm text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">
                ← Back to Home
            </a>
        </div>
        
        <div class="mt-8 text-center">
            <p class="text-xs text-gray-400 dark:text-gray-600">
                By creating an account, you agree to our <br>
                <a class="underline" href="#">Terms of Service</a> and <a class="underline" href="#">Privacy Policy</a>
            </p>
        </div>
    </main>
    
    <!-- Dark Mode Toggle -->
    <button class="fixed bottom-6 right-6 w-12 h-12 bg-white dark:bg-gray-800 rounded-full shadow-xl flex items-center justify-center border border-gray-100 dark:border-gray-700 z-50 transition-all active:scale-90" onclick="document.documentElement.classList.toggle('dark')">
        <span class="material-icons-round text-primary dark:text-yellow-400">dark_mode</span>
    </button>
    
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-icon');
            if (field.type === 'password') {
                field.type = 'text';
                icon.textContent = 'visibility';
            } else {
                field.type = 'password';
                icon.textContent = 'visibility_off';
            }
        }
    </script>
    
</body>
</html>
