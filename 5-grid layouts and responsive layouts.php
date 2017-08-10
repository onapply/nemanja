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
            
            <!--
               Twelve column system
               large screen -> 1200px +
               medium screen -> 992px - 1200px
               small screen -> 768px - 992px
               extra small screen -> 0px - 768px
            -->
            <br/><br/><br/>
            Same sizes
            <div class="row">
                <!--
                    col-lg-nubmer of twelfths -> large screen
                    col-md-nubmer of twelfths -> medium screen
                    col-sm-nubmer of twelfths -> small screen
                    col-xs-nubmer of twelfths -> extra small screen
                -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4>Column 1</h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4>Column 2</h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                
                <div class="clearfix visible-sm"></div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4>Column 3</h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4>Column 4</h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
            <br/><br/><br/>
            Different sizes
            <div class="row">
                <!--
                    col-lg-nubmer of twelfths -> large screen
                    col-md-nubmer of twelfths -> medium screen
                    col-sm-nubmer of twelfths -> small screen
                    col-xs-nubmer of twelfths -> extra small screen
                -->
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <h4>Column 1</h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <h4>Column 2</h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                
                <div class="clearfix visible-sm"></div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h4>Column 3</h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                
            </div>
            
            <br/><br/><br/>
            Toggle divs
            <div class="row">

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <h4><a href="#col1Content" data-toggle="collapse">Column 1</a></h4>
                    <div id="col1Content" class="collapse in">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4><a href="#col2Content" data-toggle="collapse">Column 2</a></h4>
                    <div id="col2Content" class="collapse in">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>   
                </div>
                
                <div class="clearfix visible-sm"></div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4><a href="#col3Content" data-toggle="collapse">Column 3</a></h4>
                    <div id="col3Content" class="collapse in">    
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4><a href="#col4Content" data-toggle="collapse">Column 4</a></h4>
                    <div id="col4Content" class="collapse in">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>        
                </div>
            </div>
            <br/><br/><br/>
            Take elements of the screen based on the screen size
            
            <div class="well hidden-sm hidden-md hidden-lg"> <!--This guy will be hidden when it is in the small mode-->
                <p>Screen is less than 768px</p>    
            </div>
            
            <div class="well  hidden-md hidden-lg"> <!--This guy will be hidden when it is in the small mode-->
                <p>Screen is greater than 768px and less than 992px</p>    
            </div>
            
            <div class="well  hidden-lg"> <!--This guy will be hidden when it is in the small mode-->
                <p>Screen is greater than 992px and less than 1200px</p>    
            </div>
            
            <div class="well"> <!--This guy will be hidden when it is in the small mode-->
                <p>Screen is greater than 1200px</p>    
            </div>
        </div>
        
        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--Bootstrap js-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
