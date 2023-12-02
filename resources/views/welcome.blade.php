<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Perpustakaan Online</title>
    <!-- Tambahkan link CSS Bootstrap di sini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to Perpustakaan Online</h1>
        <p>Discover and borrow books online!</p>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Perpustakaan Online</a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">List Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transactions.index') }}">Transaction History</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <h2>Available Books</h2>
        <ul>
            @foreach($books as $book)
                <li>{{ $book->title }} - {{ $book->author }}</li>
            @endforeach
        </ul>
    </div>

    <!-- Tambahkan script JS Bootstrap di sini -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
