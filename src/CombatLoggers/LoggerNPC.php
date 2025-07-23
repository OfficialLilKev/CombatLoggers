<?php

namespace CombatLogger;

use pocketmine\entity\Human;
use pocketmine\entity\Location;
use pocketmine\item\Item;
use pocketmine\entity\Skin;

class LoggerNPC extends Human {

    /**
     * @param Location $location
     * @param string $name
     * @param Item[] $inventoryItems
     */
    public function __construct(Location $location, string $name, array $inventoryItems) {
        $skin = new Skin("Standard_Custom", str_repeat("\x00", 8192));
        parent::__construct($location, $skin);

        $this->setNameTag("Combat Logger: " . $name);
        $this->setNameTagAlwaysVisible();

        foreach ($inventoryItems as $item) {
            $this->getInventory()->addItem($item);
        }
    }
}
