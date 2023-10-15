<?php

namespace src;

class Task
{
    private function __construct(
        public readonly string $title,
        public readonly array $children = []
    )
    {}

    public function render(string $parent = null): string
    {
        $id = self::sanatizeId((null === $parent) ? $this->title : $parent . '-' . $this->title);

        $html = "<li>{$this->title} <input id='{$id}' type='checkbox'></li>";
        if ($this->hasChildren()) {
            $html .= "<ul>";
            foreach ($this->children as $child) {
                $html .= $child->render($id);
            }
            $html .= "</ul>";
        }

        return $html;
    }

    private static function sanatizeId(string $id): string
    {
        return str_replace(' ', '_', strtolower($id));
    }

    public function hasChildren(): bool
    {
        return !empty($this->children);
    }

    public static function createFromArray(string $title, array $data): self
    {
        $children = [];
        foreach ($data as $childTitle => $childData) {
            if (is_array($childData)) {
                $children[] = self::createFromArray($childTitle, $childData);
            } else {
                $children[] = new self($childData);
            }
        }

        return new self($title, $children);
    }

}