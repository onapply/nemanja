<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class BookReviewController extends Controller
{
    /*
	public function actionIndex()
	{
		//echo "Hello world from 000webhost YII2 app controller :)";
		//return $this->render("Hello world from 000webhost YII2 app controller"); 
		//passing data to the view
		$data['name'] = "Nemanja";
		$data['age'] = "29";
		$data['city'] = "Vlasotince";
		return $this->render("hello_world", $data); 
	}
     */
    public function actionIndex()
    {
        /*
        $data['booksList'] = 
        [
            [
                'id'            => 1,
                'book_title'    => "Title 1",
                'author'        => "Author 1",
                'amazon_url'    => "amazon.com/book1"
            ],
            [
                'id'            => 2,
                'book_title'    => "Title 2",
                'author'        => "Author 2",
                'amazon_url'    => "amazon.com/book2"
            ],
            [
                'id'            => 3,
                'book_title'    => "Title 3",
                'author'        => "Author 3",
                'amazon_url'    => "amazon.com/book3"
            ]
        ];
        */
        $data['booksList'] = $this->actionGetBooksList();
        //echo '<pre>';print_r($data['booksList']);echo '</pre>';
        return $this->render("index2", $data);
    }
    
    public function actionView($id)
    {
        $data['id'] = $id;
        
        $booksList = $this->actionGetBooksList();
        
        foreach ($booksList as $book)
        {
            if(  $book['id'] == $id  )
            {
                //this is our target book!
                $data['book_title'] = $book['book_title'];
                $data['author'] = $book['author'];
                $data['amazon_url'] = $book['amazon_url'];
            }
            //echo "We have book ID = ".$book['id'];
        }
        
        return $this->render('view', $data);
    }
    
    //We need to make access to the booksList array from every page
    public function actionGetBooksList()
    {
        $booksList = 
        [
            [
                'id'            => 1,
                'book_title'    => "Title 1",
                'author'        => "Author 1",
                'amazon_url'    => "amazon.com/book1"
            ],
            [
                'id'            => 2,
                'book_title'    => "Title 2",
                'author'        => "Author 2",
                'amazon_url'    => "amazon.com/book2"
            ],
            [
                'id'            => 3,
                'book_title'    => "Title 3",
                'author'        => "Author 3",
                'amazon_url'    => "amazon.com/book3"
            ]
        ];
         
        return $booksList;
    }
}