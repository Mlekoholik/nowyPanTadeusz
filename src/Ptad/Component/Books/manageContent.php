<?php

namespace Ptad\Component\Books;
use vendor\Symfony\Component\Filesystem\Filesystem;

class manageContent {
    private $books;
    private $allbooks;
    private $json;

    public function SaveContentToFile($book_title, $book_content) {
        $addToFile = new \Symfony\Component\Filesystem\Filesystem();
        $this->books[] = array('title' => $book_title, 'content' => $book_content);
        $this->json = json_encode($this->books);
        $addToFile->dumpFile("./books.json", $this->json);
    }
    
    public function getContent($book_number) {
        $decode = json_decode(file_get_contents("./books.json"));
        return array("title" => $decode[$book_number-1]->title, "content" => $decode[$book_number-1]->content);
    }

}
