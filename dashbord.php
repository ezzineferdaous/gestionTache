<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="d-flex vh-100">

        <!-- sidebar -->
        <div class="d-none d-md-flex flex-column bg-dark text-white" style="width: 250px;">
            <div class="flex-grow-1 overflow-auto">
                <nav class="nav flex-column bg-gradient p-3">
                    <a href="./Dashboard.php" class="nav-link text-white">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <a href="./home" class="nav-link text-white mt-2">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="./profil.php" class="nav-link text-white mt-2">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <a href="./profil.php" class="nav-link text-white mt-2">
                        <i class="fas fa-user mr-2"></i> Tache
                    </a>
                
                    <a href="./users.php" class="nav-link text-white mt-2">
                        <i class="fas fa-users mr-2"></i> Users
                    </a>
                
                </nav>
            </div>
        </div>
    
        <!-- Main content -->
        <div class="flex-grow-1 d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between p-3 bg-white border-bottom">
                <div class="input-group w-50">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- notification -->
                <div class="d-flex align-items-center">
                    <a href="#" class="text-secondary mx-2">
                        <i class="fas fa-bell"></i>
                    </a>
                    <!-- parametre -->
                    <a href="#" class="text-secondary mx-2">
                        <i class="fas fa-cog"></i>
                    </a>
                    <!-- logout -->
                    <a href="#" class="text-secondary d-flex align-items-center mx-2">
                        <i class="fas fa-sign-out-alt mr-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            <div class="p-4">
                <h1 class="h3">Welcome to my dashboard!</h1>
            </div>

            <div class="d-flex flex-column align-items-center p-4" id="main-content"></div>
        </div>
        
    </div>

    <script>
        // Add click event listener to sidebar links
        const sidebarLinks = document.querySelectorAll('.nav-link');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default link behavior
                const url = event.target.href; // Get URL of clicked link
                loadContent(url); // Load content of the clicked link
            });
        });

        // Function to load content from URL
        function loadContent(url) {
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    // Insert the loaded HTML into the main-content div
                    document.getElementById('main-content').innerHTML = html;
                })
                .catch(error => console.error('Error loading content:', error));
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
