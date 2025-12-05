@extends('layouts.customer-layout')
@section('title','Home')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            background-color: #fff;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }

        .contact-section {
            padding: 40px 0;
        }

        .contact-layout {
            display: flex;
            gap: 40px;
            justify-content: center;
            align-items: flex-start;
        }

        .contact-info-block, .contact-form-block {
            flex: 1;
            padding: 20px;
        }

        .contact-info-block {
            background-color: #92b09a; 
            color: #fff;
            min-height: 400px; 
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .contact-info-block h3 {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .contact-form-block {
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-button-container {
            margin-top: 20px;
        }

        .submit-button {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50; 
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <main class="contact-section container">
        <div class="contact-layout">
            
            <div class="contact-info-block">
                <h3>CONTACT INFO</h3>
                <p>(email address, phone number, address, etc..)</p>
                <!-- Using placeholder icons/emojis as per the wireframe text -->
                <p>📞 +44 7777 777777</p>
                <p>✉️ name@solara.com</p>
                <p>📍 Aston St, Birmingham B4 7ET</p>
            </div>

            <div class="contact-form-block">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" id="name" name="name" placeholder="name...." required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject*</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message*</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <div class="submit-button-container">
                        <button type="submit" class="submit-button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <script>
        console.log("Contact page script loaded.");
    </script>

</body>
</html>

@endsection