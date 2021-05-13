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
            /* Load function on window on load */
            window.onload = function() {
                let currentURL = window.location.href;

                /* Array with elements to show/hide */
                let showHideElements = ["g_06", "customer_it_person_contact_info", "CT-ScannerProductionInfo", "RetailCT-Scanner", "InventoryCT-Scanner", "WholesaleCT-Scanner", "C-ArmProductionInfo", "X-RaysProductionInfo"];
                /* Hide elements on array */
                for (i = 0; i < showHideElements.length; i++) {
                    let elementIs = document.getElementById(showHideElements[i]);
                    elementIs.style.display = "none";
                }

                /* Add functionality to "Add New Job" form on create.blade.php */
                if (currentURL.indexOf("create") != -1 ) {
                    console.log("We are on create update page");

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

                    let showModality = "{{ $job->modality }}" + "ProductionInfo";
                    let showJobType = "{{ $job->job_type }}" + "CT-Scanner";

                    let showElements = [showModality, showJobType];
                    console.log(showElements);

                    for (i = 0; i < showElements.length; i++ ) {
                        let applyShowType = document.getElementById(showElements[i]);
                        applyShowType.style.display = "block";
                    }

                }
            }
            /* End window on load  */
            
        </script>
   </body>
</html>