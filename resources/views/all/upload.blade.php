<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
</head>
<body>

@if(session('success'))
        <p>{{ session('success') }}</p>
       <!-- <img src="{{ Storage::disk('public')->url(session('file')) }}" alt="Uploaded File"> -->
    @endif
    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif
     
</body>
</html>