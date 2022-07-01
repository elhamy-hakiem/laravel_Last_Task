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
            <h1>{{  'Read , '.auth()->user()->name .'Tasks'}}</h1>

            <br>


            @include('messages')
        </div>

        <a href="{{url('Tasks/Create')}}" class='btn btn-primary m-r-1em' >+ Task</a>
        <a href="{{url('Logout')}}" class='btn btn-primary m-r-1em' >Logout</a>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Images</th>
                <th>Start Date </th>
                <th>End Date </th>
                <th>Action</th>
            </tr>


            @foreach ($tasksData as $key => $task)


                <tr>

                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ date('Y-m-d', (int)$task->startDate)}}</td>
                    <td>{{ date('Y-m-d', (int)$task->endDate)}}</td>
                    <td><img src="{{ url('images/tasks/' . $task->image) }}" width="80px" height="80px"></td>

                    <td>
                        <a href='{{url('Tasks/Delete/'.$task->id)}}' class='btn btn-danger m-r-1em'>Delete</a>
                        <a href='' class='btn btn-primary m-r-1em'>Edit</a>
                    </td>
                </tr>
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
