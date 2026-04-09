<?php

class Page
{
    private string $name;
    private string $template;
    
    public function __construct(string $name, string $template)
    {
        $this->name = $name;
        $this->template = $template;
    }
    
    public function render(): void
    {
        echo $this->template;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
}

class BlogPage extends Page
{
    public function __construct()
    {
        $blogTemplate = '
        <div class="blog-container">
            <h2>Блог</h2>
            <div class="blog-card">
                <h3>Заголовок первой карточки</h3>
                <p>Это текст первой карточки. Здесь может быть интересный контент.</p>
                <small>Дата: 09.04.2026</small>
            </div>
            <div class="blog-card">
                <h3>Заголовок второй карточки</h3>
                <p>Это текст второй карточки. Здесь может быть интересный контент.</p>
                <small>Дата: 08.04.2026</small>
            </div>
            <div class="blog-card">
                <h3>Заголовок третьей карточки</h3>
                <p>Это текст третьей карточки. Здесь может быть интересный контент.</p>
                <small>Дата: 07.04.2026</small>
            </div>
        </div>
        ';
        
        parent::__construct('blog', $blogTemplate);
    }
}

echo '<style>
    body {
        font-family: Arial, sans-serif;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
    }
    .nav-links {
        margin-bottom: 30px;
        padding: 15px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .nav-links a {
        display: inline-block;
        margin-right: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .nav-links a:hover {
        background-color: #0056b3;
    }
    .blog-card {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }
    .blog-card:hover {
        transform: translateY(-2px);
    }
    .blog-card h3 {
        margin-top: 0;
        color: #333;
    }
    .blog-card small {
        color: #666;
        display: block;
        margin-top: 10px;
    }
    .blog-container h2 {
        color: #333;
        padding-bottom: 10px;
    }
    .default-page {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .current-page {
        margin-top: 20px;
        padding: 10px;
        background-color: #e9ecef;
        border-radius: 5px;
        font-size: 14px;
        color: #495057;
    }
</style>';

echo '<div class="nav-links">';
echo '<h3>Навигация по страницам</h3>';
echo '<a href="?page=page">Главная страница</a>';
echo '<a href="?page=blog">Блог</a>';
echo '</div>';

function renderPage(?array $getParams): void
{
    if (isset($getParams['page'])) {
        $pageName = $getParams['page'];
        
        if ($pageName === 'blog') {
            $blogPage = new BlogPage();
            $blogPage->render();
            echo '<div class="current-page">Текущая страница: Блог</div>';
        } elseif ($pageName === 'page') {
            $defaultPage = new Page('page', '<div class="default-page"><p>It is a default page</p><p>Добро пожаловать на главную страницу!</p></div>');
            $defaultPage->render();
            echo '<div class="current-page">Текущая страница: Главная</div>';
        } else {
            echo '<div class="default-page"><p>Страница не найдена. Показана страница по умолчанию.</p></div>';
            $defaultPage = new Page('page', '<div class="default-page"><p>It is a default page</p></div>');
            $defaultPage->render();
        }
    } else {
        $defaultPage = new Page('page', '<div class="default-page"><p>It is a default page</p><p>Выберите страницу в меню выше.</p></div>');
        $defaultPage->render();
        echo '<div class="current-page">Текущая страница: Главная (по умолчанию)</div>';
    }
}

renderPage($_GET);
?>
