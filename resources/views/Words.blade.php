<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Word</title>
</head>

<body>
    <h1>Insert Word</h1>

    <form method="POST" action="{{ url('api/word') }}" enctype="multipart/form-data" id="form">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" autocomplete="off" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="message"></div>
</body>

</html>
