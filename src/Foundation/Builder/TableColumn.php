<?php

namespace App\Foundation\Builder;

class TableColumn
{

    /**
     * @var string
     */
    public string $column = " ";

    /**
     * @var string
     */
    public string $name = " ";

    /**
     * @var string|null
     */
    public ?string $class = " ";

    /**
     * @var bool|null
     */
    public ?bool $isSortable = false;

    /**
     * @var bool|null
     */
    public ?bool $isSearchable = false;


    public static function create(): self
    {
        return new self;
    }

    /**
     * @return string
     */
    public function getColumn(): string
    {
        return $this->column;
    }

    /**
     * @param string $column
     * @return self
     */
    public function setColumn(string $column): self
    {
        $this->column = $column;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getClass(): ?string
    {
        return $this->class;
    }

    /**
     * @param string|null $class
     * @return self
     */
    public function setClass(?string $class): self
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsSortable(): ?bool
    {
        return $this->isSortable;
    }

    /**
     * @param bool|null $isSortable
     * @return self
     */
    public function setIsSortable(?bool $isSortable): self
    {
        $this->isSortable = $isSortable;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsSearchable(): ?bool
    {
        return $this->isSearchable;
    }

    /**
     * @param bool|null $isSearchable
     * @return self
     */
    public function setIsSearchable(?bool $isSearchable): self
    {
        $this->isSearchable = $isSearchable;
        return $this;
    }

}
