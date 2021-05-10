<!DOCTYPE html>
<html lang="en">
   <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
            body {
                max-width: 1024px;
                margin: 0 auto;
            }
        </style>
        
        <title>{{ config('app.name') }}</title>
   </head>
   <body>
        <header class="row">
            @include('includes.header')
        </header>
        <div class="container">
            @yield('content')
        </div>
        <footer class="row">
            @include('includes.footer')
        </footer>
        <!-- JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
        <link rel="stylesheet" type="text/javascript" href="{{ url('/js/app.js') }}">
        <!-- Functions thst should go in /js/app.js -->
        <script type="text/javascript">
            function elementShowHideYesNo(value, element) {
                let applyShowType = document.getElementById(element);
                if (value === "Yes") {
                    applyShowType.style.display = "block"; 
                }
                else {
                    applyShowType.style.display = "none";
                }
            }  
            function elementShowHideArray(value, element) {
                console.log("ShowHideArray is running, and the value is: " + value + " and element is: " + element)
                
                for (i = 0; i < element.length; i++) {
                    let valueSection = value + "ProductionInfo";
                    console.log("The Section to be displayed is: " + valueSection);
                
                    if (valueSection === element[i]) {
                        let applyShowType = document.getElementById(element[i]);
                        applyShowType.style.display = "block"; 
                    }
                    else {
                        let applyShowType = document.getElementById(element[i]);
                        applyShowType.style.display = "none";
                    }
                }
            }   
        </script>
   </body>
</html>