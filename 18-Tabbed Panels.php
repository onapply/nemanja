<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <!--Tel IE to use the latest rendering engine-->
        <meta http-equiv="X-UA-Compatibile" content="IE=edge">
        <!--Set the page width to the size of the device and set the zoom level to 1-->
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Bootstrap Tutorial</title>
       
        <!--Bootstrap css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
           
        </style>
    </head>
    
    <body>
     
        <div class="container">
            <ul class="nav nav-pills">
                <li class="active"><a href="#superman">Superman</a></li>
                <li><a href="#batman">Batman</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Flash
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="disabled"><a href="#theFlash">The Flash</a></li>
                        <li><a href="#kidFlash" data-toggle="tab">Kid Flash</a></li>
                    </ul>
                </li>
            </ul>
            
            <div class="tab-content">
                <div id="superman" class="tab-pane fade in active">
                    Superman
                </div>  
                <div id="batman" class="tab-pane fade ">
                    Batman
                </div>    
                <div id="theFlash" class="tab-pane fade ">
                    The Flash
                </div>  
                <div id="kidFlash" class="tab-pane fade ">
                    Kid Flash
                </div>  
            </div>
        </div>
        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--Bootstrap js-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
