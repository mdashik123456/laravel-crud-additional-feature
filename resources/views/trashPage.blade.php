<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD Project</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <nav class="navbar navbar-dark bg-dark justify-content-center">
        <h3 class="text-light my-3">CRUD (Create, Read, Update, Delete) using Laravel</h3>
    </nav>

    <div class="container">

        <br><h2 class="text-center">Trash List</h2>
        <div class="d-flex flex-row">
            <a href="{{url('/')}}" class="btn btn-outline-dark mt-5 mb-2" >Employee List</a>
            &nbsp;&nbsp;<a href="" class="btn btn-danger mt-5 mb-2">Trash</a>
        </div>

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">About Users</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emps as $emp)
                    <tr>
                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->email }}</td>
                        <td>{{ $emp->age }}</td>
                        <td>{{ $emp->gender }}</td>
                        <td>{{ $emp->dob }}</td>
                        <td>{{ $emp->about_user }}</td>
                        <td>
                            {{-- This is update icon --}}
                            <a href="{{ url('/trashPage/restore') }}/{{ $emp->id }}" class="link-dark"><i
                                    class="fa-solid fa-refresh fs-5 me-3"></i></a>

                            {{-- This is delete icon --}}
                            <a href="{{ url('/trashPage/delete') }}/{{ $emp->id }}" class="link-dark"><i
                                    class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
