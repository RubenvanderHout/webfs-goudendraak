<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Orders</title>
</head>
<body>
    <h1>Download Daily Order Exports</h1>

    <ul>
        @foreach ($files as $file)
            <li>
                <a href="{{ route('downloads.download', $file) }}">
                    {{ basename($file) }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>
