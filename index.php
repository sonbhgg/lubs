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

?>
