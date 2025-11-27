@extends('layouts.customer-layout')
@section('title','About')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
        }

        .about-container {
            width: 90%;
            max-width: 1300px;
            margin: 0 auto;
            padding: 40px 0;
        }

        .about-grid {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 40px;
        }

        .about-card {
            flex: 1;
            height: 380px;
            background-color: #969f82; 
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 4px;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            color: #000;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .about-card:hover {
            transform: scale(1.03);
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }

        @media (max-width: 900px) {
            .about-grid {
                flex-direction: column;
            }

            .about-card {
                height: 260px;
            }
        }
    </style>
</head>

<body>

    <div class="about-container">
        <div class="about-grid">
            
            <div class="about-card">
                ABOUT US
            </div>

            <div class="about-card">
                OUR MISSION
            </div>

            <div class="about-card">
                HOW MUCH THE<br>COMMUNITY HAS<br>HELPED
            </div>

        </div>
    </div>

    <script>
        console.log("About page script loaded.");
    </script>

</body>
</html>

@endsection