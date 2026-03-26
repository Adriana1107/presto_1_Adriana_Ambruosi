<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>presto</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiny5&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
   
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
</head>
<body>




<x-navbar/>
  
      {{ $slot }}
  
    <script src="https://kit.fontawesome.com/44c507059e.js" crossorigin="anonymous"></script>
</body>
</html>