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
        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
                <a href="/dashboard" class="nav-link d-flex text-white align-items-center" aria-current="page">
                    <i class='bx bxs-dashboard px-2'></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/admin/hero" class="nav-link active text-white d-flex align-items-center">
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
            <h1>Hero</h1>
            <hr>
            <button type="button" class="btn-create btn btn-primary btn-sm mb-4">Create new data</button>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($heros as $index => $hero)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td class="text-truncate" style="max-width: 150px;">{{ $hero->name }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $hero->content }}</td>
                    <td>
                    <button type="button" class="btn-edit btn btn-primary btn-sm" data-id="{{ $hero->id }}" data-name="{{ $hero->name }}" data-content="{{ $hero->content }}">
                        <i class='bx bx-pencil'></i>
                    </button>
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-id="{{ $hero->id }}" >
                        <i class='bx bxs-trash-alt'></i>
                    </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/editHero" method="post">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-floating py-2">
                            <input type="text" name="name" class="form-control" id="edit-name" required>
                            <label for="edit-name">Name</label>
                        </div>
                        <div class="form-floating">
                        <textarea class="form-control" name="content" id="edit-content" style="height: 100px"></textarea>
                            <label for="edit-content">Content</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/createHero" method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="form-floating py-2">
                            <input type="text" name="name" class="form-control" id="create-name" required>
                            <label for="create-name">Name</label>
                        </div>
                        <div class="form-floating">
                        <textarea class="form-control" name="content" id="create-content" style="height: 100px"></textarea>
                            <label for="create-content">Content</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/deleteHero" method="post">
                    <div class="modal-body">
                        @method('delete')
                        @csrf
                        
                        <input type="hidden" name="id" id="delete-id">
                        <p>This data will be deleted. are you sure want to delete this data?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function () {
        $('.btn-edit').on('click', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const content = $(this).data('content');

            $('#edit-id').val(id);
            $('#edit-name').val(name);
            $('#edit-content').val(content);

            $('#modalEdit').modal('show');
        });

        $('.btn-create').on('click', function () {

            $('#modalCreate').modal('show');
        });

        $('.btn-delete').on('click', function () {

            $('#delete-id').val($(this).data('id'));
            $('#modalDelete').modal('show');
        });
    });
</script>
</body>
</html>