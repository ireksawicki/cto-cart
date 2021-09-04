<?php

namespace Cart\SpecialOffer;

use Cart\Item;
use Cart\SpecialOffer;

class SecondRedWidgetAtHalfPrice extends SpecialOffer {

    private bool $hasRedWidgetInCart = false;
    private bool $hasAppliedSecondWidgetDiscount = false;

    public function apply(\Cart &$cart)
    {
        $items = $cart->getItems();
        foreach ($items as $item) {
            if ($item->getProduct()->getCode() === 'R01') {
                if ($this->hasRedWidgetInCart) {
                    if ($this->hasAppliedSecondWidgetDiscount) {
                        $this->hasRedWidgetInCart = false;
                        $this->hasAppliedSecondWidgetDiscount = false;
                    } else {
                        $item->setPrice($this->calculateDiscountedItemPrice($item));
                        $this->hasAppliedSecondWidgetDiscount = true;
                        $this->hasRedWidgetInCart = false;
                    }
                } else {
                    $this->hasRedWidgetInCart = true;
                }
            }
        }
    }

    public function calculateDiscountedItemPrice(Item $item) : float {
        $oldPrice = $item->getProduct()->getPrice();
        $newPrice = round(floor($oldPrice*100/2)/100, 2);
        return $newPrice;
    }

}
