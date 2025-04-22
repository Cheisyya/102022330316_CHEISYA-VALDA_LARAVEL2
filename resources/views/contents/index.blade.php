<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Konten</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link rel="stylesheet" as="style" onload="this.rel='stylesheet'" href="https://fonts.googleapis.com/css2?display=swap&family=Inter:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900" />
    <style>
        body {
            font-family: 'Inter', 'Noto Sans', sans-serif;
            background-color: #f8f9fa;
        }

        h1 {
            color: #d63384;
            text-align: center;
            margin: 20px 0;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e7edf3;
        }

        th {
            background-color: #d63384;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div style="text-align: right; width: 80%; margin: 20px auto;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background-color: #d63384; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
                Logout
            </button>
        </form>
    </div>
    <h1>Daftar Konten</h1>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Platform</th>
                <th>Tanggal Upload</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>{{ $content->platform }}</td>
                    <td>{{ \Carbon\Carbon::parse($content->published_at)->format('d M Y') }}</td>
                    <td>{{ number_format($content->views) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
