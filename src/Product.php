<?php

class Product {

    protected string $name;
    protected string $code;
    protected float $price;

    public function __construct(string $code, string $name, float $price) {
        $this->setCode($code)
            ->setName($name)
            ->setPrice($price);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Product
    {
        $this->code = $code;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

}
