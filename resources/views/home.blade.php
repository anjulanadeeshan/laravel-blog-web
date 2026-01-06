<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
        <p>You are logged in...</p>
        <form action="/logout" method="POST">
            @csrf
        <button>log out</button>
        </form>

        <div style="border: 3px solid black">
            <form action="/createpost" method="POST">
            @csrf
            <input type="text" name="title" placeholder="post-title">
            <textarea name="body" placeholder="Body content..."></textarea>
            <button>Save post</button>
            </form>
        </div>
    @else

        <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" placeholder="name" name="name">
            <input type="email" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <button>Register</button>
        </form>
        </div>

        <div style="border: 3px solid black;">
        <h2>login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" placeholder="name" name="loginname">
            <input type="password" placeholder="password" name="loginpassword">
            <button>Log in</button>
        </form>
        </div>
    @endauth
    
</body>
</html>