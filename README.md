# Rescue the Princess in PHP (Enterprise Edition™)

> Proving that PHP can rescue princesses too! Suck it, other programming languages!

## About

This is the most gloriously over-engineered princess rescue mission ever written in PHP. What started as a joke response to the "Rescue the Princess" programming meme has evolved into a full-fledged enterprise-grade RPG featuring:

- **Enterprise Design Patterns** (Factory, Strategy, Observer, Singleton)
- **SOLID Principles** (because rescuing princesses should be maintainable)
- **Dependency Injection** (inject your way to victory!)
- **Composer Autoloading** (PSR-4 compliant princess rescue)
- **Turn-based Combat System** with PHP-themed attacks
- **Interactive CLI Gameplay** with ASCII art
- **Boss Battles** against Bugs, Guards, and Dragons
- **Inventory System** with items like "Stack Overflow Potion" and "PHP Manual"
- **Level Up System** with XP and stats

## Features

### Enterprise Architecture
- **Interfaces**: `CombatantInterface`, `InventoryInterface`, `ObserverInterface`, etc.
- **Traits**: `HasHealth`, `Observable` for shared behavior
- **Abstract Classes**: `AbstractCombatant` for DRY code
- **Design Patterns**: Factory, Strategy, Observer, Singleton
- **Namespacing**: Proper PSR-4 autoloading structure

### Game Mechanics
- **Turn-based combat** with normal and special attacks
- **Inventory system** with consumable and reusable items
- **Experience and leveling** system
- **Multiple enemies** with unique behaviors
- **Boss battles** with increased difficulty
- **Flee mechanic** (for the cowards among us)

### PHP Humor
- **Deprecation Warning** special attack
- **Stack Overflow Potion** for healing
- **PHP Manual** as a weapon (it's heavy enough!)
- **Composer Install Scroll** for full healing
- **Critical Production Bugs** as enemies
- References to PHP quirks and history throughout

## Installation

### Requirements
- PHP 7.4 or higher
- Composer

### Setup

**Windows:**
```batch
build.bat
```

**Unix/Linux/Mac:**
```bash
chmod +x build.sh run.sh
./build.sh
```

This will:
1. Install dependencies via Composer
2. Generate optimized autoloader
3. Prepare the game for running

## How to Play

### Running the Game

**Windows:**
```batch
run.bat
```

**Unix/Linux/Mac:**
```bash
./run.sh
```

**Or directly:**
```bash
php game.php
```

### Gameplay

1. **Main Menu**: Choose to approach the castle, check stats, or view help
2. **Combat**: Fight enemies using:
   - **Attack** - Normal physical attack (10-20 damage)
   - **Special Attack** - Deprecation Warning (15-30 damage)
   - **Use Item** - Heal yourself or use weapons
   - **Flee** - 50% chance to escape (coward!)
3. **Progress**: Defeat guards, the dragon, and rescue the princess!
4. **Level Up**: Gain XP from battles to become stronger

### Items

- 🧪 **Stack Overflow Potion** - Restores 50 HP
- 📚 **PHP Manual (Printed)** - Deals 30 damage (it's that heavy!)
- 📦 **Composer Install Scroll** - Fully restores HP

## 🏗️ Architecture

```
src/
├── Combat/
│   └── BattleManager.php          # Turn-based battle system
├── Core/
│   ├── AsciiArt.php               # ASCII art display
│   ├── GameLogger.php             # Singleton logger
│   └── Narrator.php               # Story narration
├── Entities/
│   ├── AbstractCombatant.php      # Base combatant class
│   ├── Knight.php                 # Player character
│   ├── Princess.php               # The rescue target
│   └── Enemies/
│       ├── Bug.php                # Critical production bug
│       ├── Dragon.php             # Legacy code dragon
│       └── Guard.php              # Strict type guard
├── Factory/
│   └── EnemyFactory.php           # Factory pattern for enemies
├── Interfaces/
│   ├── CombatantInterface.php     # Combat functionality
│   ├── InventoryInterface.php     # Inventory management
│   ├── ObserverInterface.php      # Observer pattern
│   └── SubjectInterface.php       # Subject pattern
├── Inventory/
│   └── Inventory.php              # Inventory implementation
├── Items/
│   ├── Item.php                   # Abstract item class
│   ├── ComposerInstall.php        # Full heal item
│   ├── HealthPotion.php           # HP restoration
│   └── PhpManual.php              # Weapon item
├── Strategy/
│   ├── AttackStrategy.php         # Strategy interface
│   ├── DeprecationWarning.php     # Special attack
│   └── NormalAttack.php           # Basic attack
└── Traits/
    ├── HasHealth.php              # Health management
    └── Observable.php             # Observer pattern
```

## 🎨 Design Patterns Used

1. **Factory Pattern** - `EnemyFactory` for creating enemies
2. **Strategy Pattern** - Different attack strategies (Normal, Deprecation Warning)
3. **Observer Pattern** - Event system for combat notifications
4. **Singleton Pattern** - `GameLogger` for centralized logging
5. **Template Method** - `AbstractCombatant` for common combat behavior
6. **Dependency Injection** - Constructor injection throughout

## 🤓 Technical Highlights

- **PSR-4 Autoloading** for modern PHP standards
- **Type Declarations** for better code quality
- **Interfaces & Traits** for code reusability
- **Namespacing** for proper organization
- **Composer** for dependency management
- **OOP Best Practices** (encapsulation, abstraction, polymorphism)
- **SOLID Principles** (yes, for a joke game!)

## 🎭 The Joke

This project is a response to the programming meme "Rescue the Princess in Different Languages" where PHP is portrayed as "impossible" or overly complicated. Well, we took that challenge and made it even MORE complicated... but in the best way possible!

We've proven that not only can PHP rescue the princess, but it can do so with:
- Enterprise-grade architecture
- Design patterns galore
- Clean, maintainable code
- A sense of humor about itself

## 📝 Credits

Created as a humorous response to the notion that PHP can't rescue princesses.

**Original Meme Challenge**: "Rescue the Princess in PHP = Impossible"
**Our Response**: "Hold my beer... and my Composer dependencies"

## 🤝 Contributing

This is a joke project, but if you want to add more:
- PHP-themed enemies (maybe a "Composer Hell" boss?)
- More items (Laravel Artisan Sword?)
- Additional levels (The Framework Forest?)
- More design patterns (because why not?)

Feel free to fork and make it even more ridiculous!

## 📜 License

This is free and unencumbered software released into the public domain. Use it, laugh at it, learn from it, or rescue princesses with it!

## 🎉 Final Words

Yes, PHP CAN rescue princesses!
Yes, it can do it with proper architecture!
Yes, we went way overboard!
No, we don't regret it!

Now go forth and rescue that princess! 👸⚔️🐉

---

*"In a world of microservices and serverless architectures, sometimes you just need a good old-fashioned monolithic princess rescue."*
