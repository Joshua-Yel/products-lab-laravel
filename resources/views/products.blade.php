<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Lab</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Arial', sans-serif;
            background: #f5f7f5;
            color: #1a1a1a;
        }

        /* NAVBAR */
        nav {
            background: #1a5c38;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }
        .nav-brand {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .nav-links a {
            color: #b7dbc8;
            text-decoration: none;
            margin-left: 8px;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
        }
        .nav-links a:hover {
            background: #2d7a50;
            color: #fff;
        }
        .nav-links a.active {
            background: #fff;
            color: #1a5c38;
            font-weight: bold;
        }

        /* PAGE */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .page-header {
            margin-bottom: 32px;
        }
        .page-header h1 {
            font-size: 28px;
            color: #1a5c38;
            margin-bottom: 6px;
        }
        .page-header p {
            color: #666;
            font-size: 14px;
        }

        /* STATS ROW */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px 24px;
            border: 1px solid #e0ece5;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .stat-card .label {
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        .stat-card .value {
            font-size: 28px;
            font-weight: bold;
            color: #1a5c38;
        }

        /* TABLE CARD */
        .card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e0ece5;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .card-header {
            padding: 18px 24px;
            border-bottom: 1px solid #e0ece5;
            font-weight: bold;
            font-size: 15px;
            color: #1a5c38;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead tr {
            background: #f0f7f3;
        }
        th {
            padding: 13px 20px;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #4a7c5e;
            font-weight: bold;
        }
        td {
            padding: 14px 20px;
            font-size: 14px;
            border-bottom: 1px solid #f0f4f2;
            color: #333;
        }
        tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background: #f9fcfa; }

        /* BADGES */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-green { background: #d4f0e0; color: #1a5c38; }
        .badge-red { background: #fde8e8; color: #b91c1c; }
        .badge-blue { background: #dbeafe; color: #1d4ed8; }
        .badge-orange { background: #fef3c7; color: #92400e; }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 28px;
            color: #aaa;
            font-size: 13px;
            margin-top: 48px;
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-inner">
            <span class="nav-brand">Products Lab</span>
            <div class="nav-links">
                <a href="/" class="active">All Products</a>
                <a href="/available">Available</a>
                <a href="/category/Electronics">Electronics</a>
                <a href="/category/Accessories">Accessories</a>
                <a href="/category/Office Supplies">Office Supplies</a>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="page-header">
            <h1>All Products</h1>
            <p>Complete product list retrieved from the database using Eloquent ORM.</p>
        </div>

        <div class="stats">
            <div class="stat-card">
                <div class="label">Total Products</div>
                <div class="value">{{ count($products) }}</div>
            </div>
            <div class="stat-card">
                <div class="label">Available</div>
                <div class="value">{{ $products->where('is_available', true)->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="label">Unavailable</div>
                <div class="value">{{ $products->where('is_available', false)->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="label">Categories</div>
                <div class="value">{{ $products->pluck('category')->unique()->count() }}</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Product Records</div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                        <tr>
                            <td style="color: #aaa;">{{ $index + 1 }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td style="color: #666; max-width: 280px;">{{ $product->description }}</td>
                            <td><span class="badge badge-blue">{{ $product->category }}</span></td>
                            <td><strong>₱{{ number_format($product->price, 2) }}</strong></td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                @if($product->is_available)
                                    <span class="badge badge-green">Available</span>
                                @else
                                    <span class="badge badge-red">Unavailable</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <footer>&copy; 2026 Products Lab</footer>

</body>
</html>