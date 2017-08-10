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
    
    <?php
        foreach($booksList as $book)
        {
            $id = $book['id'];
            $book_title = $book['book_title'];
            $author = $book['author'];
            $amazon_url = $book['amazon_url'];
        ?>
            <tr>
                <th>
                    <?=$book_title?>
                </th>
                <th>
                    <?=$author?>     
                </th>
                <th>
                    <a href="/MoccaChino/yii/web/book-review/view?id=<?=$id?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>View book</a>              
                </th>
            </tr>            
        <?php
        }
    ?>
            
</table>
<?php
    echo $this->context->renderPartial('_advert');