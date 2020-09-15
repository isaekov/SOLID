<?php

// Нарушение принципа

class ArticleViolation {

    public function getTitle() : string
    {
        return "Wonderful morning";
    }

    public function getContent() : string
    {
        return "We have had such a wonderful morning, but we need to have a little chat, and it's a little bit serious, okay?";
    }

    public function getArticle() : array
    {
        return [
            "title" => $this->getTitle(),
            "content" => $this->getContent()
        ];
    }

    public function formatJson() : string
    {
        return json_encode($this->getArticle());
    }

}

// Соблюдение принципа

class ArticleCompliance {

    public function getTitle() : string
    {
        return "Wonderful morning";
    }

    public function getContent() : string
    {
        return "We have had such a wonderful morning, but we need to have a little chat, and it's a little bit serious, okay?";
    }

    public function getArticle() : array
    {
        return [
            "title" => $this->getTitle(),
            "content" => $this->getContent()
        ];
    }
}

interface ArticleFormattable {
    public function format(ArticleCompliance $article);
}

class JsonFormatter implements ArticleFormattable {

    public function format(ArticleCompliance $article) : string
    {
        return json_encode($article->getArticle());
    }
}
