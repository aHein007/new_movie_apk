<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body style="background-color:#262B36 ;color:white">
    <form action="{{ route("logout") }}" method="post" >
        @csrf
        <div class="model shadow-lg" style=" text-align:center;margin-top:200px;">
            <h3 class="mb-4 p-3 ">Are You Sure Want to Exit?</h3>
            <button class="btn btn-danger me-3 mb-4 px-5">Yes</button>
            <a href="{{ route('user#userPage') }}"><button type="button" class="btn btn-secondary mb-4 px-5">No</button></a>
        </div>
        
    </form>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</html>
