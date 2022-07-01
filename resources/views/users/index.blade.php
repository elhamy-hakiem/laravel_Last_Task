

<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>  </h1>
            <br>

            {{  'Welcome , '.auth()->user()->name }}

            <br>

            @include('messages')

        </div>

        <a href="{{url('Users/Create')}}" class='btn btn-primary m-r-1em' >+ Account</a>
        <a href="{{url('Tasks')}}" class='btn btn-primary m-r-1em' >List Tasks</a>
        <a href="{{url('Logout')}}" class='btn btn-primary m-r-1em' >Logout</a>
        <br>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>


            @foreach ($data as $key => $user)
                <tr>

                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img src="{{url('images/users/'.$user->image)}}"  width="80px" height="80px" ></td>

                    <td>

                        {{-- <a href='{{url('Students/Delete/'.$student->id)}}' class='btn btn-danger m-r-1em'>Remove Raw</a> --}}

                        <a href='' data-toggle="modal" data-target="#modal_single_del{{ $user->id }}"
                            class='btn btn-danger m-r-1em'>Remove Raw</a>

                        <a href='{{ url('User/edit/' . $user->id) }}' class='btn btn-primary m-r-1em'>Update Raw</a>
                    </td>
                </tr>






                <div class="modal" id="modal_single_del{{ $user->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">delete confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                Remove Student : {{ $user->name }} !!!!
                            </div>
                            <div class="modal-footer">
                                <form action="{{ url('Students/Delete/') }}" method="post">

                                    @method('delete') {{-- <input type="hidden" name="_method" value="delete"> --}}
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $user->id }}">

                                    <div class="not-empty-record">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
