<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="icon" href="../src/favicon_io/favicon.ico" type="image/x-icon" />

    <!-- Meta tags and other head content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include other CSS and JS files -->
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <!-- script fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <title>{{ $title }}</title>
</head>
<body>
    <div class="h-screen flex">

        @include('components.sidebar')
        
        @yield('content')

    </div>
    
    <!-- script -->
    <script>
        function Menu(e) {
            let test = document.getElementById("test");
            
            e.name === "menu"
            ? ((e.name = "close"), test.classList.remove("hidden"))
            : ((e.name = "menu"), test.classList.add("hidden"));
        }
    </script>
</body>
</html>
