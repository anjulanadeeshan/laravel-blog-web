<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post - TechBlog</title>
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
    
    <!-- Header -->
    <header class="px-6 py-4 bg-background-light dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <a href="/" class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-800 flex items-center justify-center">
                <span class="material-icons-round text-slate-600 dark:text-slate-300">arrow_back</span>
            </a>
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Create New Post</h1>
                <p class="text-xs text-slate-500 dark:text-slate-400">Share your thoughts with the community</p>
            </div>
        </div>
    </header>
    
    <main class="flex-1 flex flex-col px-6 py-6 max-w-2xl mx-auto w-full">
        <!-- Create Post Form Card -->
        <div class="bg-card-light dark:bg-card-dark p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 transition-all">
            <form action="/createpost" method="POST" class="space-y-6">
                @csrf
                
                <!-- Author Info -->
                @auth
                <div class="flex items-center gap-3 p-4 bg-primary/10 dark:bg-primary/20 rounded-2xl">
                    <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center">
                        <span class="text-white font-bold text-lg">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Posting as you</p>
                    </div>
                </div>
                @endauth
                
                <!-- Title Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 ml-1" for="title">
                        Post Title
                    </label>
                    <div class="relative">
                        <span class="material-icons-round absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">title</span>
                        <input 
                            class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-800 border-none rounded-2xl focus:ring-2 focus:ring-primary text-gray-900 dark:text-white placeholder-gray-400 transition-all" 
                            id="title" 
                            name="title" 
                            placeholder="Enter an engaging title..." 
                            required 
                            type="text"
                        />
                    </div>
                    <p class="mt-1.5 ml-1 text-xs text-gray-500 dark:text-gray-400">Make it catchy and descriptive</p>
                </div>
                
                <!-- Body Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 ml-1" for="body">
                        Content
                    </label>
                    <div class="relative">
                        <span class="material-icons-round absolute left-4 top-4 text-gray-400 text-xl">article</span>
                        <textarea 
                            class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-800 border-none rounded-2xl focus:ring-2 focus:ring-primary text-gray-900 dark:text-white placeholder-gray-400 transition-all min-h-[300px] resize-y" 
                            id="body" 
                            name="body" 
                            placeholder="Write your story here... Share your insights, experiences, or knowledge with the community." 
                            required
                        ></textarea>
                    </div>
                    <p class="mt-1.5 ml-1 text-xs text-gray-500 dark:text-gray-400">Write at least 100 characters for a quality post</p>
                </div>
                
                <!-- Category Selection (Optional) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 ml-1" for="category">
                        Category <span class="text-gray-400">(Optional)</span>
                    </label>
                    <div class="relative">
                        <span class="material-icons-round absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">category</span>
                        <select 
                            class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-800 border-none rounded-2xl focus:ring-2 focus:ring-primary text-gray-900 dark:text-white transition-all appearance-none"
                            id="category"
                            name="category"
                        >
                            <option value="">Select a category</option>
                            <option value="technology">Technology</option>
                            <option value="design">Design</option>
                            <option value="development">Development</option>
                            <option value="data-science">Data Science</option>
                            <option value="devops">DevOps</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="material-icons-round absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">expand_more</span>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex gap-3 pt-4">
                    <button 
                        type="submit" 
                        class="flex-1 bg-primary text-white font-bold py-4 rounded-2xl shadow-lg shadow-primary/30 hover:shadow-primary/40 active:scale-[0.98] transition-all flex items-center justify-center gap-2"
                    >
                        <span class="material-icons-round text-xl">publish</span>
                        Publish Post
                    </button>
                    
                    <a 
                        href="/" 
                        class="px-6 py-4 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-bold rounded-2xl hover:bg-gray-300 dark:hover:bg-gray-600 active:scale-[0.98] transition-all flex items-center justify-center"
                    >
                        <span class="material-icons-round text-xl">close</span>
                    </a>
                </div>
            </form>
        </div>
        
        <!-- Writing Tips -->
        <div class="mt-6 p-5 bg-blue-50 dark:bg-blue-900/20 rounded-2xl border border-blue-100 dark:border-blue-800">
            <div class="flex items-start gap-3">
                <span class="material-icons-round text-blue-600 dark:text-blue-400 text-xl mt-0.5">lightbulb</span>
                <div>
                    <h3 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Writing Tips</h3>
                    <ul class="space-y-1.5 text-sm text-blue-800 dark:text-blue-300">
                        <li>• Keep your title clear and descriptive</li>
                        <li>• Break content into paragraphs for readability</li>
                        <li>• Use examples to illustrate your points</li>
                        <li>• Proofread before publishing</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Dark Mode Toggle -->
    <button 
        class="fixed bottom-6 right-6 w-12 h-12 bg-white dark:bg-gray-800 rounded-full shadow-xl flex items-center justify-center border border-gray-100 dark:border-gray-700 z-50 transition-all active:scale-90" 
        onclick="document.documentElement.classList.toggle('dark')"
    >
        <span class="material-icons-round text-primary dark:text-yellow-400">dark_mode</span>
    </button>
    
</body>
</html>
