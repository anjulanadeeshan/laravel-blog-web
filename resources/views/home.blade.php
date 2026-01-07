<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .header {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header p {
            color: #333;
            font-weight: 600;
        }
        
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        h1, h2 {
            color: #333;
            margin-bottom: 20px;
        }
        
        h3 {
            color: #444;
            margin-bottom: 10px;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
            font-family: inherit;
        }
        
        input:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        button {
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .logout-btn {
            padding: 8px 16px;
            font-size: 13px;
        }
        
        .post-item {
            background: #f8f9fa;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        
        .post-item h3 {
            color: #667eea;
            font-size: 20px;
        }
        
        .post-item p {
            color: #666;
            line-height: 1.6;
            margin: 10px 0;
        }
        
        .post-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .post-actions a {
            text-decoration: none;
            color: #667eea;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 6px;
            background: white;
            transition: background 0.2s;
        }
        
        .post-actions a:hover {
            background: #e8eaf6;
        }
        
        .post-actions form {
            margin: 0;
        }
        
        .delete-btn {
            padding: 8px 16px;
            background: #dc3545;
            font-size: 13px;
        }
        
        .delete-btn:hover {
            background: #c82333;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
        }
        
        .auth-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .auth-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">

    @auth
        <div class="header">
            <p>You are logged in!</p>
            <form action="/logout" method="POST">
                @csrf
                <button class="logout-btn">Log Out</button>
            </form>
        </div>

        <div class="card">
            <h2>Create a New Post</h2>
            <form action="/createpost" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title">
                <textarea name="body" placeholder="Write your post content here..."></textarea>
                <button>Save Post</button>
            </form>
        </div>

        <div class="card">
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div class="post-item">
                <h3>{{$post['title']}}</h3>
                <p><small>by {{$post->user->name}}</small></p>
                <p>{{$post['body']}}</p>
                <div class="post-actions">
                    <a href="/edit-post/{{$post->id}}">Edit</a>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="auth-container">
            <div class="card">
                <h2>Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <input type="text" placeholder="Name" name="name">
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <button>Register</button>
                </form>
            </div>

            <div class="card">
                <h2>Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <input type="text" placeholder="Name" name="loginname">
                    <input type="password" placeholder="Password" name="loginpassword">
                    <button>Log In</button>
                </form>
            </div>
        </div>

        <<div class="card">
    <h2>All Posts</h2>
    @foreach($posts as $post)
    <div class="post-item">
        <h3>{{$post['title']}}</h3>
        <p><small>by {{$post->user->name}}</small></p>
        <p>{{$post['body']}}</p>
        
        @if(auth()->id() == $post->user_id)
            <div class="post-actions">
                <a href="/edit-post/{{$post->id}}">Edit</a>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Delete</button>
                </form>
            </div>
        @endif
        
    </div>
    @endforeach
</div>

        </div>
    @endauth
    </div>
</body>
</html>