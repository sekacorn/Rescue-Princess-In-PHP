<?php

namespace RescuePrincess\Combat;

use RescuePrincess\Entities\Knight;
use RescuePrincess\Interfaces\CombatantInterface;
use RescuePrincess\Core\GameLogger;
use RescuePrincess\Strategy\DeprecationWarning;
use RescuePrincess\Strategy\NormalAttack;

/**
 * Battle Manager
 * Manages turn-based combat with epic PHP-themed battles
 */
class BattleManager
{
    private GameLogger $logger;
    private Knight $knight;
    private CombatantInterface $enemy;

    public function __construct(Knight $knight, CombatantInterface $enemy)
    {
        $this->knight = $knight;
        $this->enemy = $enemy;
        $this->logger = GameLogger::getInstance();
    }

    /**
     * Start an epic battle!
     */
    public function startBattle(): bool
    {
        $this->displayBattleStart();

        while ($this->knight->isAlive() && $this->enemy->isAlive()) {
            $this->displayBattleStatus();
            $action = $this->getPlayerAction();

            switch ($action) {
                case '1':
                    $this->playerAttack();
                    break;
                case '2':
                    $this->playerSpecialAttack();
                    break;
                case '3':
                    $this->playerUseItem();
                    break;
                case '4':
                    if ($this->attemptFlee()) {
                        return false;
                    }
                    break;
                default:
                    echo "Invalid action! (Syntax Error)" . PHP_EOL;
                    continue 2; // Skip enemy turn
            }

            if (!$this->enemy->isAlive()) {
                return $this->handleVictory();
            }

            // Enemy turn
            $this->enemyAttack();

            if (!$this->knight->isAlive()) {
                return $this->handleDefeat();
            }
        }

        return false;
    }

    private function displayBattleStart(): void
    {
        echo "\n" . str_repeat("⚔️ ", 25) . PHP_EOL;
        echo "  BATTLE START!" . PHP_EOL;
        echo "  {$this->knight->getName()} vs {$this->enemy->getName()}" . PHP_EOL;
        echo str_repeat("⚔️ ", 25) . "\n" . PHP_EOL;
    }

    private function displayBattleStatus(): void
    {
        echo "\n┌" . str_repeat("─", 48) . "┐" . PHP_EOL;
        echo "│ 👤 {$this->knight->getName()}" . PHP_EOL;
        echo "│    HP: " . $this->createHealthBar($this->knight) . PHP_EOL;
        echo "├" . str_repeat("─", 48) . "┤" . PHP_EOL;
        echo "│ 💀 {$this->enemy->getName()}" . PHP_EOL;
        echo "│    HP: " . $this->createHealthBar($this->enemy) . PHP_EOL;
        echo "└" . str_repeat("─", 48) . "┘" . PHP_EOL;
    }

    private function createHealthBar(CombatantInterface $combatant): string
    {
        $percentage = $combatant->getHealth() / $combatant->getMaxHealth();
        $barLength = 20;
        $filledLength = (int)($barLength * $percentage);
        $emptyLength = $barLength - $filledLength;

        $bar = str_repeat("█", $filledLength) . str_repeat("░", $emptyLength);
        return "[{$bar}] {$combatant->getHealth()}/{$combatant->getMaxHealth()}";
    }

    private function getPlayerAction(): string
    {
        echo "\n⚡ Your turn! Choose your action:" . PHP_EOL;
        echo "  [1] Attack (Normal)" . PHP_EOL;
        echo "  [2] Special Attack (Deprecation Warning)" . PHP_EOL;
        echo "  [3] Use Item" . PHP_EOL;
        echo "  [4] Flee (run like your code from code review)" . PHP_EOL;
        echo "\nChoice: ";

        return trim(fgets(STDIN));
    }

    private function playerAttack(): void
    {
        $this->knight->setAttackStrategy(new NormalAttack());
        $damage = $this->knight->attack($this->enemy);
        echo "\n💥 You deal {$damage} damage to {$this->enemy->getName()}!" . PHP_EOL;
        $this->pause();
    }

    private function playerSpecialAttack(): void
    {
        $this->knight->setAttackStrategy(new DeprecationWarning());
        $damage = $this->knight->attack($this->enemy);
        echo "\n⚡ Your special attack deals {$damage} damage!" . PHP_EOL;
        $this->pause();
    }

    private function playerUseItem(): void
    {
        $items = $this->knight->getInventory()->listItems();

        if (empty($items)) {
            echo "\n📦 Your inventory is empty!" . PHP_EOL;
            return;
        }

        echo "\n📦 Choose an item:" . PHP_EOL;
        $index = 1;
        $itemNames = [];
        foreach ($items as $item) {
            echo "  [{$index}] {$item->getName()}" . PHP_EOL;
            $itemNames[$index] = $item->getName();
            $index++;
        }
        echo "  [0] Cancel" . PHP_EOL;
        echo "\nChoice: ";

        $choice = trim(fgets(STDIN));

        if ($choice === '0') {
            echo "Cancelled." . PHP_EOL;
            return;
        }

        if (isset($itemNames[(int)$choice])) {
            $this->knight->getInventory()->useItem($itemNames[(int)$choice], $this->knight);
        } else {
            echo "Invalid choice!" . PHP_EOL;
        }

        $this->pause();
    }

    private function attemptFlee(): bool
    {
        $chance = rand(1, 100);

        if ($chance <= 50) {
            echo "\n🏃 You successfully fled the battle!" . PHP_EOL;
            echo "   (Like switching to Python)" . PHP_EOL;
            return true;
        } else {
            echo "\n❌ Failed to flee! The {$this->enemy->getName()} blocks your path!" . PHP_EOL;
            echo "   (You're stuck with PHP like the rest of us)" . PHP_EOL;
            $this->pause();
            return false;
        }
    }

    private function enemyAttack(): void
    {
        echo "\n💀 {$this->enemy->getName()}'s turn!" . PHP_EOL;
        $damage = $this->enemy->attack($this->knight);
        echo "   You take {$damage} damage!" . PHP_EOL;
        $this->pause();
    }

    private function handleVictory(): bool
    {
        echo "\n" . str_repeat("✨ ", 25) . PHP_EOL;
        echo "  🎉 VICTORY! 🎉" . PHP_EOL;
        echo "  You defeated {$this->enemy->getName()}!" . PHP_EOL;
        echo str_repeat("✨ ", 25) . PHP_EOL;

        // Gain XP
        if (method_exists($this->enemy, 'getExperienceReward')) {
            $xp = $this->enemy->getExperienceReward();
            $this->knight->gainExperience($xp);
        }

        $this->pause();
        return true;
    }

    private function handleDefeat(): bool
    {
        echo "\n" . str_repeat("💀 ", 25) . PHP_EOL;
        echo "  ☠️  DEFEAT ☠️ " . PHP_EOL;
        echo "  You were defeated by {$this->enemy->getName()}!" . PHP_EOL;
        echo "  Your code will live on in legacy systems..." . PHP_EOL;
        echo str_repeat("💀 ", 25) . PHP_EOL;

        $this->pause();
        return false;
    }

    private function pause(): void
    {
        echo "\n[Press Enter to continue...]";
        fgets(STDIN);
    }
}
