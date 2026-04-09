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
            <div class="blog-card">
                <h3>ООП - это...</h3>
                <p>Объектно-Ориентированное Программирование — это методология программирования, в которой программа рассматривается как набор взаимодействующих объектов, а не просто последовательность инструкций. </p>
                <small>Дата: 09.04.2026</small>
            </div>
            <div class="blog-card">
                <h3>Наследование</h3>
                <p>Механизм, позволяющий создать новый класс (потомок/дочерний) на основе уже существующего (родительского/базового), перенимая его данные и методы.</p>
                <small>Дата: 08.04.2026</small>
            </div>
            <div class="blog-card">
                <h3>Абстрактный класс</h3>
                <p>Базовый класс, который определяет общий интерфейс и функционал для своих наследников, но не предназначен для создания прямых объектов (экземпляров).</p>
                <small>Дата: 07.04.2026</small>
            </div>
            <div class="blog-card">
                <h3>Полиморфизм</h3>
                <p>Способность объектов с одинаковым интерфейсом (одинаковым именем метода) вести себя по-разному в зависимости от их типа.</p>
                <small>Дата: 06.04.2026</small>
            </div>
            <div class="blog-card">
                <h3>Инкапсуляция</h3>
                <p>Принцип объединения данных (полей) и методов (функций) работы с ними в одном классе, скрывающий внутреннюю реализацию объекта от внешнего вмешательства.</p>
                <small>Дата: 06.04.2026</small>
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
echo '<h3>Хотите узнать больше о ООП?</h3>';
echo '<a href="?page=page">Не, я, вообще, учиться не люблю((((((((</a>';
echo '<a href="?page=blog">Да! Я не хочу останавливаться в развитии</a>';
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
            $defaultPage = new Page('page', 
            '<div class="default-page">
            	<p>Да уж, надеюсь, Вы хороши в чем-то другом.</p>
            	<p>Успехов!!!</p>
            </div>');
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
