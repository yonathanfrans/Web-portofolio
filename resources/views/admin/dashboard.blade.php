<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain; 
        }

    </style>
</head>
<body>
    
    <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sticky-top" style="width: 250px; height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="/assets/img/logo.png" alt="logo" style="width: 50px; height: 45px">
                <span class="fs-4 px-2">Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link active d-flex align-items-center" aria-current="page">
                    <i class='bx bxs-dashboard px-2'></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/admin/hero" class="nav-link text-white d-flex align-items-center">
                    <i class='bx bx-home-alt px-2'></i>
                    Hero
                </a>
            </li>
            <li>
                <a href="/admin/about" class="nav-link text-white d-flex align-items-center">
                    <i class='bx bx-info-circle px-2'></i>
                    About
                </a>
            </li>
            <li>
                <a href="/admin/skill" class="nav-link text-white d-flex align-items-center">
                    <i class='bx bx-brain px-2'></i>
                    Skills
                </a>
            </li>
            <li>
                <a href="/admin/project" class="nav-link text-white d-flex align-items-center">
                    <i class='bx bx-folder-open px-2'></i>
                    Projects
                </a>
            </li>
            <li>
                <a href="/admin/contact" class="nav-link text-white d-flex align-items-center">
                    <i class='bx bx-envelope px-2'></i>
                    Contact
                </a>
            </li>
            <li>
                <hr>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link text-white d-flex align-items-center">
                        <i class='bx bx-log-out px-2'></i>
                        Logout
                    </button>
                </form>
            </li>
            </ul>
        </div>

        <div class="flex-grow-1 p-5 text-light" style="background-color: #1C1C1C;">
            <h1>Dashboard</h1>
            <hr>
            <div class="d-flex flex-wrap">
                <div class="card m-2" style="width: 19rem;">
                    <img src="assets/img/landing-page.png" class="card-img-top" alt="Landing Page">
                    <div class="card-body">
                        <h5 class="card-title">Landing Page</h5>
                        <p class="card-text">Make some changes to data and content with Create, Update and Delete on the Landing page.</p>
                        <a href="/admin/hero" class="btn btn-primary">Modify</a>
                    </div>
                </div>
                <div class="card m-2" style="width: 19rem;">
                    <img src="assets/img/about-page.png" class="card-img-top" alt="About Page">
                    <div class="card-body">
                        <h5 class="card-title">About Page</h5>
                        <p class="card-text">Make some changes to data and content with Create, Update and Delete on the About page.</p>
                        <a href="/admin/about" class="btn btn-primary">Modify</a>
                    </div>
                </div>
                <div class="card m-2" style="width: 19rem;">
                    <img src="assets/img/skill-page.png" class="card-img-top" alt="Skills Page">
                    <div class="card-body">
                        <h5 class="card-title">Skills Page</h5>
                        <p class="card-text">Make some changes to data and content with Create, Update and Delete on the Skills page.</p>
                        <a href="/admin/skill" class="btn btn-primary">Modify</a>
                    </div>
                </div>
                <div class="card m-2" style="width: 19rem;">
                    <img src="assets/img/project-page.png" class="card-img-top" alt="Projects Page">
                    <div class="card-body">
                        <h5 class="card-title">Projects Page</h5>
                        <p class="card-text">Make some changes to data and content with Create, Update and Delete on the Projects page.</p>
                        <a href="/admin/project" class="btn btn-primary">Modify</a>
                    </div>
                </div>
                <div class="card m-2" style="width: 19rem;">
                    <img src="assets/img/contact-page.png" class="card-img-top" alt="Contact Page">
                    <div class="card-body">
                        <h5 class="card-title">Contact Page</h5>
                        <p class="card-text">Make some changes to data and content with Create, Update and Delete on the Contact page.</p>
                        <a href="/admin/contact" class="btn btn-primary">Modify</a>
                    </div>
                </div>
            </div>

        </div>

    </div>


  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>