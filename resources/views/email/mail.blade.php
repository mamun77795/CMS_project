<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email from Elite Paint</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$emails->subject}}</h1>
                <p>
                    {{$emails->body}}
                </p>
                <img src="{{asset('photo')}}/{{$emails->file}}" style="height: 200px; width: 200px;" alt="">
            </div>
        </div>
    </div>
</body>
</html>