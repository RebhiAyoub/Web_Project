<?php

class Answer
{
    private ?int $id_answer = null;
    private ?string $title = null;
    private ?string $content = null;
    private ?string $category = null;
    private ?int $id_question = null;

    public function __construct($title, $content, $category, $id_question,$id = null)
    {
        $this->id_answer = $id;
        $this->title = $title;
        $this->content = $content;
        $this->category = $category;
        $this->id_question = $id_question;
    }

    public function getIdAnswer()
    {
        return $this->id_answer;
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

    public function getIdQuestion()
    {
        return $this->id_question;
    }

    public function setIdQuestion($id_question)
    {
        $this->id_question = $id_question;
        return $this;
    }
}
