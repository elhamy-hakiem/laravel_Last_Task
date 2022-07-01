<!DOCTYPE html>
<html lang="en">

<head>
    <title>create Task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container">
        <h2 class="text-center">Create Blog</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('messages')



        <form action="<?php echo url('/Tasks/Store'); ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control"  id="exampleInputName" aria-describedby=""
                    name="title" placeholder="Enter title"  value="<?php echo old('title');?>">
            </div>

            <div class="form-group">
                <label for="exampleInputName">Content</label>
                    <textarea class="form-control"  name="content" rows="10"><?php echo old('content');?>
                    </textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input class="form-control" type="file" name="image">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Start Date</label>
                <input type="date" class="form-control" id="exampleInput" name="startDate" value="<?php echo old('startDate');?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">End Date</label>
                <input type="date" class="form-control" id="exampleInput" name="endDate" value="<?php echo old('endDate');?>">
            </div>

            <button type="submit" class="btn btn-success">Add Task</button>
        </form>
    </div>


</body>

</html>
