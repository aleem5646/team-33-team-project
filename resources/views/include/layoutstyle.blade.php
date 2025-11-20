<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solara</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    
    <header class="navbar">
        <div class="logo">
            <img src="" alt="logo">
        </div>

        <nav>
            <a href="/">Home</a>
            <a href="">Products</a>
            <a href="">Contact</a>
            <a href="">About</a>
        </nav>

        <div class="icons">
            <img src="" alt="icon">
            <img src="" alt="icon">
        </div>
    </header>   
    
    
    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="left">
            <p>📞 +44 7777 777777</p>
            <p>📧 name@solara.com</p>
            <p>📍 Aston St, Birmingham B4 7ET</p>
        </div>
    </footer>
</body>
</html>