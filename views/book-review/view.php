<?php
    $this->params['breadcrumbs'][] = ['label'=>'Book Reviews', 'url'=>'/MoccaChino/yii/web/book-review'];
    $this->params['breadcrumbs'][] = $book_title;
?>
<h1>Review for book id <?=$id?></h1>

<table class="table table-striped table-bordered">
    <tr>
        <td>Book Title</td>
        <td><?= $book_title?></td>
    </tr>
    <tr>
        <td>Author</td>
        <td><?= $author?></td>
    </tr>
    <tr>
        <td>Amazon URL</td>
        <td><?= $amazon_url?></td>
    </tr>   
</table>

<?php
    $data['company'] = "onapply"; 
    echo $this->context->renderPartial('_advert', $data);
    
    //or: echo $this->render('_advert');
