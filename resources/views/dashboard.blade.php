<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family:Verdana, Tahoma, sans-serif;
            
        }

        h1{ 
            display:flex;
            text-align: center;
            color: white;
        }

        body{
            display:flex;
            height: 100vh;
            background: linear-gradient(135deg, rgba(54, 39, 152, 0.8), rgba(239, 48, 77, 0.8));
            background-size: 200% 200%;
            animation: gradientBG 10s ease infinite;
            justify-content: center;
            align-items: center;
            
            /* background-color: rgb(42, 42, 44); */
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .dash_wrapper{
            text-align: center;
            justify-content: center;
            display:flex;
            flex-direction: column;
        }

        .dash_header{
            display:flex;
            text-align: center;
            justify-content: center;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            display:block;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 7px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
        }

        .dash_show{
            display:flex;
            text-align: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.25);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
            display:block;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 7px;
        }

        .dash_show, p, h2{
            color:white;
        }
    </style>
</head>
<body>
    <div class="dash_wrapper">
        <div class="dash_header"><h1> Welcome, {{Auth::user()->profile->name}}!</h1><h1>This is your dashboard.</h1></div>
        <div class="dash_show">
            <h2>Your Information</h2>
            <p>Name: {{ Auth::user()->profile ? Auth::user()->profile->name : 'No profile available' }}</p>
            <p>Bio: {{ Auth::user()->profile ? Auth::user()->profile->bio : 'No profile available' }}</p>
            <p>Age: {{ Auth::user()->profile ? Auth::user()->profile->age : 'No profile available' }}</p>
            @if(Auth::user()->profile && Auth::user()->profile->image)
                <p>Profile Image:</p>
                <img src="{{ asset('storage/' . Auth::user()->profile->image) }}" alt="Profile Image" style="max-width: 200px;">
            @else
                <p>No image available</p>
            @endif

            <form action="{{route('logout')}}" method="POST">
                @method('POST')
                @csrf
                <button type="submit">logout</button>
            </form>
        </div>
    </div>
    
</body>
</html>