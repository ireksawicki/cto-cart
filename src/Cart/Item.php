<?php

namespace Cart;

class Item {

    protected \Product $product;
    protected float $price;

    public function __construct(\Product $product) {
        $this->price = $product->getPrice();
        $this->product = $product;
    }

    public function getProduct(): \Product
    {
        return $this->product;
    }

    public function setProduct(\Product $product): Item
    {
        $this->product = $product;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Item
    {
        $this->price = $price;
        return $this;
    }

}
