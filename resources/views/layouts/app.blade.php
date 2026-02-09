<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List - Laravel Demo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #fafafa;
            color: #1a1a1a;
            line-height: 1.6;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            border-bottom: 1px solid #e5e5e5;
            padding: 25px 0;
            margin-bottom: 30px;
            background: white;
        }
        
        header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #000;
        }
        
        nav {
            display: flex;
            gap: 20px;
        }
        
        nav a {
            color: #1a1a1a;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.15s ease;
        }
        
        nav a:hover {
            background-color: #f0f0f0;
        }
        
        .card {
            background: white;
            border: 1px solid #e5e5e5;
            border-radius: 6px;
            padding: 25px;
            margin-bottom: 20px;
        }
        
        .card h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: 1px solid #d5d5d5;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-right: 8px;
            margin-bottom: 8px;
            transition: all 0.15s ease;
            background: white;
            color: #1a1a1a;
        }
        
        .btn:hover {
            background: #f5f5f5;
            border-color: #999;
        }
        
        .btn-primary {
            background: #0066cc;
            color: white;
            border-color: #0066cc;
        }
        
        .btn-primary:hover {
            background: #0052a3;
            border-color: #0052a3;
        }
        
        .btn-success {
            background: #059669;
            color: white;
            border-color: #059669;
        }
        
        .btn-success:hover {
            background: #047857;
            border-color: #047857;
        }
        
        .btn-warning {
            background: #ca8a04;
            color: white;
            border-color: #ca8a04;
        }
        
        .btn-warning:hover {
            background: #b89704;
            border-color: #b89704;
        }
        
        .btn-danger {
            background: #dc2626;
            color: white;
            border-color: #dc2626;
        }
        
        .btn-danger:hover {
            background: #b91c1c;
            border-color: #b91c1c;
        }
        
        .form-group {
            margin-bottom: 18px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #1a1a1a;
            font-size: 14px;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d5d5d5;
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.15s ease;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #0066cc;
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }
        
        .form-group textarea {
            height: 120px;
            resize: vertical;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid;
        }
        
        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border-color: #059669;
        }
        
        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-color: #dc2626;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e5e5e5;
            font-size: 14px;
        }
        
        table th {
            background: #fafafa;
            font-weight: 600;
            color: #1a1a1a;
        }
        
        table tr:hover {
            background: #f8f8f8;
        }
        
        .actions {
            white-space: nowrap;
        }
        
        .actions .btn {
            margin-right: 6px;
            padding: 6px 12px;
            font-size: 13px;
        }
        
        footer {
            text-align: center;
            padding: 25px 20px;
            color: #666;
            font-size: 13px;
            border-top: 1px solid #e5e5e5;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Book List</h1>
            <nav>
                <a href="{{ route('books.index') }}">All Books</a>
                <a href="{{ route('books.create') }}">Add New Book</a>
            </nav>
        </div>
    </header>
    
    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>Book List Application - Laravel Demo | Wambede Ibrahim - MAY23/BSE/3167U</p>
    </footer>
</body>
</html>
