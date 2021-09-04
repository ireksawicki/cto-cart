<?php

namespace Cart;

class Delivery {

    public function getCost(float $cartValue) : float {
        if ($cartValue < 50) {
            return 4.95;
        } else if ($cartValue < 90) {
            return 2.95;
        }
        return 0;
    }

}
