<html>

<head>
    <title>Todolist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        /* Include the padding and border in an element's total width and height */
        * {
            box-sizing: border-box;
            font-family: Nunito, san-serif;
        }

        /* Remove margins and padding from the list */
        ul {
            margin: 0;
            padding: 0;
        }

        /* Style the list items */
        ul li {
            position: relative;
            padding: 12px 8px 12px 40px;
            background: #eee;
            font-size: 18px;
            transition: 0.2s;
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
            justify-content: flex-start;
            /* make the list items unselectable */
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Set all odd list items to a different color (zebra-stripes) */
        ul li:nth-child(odd) {
            background: #f9f9f9;
        }

        /* Darker background-color on hover */
        ul li:hover {
            background: #ddd;
        }

        ul li .task {
            flex-grow: 1;
        }

        ul li .action {
            margin: 5px 15px;
            vertical-align: middle;
        }

        ul li a {
            color: grey;
        }

        /* Style the header */
        .header {
            background-color: #f44336;
            padding: 30px 40px;
            color: white;
            text-align: center;
        }

        /* Clear floats after the header */
        .header:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the input */
        input {
            margin: 0;
            border: none;
            border-radius: 0;
            width: 75%;
            padding: 10px;
            float: left;
            font-size: 16px;
        }

        /* Style the "Add" button */
        .addBtn {
            padding: 10px;
            width: 25%;
            background: #d9d9d9;
            color: #555;
            float: left;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 0;
            border: none;
        }

        .addBtn:hover {
            background-color: #bbb;
        }

        .notif {
            background: #82E0AA;
            color: #000;
            font-size: 25px;
            width: 100%;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
            transition: all .3s ease;
        }

    </style>
</head>

<body>
    @if (session('success_added'))
    <div class="notif">
        <div class="alert alert-success">
            {{ session('success_added') }}
        </div>
    </div>
    @endif

    @error('coun_w')
    <div class="notif">
        <div class="alert alert-success">{{ $message }}
        </div>
    </div>
    @enderror



    @if (session('field__empty'))
    <div class="notif">
        <div class="alert alert-success">{{ session('field__empty') }}
        </div>
    </div>
    @endif

    @if (session('success_updated'))
    <div class="notif">
        <div class="alert alert-success"> {{ session('success_updated') }}
        </div>
    </div>
    @endif

    @if (session('success_deleted'))
    <div class="notif">
        <div class="alert alert-success">
            {{ session('success_deleted') }}
        </div>
    </div>

    @endif
    <div class="global__wrapper">

        <form action="{{ route('updateTask', [$taskUnderEdit->id]) }}" method="POST">
            {{ csrf_field() }}

            <div id="myDIV" class="header">
                <h2>Edit task</h2>
                <input type="text" name="updatedTaskName" value='{{$taskUnderEdit->note}}' autocomplete='off'>
                <button type="submit" class="addBtn">Save changres</button>
                <a href="{{ url('/') }}" class='addBtn'>Go Back</a>
                @csrf
            </div>


        </form>
    </div>
</body>

</html>
