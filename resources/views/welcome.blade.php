<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Feed</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#715fbc",
                        "background-light": "#f3f4f6",
                        "background-dark": "#0f172a",
                        "card-light": "#ffffff",
                        "card-dark": "#1e293b",
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
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen">
    
    <!-- Header -->
    <header class="px-6 py-4 bg-background-light dark:bg-background-dark border-b border-slate-200 dark:border-slate-800 sticky top-0 z-50 backdrop-blur-lg bg-opacity-80">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center">
                    <span class="material-icons-outlined text-white text-2xl">article</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight">TechBlog</h1>
                    <p class="text-xs text-slate-500 dark:text-slate-400">All Posts</p>
                </div>
            </div>
            <div class="flex gap-3">
            <button class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-800 flex items-center justify-center">
                <span class="material-icons-outlined text-slate-600 dark:text-slate-300">search</span>
            </button>
            @auth
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="w-10 h-10 rounded-full bg-red-500 flex items-center justify-center text-white">
                    <span class="material-icons-outlined">logout</span>
                </button>
            </form>
            @else
            <a href="/login" class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white">
                <span class="material-icons-outlined">person</span>
            </a>
            @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="px-4 pb-24 space-y-4">
        @foreach($posts as $post)
        <article class="bg-card-light dark:bg-card-dark rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-1 rounded bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-[10px] font-bold uppercase tracking-wider">
                        {{ $post->user->name ?? 'General' }}
                    </span>
                    <span class="text-xs text-slate-400 dark:text-slate-500">• {{ rand(3, 10) }} min read</span>
                </div>
                
                <h2 class="text-xl font-bold text-primary mb-2 leading-tight">{{ $post->title }}</h2>
                
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-[10px] font-bold">
                        {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                    </div>
                    <span class="text-sm font-medium text-slate-600 dark:text-slate-400">by {{ $post->user->name ?? 'Anonymous' }}</span>
                </div>
                
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed line-clamp-4">
                    {{ $post->body }}
                </p>
                
                <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center">
                    <button class="text-primary font-semibold text-sm flex items-center gap-1">
                        Read More <span class="material-icons-outlined text-sm">arrow_forward</span>
                    </button>
                    
                    @auth
                        @if(auth()->id() == $post->user_id)
                        <div class="flex gap-3">
                            <a href="/edit-post/{{ $post->id }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition">
                                <span class="material-icons-outlined text-lg">edit</span>
                            </a>
                            <form action="/delete-post/{{ $post->id }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 dark:text-red-400 hover:text-red-600 dark:hover:text-red-300 transition">
                                    <span class="material-icons-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                        @else
                        <div class="flex gap-4 text-slate-400">
                            <span class="material-icons-outlined text-lg">bookmark_border</span>
                            <span class="material-icons-outlined text-lg">share</span>
                        </div>
                        @endif
                    @else
                    <div class="flex gap-4 text-slate-400">
                        <span class="material-icons-outlined text-lg">bookmark_border</span>
                        <span class="material-icons-outlined text-lg">share</span>
                    </div>
                    @endauth
                </div>
            </div>
        </article>
        @endforeach
    </main>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white/80 dark:bg-slate-900/80 ios-blur border-t border-slate-200 dark:border-slate-800 px-8 pt-3 pb-8 flex justify-between items-center z-50">
        <a href="/" class="flex flex-col items-center gap-1 text-primary">
            <span class="material-icons-outlined">home</span>
            <span class="text-[10px] font-medium">Home</span>
        </a>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons-outlined">explore</span>
            <span class="text-[10px] font-medium">Explore</span>
        </button>
        <div class="relative -top-6">
            @auth
            <a href="/createpost" class="w-14 h-14 bg-primary text-white rounded-full shadow-lg shadow-primary/40 flex items-center justify-center">
                <span class="material-icons-outlined text-3xl">add</span>
            </a>
            @else
            <a href="/register" class="w-14 h-14 bg-primary text-white rounded-full shadow-lg shadow-primary/40 flex items-center justify-center">
                <span class="material-icons-outlined text-3xl">add</span>
            </a>
            @endauth
        </div>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons-outlined">bookmark_border</span>
            <span class="text-[10px] font-medium">Saved</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons-outlined">settings</span>
            <span class="text-[10px] font-medium">Settings</span>
        </button>
    </nav>

    <!-- Dark Mode Toggle -->
    <button class="fixed bottom-24 right-4 w-12 h-12 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-full flex items-center justify-center shadow-lg z-40 transition-all active:scale-95" onclick="document.documentElement.classList.toggle('dark')">
        <span class="material-icons-outlined dark:hidden">dark_mode</span>
        <span class="material-icons-outlined hidden dark:block">light_mode</span>
    </button>

</body>
</html>
