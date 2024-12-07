<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
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
            display: flex;
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

        .form_header{
            text-align: center;
            align-items: center;
            justify-content: center;
            display:flex;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
        }
        
        .formInput{
            display:flex;
            justify-content: center;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        input{
            display:block;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 7px;
        }

        label{
            color: whitesmoke;
        }

        button{
            padding: 5px ;
            width: 10em;
            margin-top: 7px;
            align-self: center;
            background-color: transparent;
            border-color: beige;
            color: whitesmoke;
        }

        button:hover{
            background:linear-gradient(to bottom,rgb(56, 5, 90), rgb(19, 18, 18) ) ;
        }
    </style>
</head>
<body>
    <div class="form_wrapper">
        <div  class="form_header"><h1>Register</h1></div>
        <div class="formInput">

            <Form action="{{ route('register')}}" method="POST">
                @method('POST')
                @csrf
                <label for="name">username</label>
                <input type="text" id="name" name="name" required>
        
                <label for="email">email</label>
                <input type="email" id="email" name="email" required>
        
                <label for="password">password</label>
                <input type="password" id="password" name="password" required>
        
                <a href="{{route('loginForm')}}">have account login here</a><br>
                <button type="submit">register</button>
            </Form>
        </div>
        </div>
    </div>
    
</body>
</html>