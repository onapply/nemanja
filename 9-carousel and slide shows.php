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
        
        <div id="onapply" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#onapply" data-slide-to="0" class="active"></li>
                <li data-target="#onapply" data-slide-to="1"></li>
                <li data-target="#onapply" data-slide-to="2"></li>                
            </ol>
            
            <div class="carousel-inner">
                <div class="item active">
                    <img src="img/1.jpg" alt="Cool">
                    <div class="carousel-caption">
                        <h1>Amazing photo</h1>
                    </div>
                </div>
                <div class="item">
                    <img src="img/2.jpg" alt="Cool">
                    <div class="carousel-caption">
                        <h1>Amazing photo</h1>
                    </div>
                </div>
                <div class="item">
                    <img src="img/3.jpg" alt="Cool">
                    <div class="carousel-caption">
                        <h1>Amazing photo</h1>
                    </div>
                </div>
            </div>
        
            <a class="left carousel-control" href="#onapply" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#onapply" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--Bootstrap js-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
