# ⚔️ CombatLogger Plugin (PocketMine 5.31.0+)

This plugin prevents players from safely logging out during combat by spawning a **killable NPC clone** when they disconnect. The NPC drops the player's items and slightly moves around, simulating a real player left behind.

---

## 📦 Features

- ⏱️ **Combat Tag System**  
  - Players are tagged in combat when they hit or get hit by another player.
  - Combat tags last **15 seconds**.

- 💨 **Logout Punishment**  
  - If a tagged player logs out during combat, an **NPC spawns** in their place.
  - The NPC carries their **inventory**, has 20 health, and **can be killed**.

- 💥 **NPC Behavior**
  - Wanders randomly every few seconds.
  - Drops the full inventory on death.
  - Name above its head: `Combat Logger: <PlayerName>`

---

## ✅ Requirements

- **PocketMine-MP 5.0.0 API or higher**
- PHP 8.1+
- Supports Minecraft Bedrock 1.20+

---

## 📁 Installation

1. Download or clone this plugin.
2. Place the plugin folder into your server’s `/plugins` directory.
3. Start or restart your PocketMine server.

---

## 🧪 How to Test

1. Start your PocketMine 5.31.0 server with this plugin.
2. Use **two players** (or simulate with a test bot).
3. Engage in PvP.
4. Have one player log out during the fight.
5. Watch the NPC spawn and walk around. Kill it to get their loot.

---

## 🔧 Customization Ideas (not included yet)

- Add despawn timer for NPCs (after 60 seconds).
- Broadcast death message when the NPC is killed.
- Add economy rewards for killing combat loggers.
- Integrate with ban systems or punish repeated loggers.
