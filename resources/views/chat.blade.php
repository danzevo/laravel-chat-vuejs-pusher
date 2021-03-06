<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .list-group {
            overflow-y: auto;
            height : 200px;
        }
    </style>
</head>
<body>
    <div class="container" id="app">
        <div class="row">
            <div class="offset-md-4 col-4">
                <li class="list-group-item active">Chat Room 
                    <span class="badge badge-pill badge-danger">@{{ numberOfUsers }}</span>
                </li>
                <div class="badge badge-pill badge-primary">@{{ typing }}</div>
                <ul class="list-group" v-chat-scroll>
                    <message
                    v-for="value,index in chat.message"
                    :key="value.index"
                    :color=chat.color[index]
                    :user=chat.user[index]
                    :time=chat.time[index]
                    >@{{ value }}</message>
                </ul>
                <input type="text" v-model="message" @keyup.enter='send' class="form-control" placeholder="Type your message here..">
                <br>
                <a href='' class="btn btn-warning btn-sm" @click.prevent='deleteSession'>Delete</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>