<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate API Key</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        #api-key-display {
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <h1>Generate API Key</h1>
    <form action="{{ route('generate.api.key') }}" method="POST">
        @csrf
        <button type="submit">Generate API Key</button>
    </form>

    @if (isset($apiKey))
        <div id="api-key-display">
            Generated API Key: {{ $apiKey }}
        </div>
    @endif
</body>
</html>
