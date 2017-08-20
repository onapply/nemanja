<?php
//echo "hello from the index page."
//echo '<pre>';print_r($booksList);echo '</pre>';
?>
<h1>Book Review List</h1>

<table class="table table-striped">
    <tr>
        <th>
            Book Title
        </th>
        <th>
            Author        
        </th>
        <th>
            Action 
        </th>
    </tr>
    
    
    <tr>
        <th>
            <?=$booksList[0]['book_title'];?>
        </th>
        <th>
            <?=$booksList[0]['author'];?>            
        </th>
        <th>
            <?=$booksList[0]['amazon_url'];?>                  
        </th>
    </tr>
    <tr>
        <th>
            <?=$booksList[1]['book_title'];?>
        </th>
        <th>
            <?=$booksList[1]['author'];?>            
        </th>
        <th>
            <?=$booksList[1]['amazon_url'];?>                  
        </th>
    </tr>
    <tr>
        <th>
            <?=$booksList[2]['book_title'];?>
        </th>
        <th>
            <?=$booksList[2]['author'];?>            
        </th>
        <th>
            <?=$booksList[2]['amazon_url'];?>                  
        </th>
    </tr>
</table>