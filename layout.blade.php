<!DOCTYPE html>
<html lang="en">
   <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <!-- Style -->
        <style>
            body {
                margin: 0 auto;
            }
            /* Font Sizing */
            h1 {
                font-size: 1.5em;
            }
            h2 {
                font-size: 1.3em;
            }
            /* Container */
            .container {
                padding-left: 0;
                padding-right: 0;
            }
            /* Nav Bar */
            .navbar-brand img {
                max-width: 120px;
            }
            .navbar {
                border-bottom: solid 3px #F29F05;
            }
            #mobile-nav-toggler {
                display: none;
                border: none;
                border-radius: 2px;
                background-color: #0d1f61;
                padding: 5px 7px;
                color: #fff;
            }
            /* Cards */
            .card {
                margin: 30px 16px;
            }
            .card-header {
                color: #ffffff;
                background-color: #1b4c8c;
            }
            /* Tables */
            .table-header {
                position: sticky;
            }
            /* Footer */
            footer {
                color: #ffffff;
                padding: 30px 16px;
                background-color: #141414;
                border-top: solid 3px #F29F05;
            }
            /* ===== MEDIA QUERIES ===== */
            /* Medium devices (tablets, less than 992px) */
            @media (max-width: 991.98px) { 
                #mobile-nav-toggler {
                    display: block;
                }
            }
        </style>
        
        <title>{{ config('app.name') }}</title>
   </head>
   <body>
        <header class="container">
            @include('includes.header')
        </header>
        <div class="container">
            @yield('content')
        </div>
        <footer class="container">
            @include('includes.footer')
        </footer>

        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
        <script src="https://kit.fontawesome.com/aa7ee88283.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/javascript" href="{{ url('/js/app.js') }}">
        
        <!-- Functions thst should go in /js/app.js -->
        <script type="text/javascript">
            /* jQuery Testing */
            /*
            $(document).ready(function () {
                $(".navbar").css('background-color', '#f1f1f1');

                $('#mobile-nav-toggler').click(function(event) {
                    console.log("click is working");

                    $(".navbar-collapse").toggleClass('collapse');


                });
            });
            */

            /* Load function on window on load */
            window.onload = function() {

                /* Menu toggle */
                console.log("js toggle is runnng");
                let toggleHamburger = document.getElementById("mobile-nav-toggler");
                let toggleMenu = document.getElementById("mobile-nav-content");
    
                toggleHamburger.addEventListener("click", hasClass);

                function hasClass() {
                    if(toggleMenu.classList.contains("collapse")) {
                        console.log("Collapse is present");
                        toggleMenu.classList.remove("collapse");
                    } else {
                        console.log("Collapse is NOT present");
                        toggleMenu.classList.add("collapse");
                    }


                    /*
                    if (toggleMenu.matches(".collapse")) {
                        console.log("Collapse is present");
                    } else {
                        console.log("Collapse is NOT present");
                    }
                    */
                }







                let currentURL = window.location.href;

                function hideElements() {
                    /* Array with elements to show/hide */
                    let showHideElements = ["g_06", "customer_it_person_contact_info", "CT-ScannerProductionInfo", "RetailCT-Scanner", "InventoryCT-Scanner", "WholesaleCT-Scanner", "C-ArmProductionInfo", "X-RaysProductionInfo"];
                    /* Hide elements on array */
                    for (i = 0; i < showHideElements.length; i++) {
                        let elementIs = document.getElementById(showHideElements[i]);
                        elementIs.style.display = "none";
                    }
                }

                /* Add functionality to "Add New Job" form on create.blade.php */
                if (currentURL.indexOf("create") != -1 ) {
                    console.log("We are on create page");

                    hideElements();

                    function showHideYesNo(value, element) {
                        let applyShowType = document.getElementById(element);
                        if (value === "Yes") {
                            applyShowType.style.display = "block"; 
                        }
                        else {
                            applyShowType.style.display = "none";
                        }
                    }   
                    function showHideModality(value, element) {
                        for (i = 0; i < element.length; i++) {
                            let valueSection = value + "ProductionInfo";
                            let applyShowType = document.getElementById(element[i]);
                        
                            if (valueSection === element[i]) {
                                applyShowType.style.display = "block"; 
                            }
                            else {
                                applyShowType.style.display = "none";
                            }
                        }
                    }
                    function showHideJobType(value, element) {
                        //console.log("Value is: " + value + "and the element" + element);
                        for (i = 0; i < element.length; i++) {
                            let valueSection = value + "CT-Scanner";
                            let applyShowType = document.getElementById(element[i]);
                        
                            if (valueSection === element[i]) {
                                //console.log("Show: " + element[i]);
                                applyShowType.style.display = "block"; 
                            }
                            else {
                                //console.log("Hide " + element[i]);
                                applyShowType.style.display = "none";
                            }
                        }
                    }
                /* Add functionality to "Update Job" form on update.blade.php */
                } if (currentURL.indexOf("jobs/") != -1) {
                    //console.log("We are on update page");

                    hideElements();

                    if ( "{{ $job ?? '' }}" != null ) {
                        let showModality = "{{ $job ?? ''->modality ?? '' }}" + "ProductionInfo";
                        let showJobType = "{{ $job ?? ''->job_type ?? '' }}" + "CT-Scanner";

                        let showElements = [showModality, showJobType];
                        //console.log(showElements);

                        for (i = 0; i < showElements.length; i++ ) {
                            let applyShowType = document.getElementById(showElements[i]);
                            applyShowType.style.display = "block";
                        }

                    } else {
                        //Do Nothing
                    }
                    
                    
                } else {
                    /* Do nothing */
                }
            }
            /* End window on load  */
            
        </script>
   </body>
</html>