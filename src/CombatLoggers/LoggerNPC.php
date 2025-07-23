<?php

namespace CombatLogger;

use pocketmine\entity\Human;
use pocketmine\entity\Location;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\entity\Skin;
use pocketmine\entity\AttributeFactory;

class LoggerNPC extends Human {

    private string $originalName;

    public function __construct(Location $location, string $name, array $inventoryItems) {
        $skin = new Skin("Standard_Custom", str_repeat("00", 8192));
        parent::__construct($location, $skin);
        $this->originalName = $name;
        $this->setNameTag("Combat Logger: " . $name);
        $this->setNameTagAlwaysVisible();
        foreach ($inventoryItems as $item) {
            $this->getInventory()->addItem($item);
        }
    }

    public static function getNetworkTypeId(): string {
        return EntityIds::HUMAN;
    }
}
