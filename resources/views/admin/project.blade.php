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
                <a href="/admin/project" class="nav-link active text-white d-flex align-items-center">
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
            <h1>Projects</h1>
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
                    <th scope="col">Title</th>
                    <th scope="col">Tools</th>
                    <th scope="col">Content</th>
                    <th scope="col">Link</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($projects as $index => $project)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td class="text-truncate" style="max-width: 150px;">{{ $project->title }}</td>
                    <td class="text-truncate" style="max-width: 150px;"> 
                    <?php
                           $tools = json_decode($project->tools);
                           foreach($tools as $tool) :
                          ?>
                            <i class='{{ $tool->icon }}' style="color: {{ $tool->color }}; font-size: 20px;"></i>
                    <?php endforeach; ?>
                    </td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $project->content }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $project->link }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $project->image }}</td>
                    <td>
                    <button type="button" class="btn-edit btn btn-primary btn-sm" data-id="{{ $project->id }}" data-title="{{ $project->title }}" data-tools="{{ $project->tools }}" data-content="{{ $project->content }}" data-link="{{ $project->link }}" data-image="{{ $project->image }}">
                        <i class='bx bx-pencil'></i>
                    </button>
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-id="{{ $project->id }}" >
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
                <form action="/admin/editProject" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="id" id="edit-id">
                        <input type="hidden" name="finalEditTool" id="edit-final-tool">
                        <div class="form-floating py-2">
                            <input type="text" name="title" class="form-control" id="edit-title" required>
                            <label for="edit-title">Title</label>
                        </div>
                        
                        <div id="toolSelectedEdit">
                            <!-- ini hasil pilihan tool -->
                        </div>
                        <div class="form-floating py-2">
                            <select class="form-select" name="tools" id="edit-tools" aria-label="Default select example">
                                <!-- ini option tools javascript -->
                            </select>
                            <label for="edit-tools">Tools</label>
                            <button type="button" class="btn btn-primary my-2 mx-3" onclick="selectToolEdit()">Pilih</button>
                            <button type="button" class="btn btn-danger" onclick="resetToolEdit()">Reset</button>
                        </div>
                        <div class="form-floating py-2">
                            <textarea class="form-control" name="content" id="edit-content" style="height: 100px" required></textarea>
                            <label for="edit-content">Content</label>
                        </div>
                        <div class="form-floating py-2">
                            <input type="text" name="link" class="form-control" id="edit-link" required>
                            <label for="edit-link">Link</label>
                        </div>
                        <div class="form-floating py-2">
                            <input type="text" class="form-control" id="file-name" disabled required>
                            <label for="file-name">Nama File</label>
                        </div>
                        <div class="form-floating py-4">
                            <label for="edit-image" class="form-label">Input Image</label>
                            <input class="form-control" type="file" id="edit-image" name="image">
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
                <form action="/admin/createProject" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="finalCreateTool" id="create-final-tool">
                        <div class="form-floating py-2">
                            <input type="text" name="title" class="form-control" id="create-title" required>
                            <label for="create-title">Title</label>
                        </div>
                        
                        <div id="toolSelectedCreate">
                            <!-- ini hasil pilihan tool -->
                        </div>
                        <div class="form-floating py-2">
                            <select class="form-select" name="tools" id="create-tools" aria-label="Default select example">
                                <!-- ini option tools javascript -->
                                <option selected disabled>Select Tools</option>
                            </select>
                            <label for="create-tools">Tools</label>
                            <button type="button" class="btn btn-primary my-2 mx-3 " onclick="selectToolCreate()">Pilih</button>
                            <button type="button" class="btn btn-danger" onclick="resetToolCreate()">Reset</button>
                        </div>
                        <div class="form-floating py-2">
                            <textarea class="form-control" name="content" id="create-content" style="height: 100px" required></textarea>
                            <label for="create-content">Content</label>
                        </div>
                        <div class="form-floating py-2">
                            <input type="text" name="link" class="form-control" id="create-link" required>
                            <label for="create-link">Link</label>
                        </div>
                        <div class="form-floating py-4">
                            <label for="create-image" class="form-label">Input Image</label>
                            <input class="form-control" type="file" id="create-image" name="image">
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

        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/deleteProject" method="post" enctype="multipart/form-data">
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
    <script src="/assets/js/tools.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const tools = toolsIconandColor();
        let toolSelectedEdit = null;
        let toolSelectedCreate = null;
        const toolResultEdit = $('#toolSelectedEdit');
        const toolResultCreate = $('#toolSelectedCreate');
        let arrayFinalToolEdit = [];
        let arrayFinalToolCreate = [];
        const finalToolEdit = $('#edit-final-tool');
        const finalToolCreate = $('#create-final-tool');

        const selectToolEdit = () => {
            const selectBoxEdit = $('#edit-tools');
        
            const selectValueEdit = selectBoxEdit.val();

            toolSelectedEdit = tools.find(tool => tool.id === parseInt(selectValueEdit));
    
            arrayFinalToolEdit.push({
                name: toolSelectedEdit.name,
                value: toolSelectedEdit.id,
                icon: toolSelectedEdit.icon,
                color: toolSelectedEdit.color
            });


            finalToolEdit.val(JSON.stringify(arrayFinalToolEdit));
      
            toolResultEdit.append(
                `<span class="badge rounded-pill text-bg-primary">${toolSelectedEdit.label}</span> &nbsp;`
            );

        }

        const resetToolEdit = () => {

            toolSelectedEdit = null;

            toolResultEdit.html('');
        
            arrayFinalToolEdit = [];

            finalToolEdit.val();

        }

        const selectToolCreate = () => {
            const selectBoxCreate = $('#create-tools');

            const selectValueCreate = selectBoxCreate.val();

            toolSelectedCreate = tools.find(tool => tool.id === parseInt(selectValueCreate));

            arrayFinalToolCreate.push({
                name: toolSelectedCreate.name,
                value: toolSelectedCreate.id,
                icon: toolSelectedCreate.icon,
                color: toolSelectedCreate.color
            });

            finalToolCreate.val(JSON.stringify(arrayFinalToolCreate));
      
            toolResultCreate.append(
                `<span class="badge rounded-pill text-bg-primary">${toolSelectedCreate.label}</span> &nbsp;`
            );
        }

        const resetToolCreate = () => {

            toolSelectedCreate = null;

            toolResultCreate.html('');

            arrayFinalToolCreate = [];

            finalToolCreate.val();

        }

    $(document).ready(function () {
        const tools = toolsIconandColor();

        const selectEdit = $('#edit-tools');
        const selectCreate = $('#create-tools');

        tools.forEach((tool) => {
            selectEdit.append(new Option(tool.label, tool.id));
        });

        tools.forEach((tool) => {
            selectCreate.append(new Option(tool.label, tool.id));
        });
        
        $('.btn-edit').on('click', function () {
            const fileNamePath = $(this).data('image');
            console.log(fileNamePath);
            const fileNameParts = fileNamePath.split('/');
            console.log(fileNameParts);
            const fileName = fileNameParts[fileNameParts.length -1];
            console.log(fileName);
            const fileInput = $('#file-name');
            fileInput.val(`${fileName}`);

            $('#edit-id').val($(this).data('id'));
            $('#edit-title').val($(this).data('title'));
            $('#toolSelectedEdit').val($(this).data('tools'));
            $('#edit-content').val($(this).data('content'));
            $('#edit-link').val($(this).data('link'));

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