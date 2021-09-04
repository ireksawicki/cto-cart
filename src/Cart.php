<?php

class Cart {

    protected \Cart\Delivery $delivery;

    /**
     * @var Product[]
     */
    protected array $inventory = [];

    /**
     * @var \Cart\Item[]
     */
    protected array $items = [];

    /**
     * @var \Cart\SpecialOffer[]
     */
    protected array $specialOffers = [];

    public function __construct() {
        $this->inventory[] = new Product('R01', 'Red Widget', 32.95);
        $this->inventory[] = new Product('G01', 'Gree Widget', 24.95);
        $this->inventory[] = new Product('B01', 'Blue Widget', 7.95);

        $this->delivery = new \Cart\Delivery();

        $this->specialOffers[] = new \Cart\SpecialOffer\SecondRedWidgetAtHalfPrice();
    }

    public function add (string $productCode) {
        foreach ($this->inventory as $inventoryItem) {
            if ($inventoryItem->getCode() === $productCode) {
                $this->items[] = new \Cart\Item($inventoryItem);
                return;
            }
        }
        throw new \RuntimeException('Invalid product code passed: "' . $productCode . '"');
    }

    public function total () : string {
        foreach ($this->specialOffers as $specialOffer) {
            $specialOffer->apply($this);
        }

        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        $total += $this->delivery->getCost($total);

        return '$' . $total;
    }

    /**
     * @return \Cart\Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
