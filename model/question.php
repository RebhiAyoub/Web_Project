<?php
class Question
{
    private ?int $idQuestion = null;
    private ?string $title = null;
    private ?string $content = null;
    private ?string $category = null;

    public function __construct($id = null, $title, $content, $category)
    {
        $this->idQuestion = $id;
        $this->title = $title;
        $this->content = $content;
        $this->category = $category;
    }

    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
}
