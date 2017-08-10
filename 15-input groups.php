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
            <div class="input-group inpur-group-lg">
                <span class="input-group-addon">Your name</span>
                <input type="text" class="form-control" placeholder="Full Name">
            </div>
            <br/>
            
            <div class="input-group inpur-group-sm">
                <input type="text" class="form-control" placeholder="Full Name">
                <span class="input-group-btn">
                    <button class="btn btn-success btn-lg">onapply</button>
                </span>
            </div>
            <br/>
            
            <div class="row">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            onapply
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Facebook</a>
                            </li>
                            <li>
                                <a href="#">Twitter</a>                                    
                            </li>
                            <li>
                                <a href="#">GooglePlus</a>                                    
                            </li>

                        </ul>
                    </div>
                    <input type="text" class="form-control">
                </div>
            </div>
            <br/>
            
            <div class="row">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox">
                    </span>
                    <input type="text" value="form-control" />
                </div>
            </div>               
        </div>
        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--Bootstrap js-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
