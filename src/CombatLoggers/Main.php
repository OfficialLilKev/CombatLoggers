<?php

namespace CombatLogger;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;
use pocketmine\entity\Location;
use pocketmine\Server;
use pocketmine\scheduler\ClosureTask;
use pocketmine\world\World;

class Main extends PluginBase implements Listener {

    private array $combatTagged = [];

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onEntityDamageByEntity(EntityDamageByEntityEvent $event): void {
        $damager = $event->getDamager();
        $entity = $event->getEntity();

        if ($damager instanceof Player && $entity instanceof Player) {
            $this->combatTagged[$damager->getName()] = time();
            $this->combatTagged[$entity->getName()] = time();
        }
    }

    public function onPlayerQuit(PlayerQuitEvent $event): void {
        $player = $event->getPlayer();
        $name = $player->getName();

        if (isset($this->combatTagged[$name]) && (time() - $this->combatTagged[$name]) <= 15) {
            $this->spawnNpc($player);
            unset($this->combatTagged[$name]);
        }
    }

    private function spawnNpc(Player $player): void {
        $location = $player->getLocation();
        $world = $location->getWorld();

        $npc = new LoggerNPC($location, $player->getName(), $player->getInventory()->getContents());
        $world->addActor($npc);
    }
}
