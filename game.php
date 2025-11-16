<?php

/**
 * RESCUE THE PRINCESS IN PHP
 * Enterprise Edition™
 *
 * The most over-engineered princess rescue mission ever written.
 * Featuring: Design Patterns, Dependency Injection, Traits, Interfaces,
 * and enough abstraction to make your head spin!
 *
 * Because if you're going to rescue a princess in PHP,
 * you might as well do it with SOLID principles.
 */

require_once __DIR__ . '/vendor/autoload.php';

use RescuePrincess\Entities\Knight;
use RescuePrincess\Entities\Princess;
use RescuePrincess\Factory\EnemyFactory;
use RescuePrincess\Combat\BattleManager;
use RescuePrincess\Core\AsciiArt;
use RescuePrincess\Core\Narrator;
use RescuePrincess\Core\GameLogger;
use RescuePrincess\Items\HealthPotion;
use RescuePrincess\Items\PhpManual;
use RescuePrincess\Items\ComposerInstall;

/**
 * Main Game Class
 * Using a class for the game loop because procedural code is so 1995
 */
class RescuePrincessGame
{
    private Knight $knight;
    private Princess $princess;
    private GameLogger $logger;
    private bool $gameRunning = true;

    public function __construct()
    {
        $this->logger = GameLogger::getInstance();
        $this->knight = new Knight();
        $this->princess = new Princess();
    }

    /**
     * Start the epic adventure!
     */
    public function start(): void
    {
        $this->showIntro();
        $this->setupKnight();
        $this->mainGameLoop();
    }

    private function showIntro(): void
    {
        AsciiArt::displayWithDelay(AsciiArt::getTitle(), 20);
        echo PHP_EOL;

        Narrator::pause(1);

        foreach (Narrator::getIntro() as $line) {
            Narrator::tell($line, 20);
            usleep(300000); // 0.3 second pause between lines
        }

        Narrator::pause(2);
    }

    private function setupKnight(): void
    {
        Narrator::announce("PREPARING FOR YOUR QUEST");

        // Give the knight some starting items
        echo "📦 You have been given some starting equipment:" . PHP_EOL;
        $this->knight->getInventory()->addItem(new HealthPotion());
        echo "   + Stack Overflow Potion" . PHP_EOL;
        $this->knight->getInventory()->addItem(new PhpManual());
        echo "   + PHP Manual (Printed)" . PHP_EOL;
        $this->knight->getInventory()->addItem(new ComposerInstall());
        echo "   + Composer Install Scroll" . PHP_EOL;

        echo "\n[Press Enter to begin your quest...]";
        fgets(STDIN);
    }

    private function mainGameLoop(): void
    {
        while ($this->gameRunning && $this->knight->isAlive()) {
            $this->displayMainMenu();
            $choice = $this->getPlayerChoice();

            switch ($choice) {
                case '1':
                    $this->approachCastle();
                    break;
                case '2':
                    $this->knight->showStats();
                    break;
                case '3':
                    $this->showHelp();
                    break;
                case '4':
                    $this->quitGame();
                    break;
                default:
                    echo "\n❌ Invalid choice! (Unexpected T_PAAMAYIM_NEKUDOTAYIM)\n" . PHP_EOL;
            }
        }
    }

    private function displayMainMenu(): void
    {
        echo "\n" . str_repeat("═", 70) . PHP_EOL;
        echo "🏰 MAIN MENU" . PHP_EOL;
        echo str_repeat("═", 70) . PHP_EOL;
        echo "[1] Approach the Castle of Legacy Code" . PHP_EOL;
        echo "[2] Check Status (Stats & Inventory)" . PHP_EOL;
        echo "[3] Help" . PHP_EOL;
        echo "[4] Quit (Give up on the princess)" . PHP_EOL;
        echo str_repeat("═", 70) . PHP_EOL;
    }

    private function getPlayerChoice(): string
    {
        echo "Choice: ";
        return trim(fgets(STDIN));
    }

    private function approachCastle(): void
    {
        echo "\n";
        AsciiArt::displayWithDelay(AsciiArt::getCastle(), 30);
        echo PHP_EOL;

        foreach (Narrator::getCastleApproach() as $line) {
            Narrator::tell($line, 20);
            usleep(400000);
        }

        Narrator::pause(1);

        // Multiple encounters
        $this->faceGuards();

        if (!$this->knight->isAlive()) {
            $this->gameOver();
            return;
        }

        $this->faceDragon();

        if (!$this->knight->isAlive()) {
            $this->gameOver();
            return;
        }

        $this->rescuePrincess();
    }

    private function faceGuards(): void
    {
        Narrator::announce("CASTLE ENTRANCE");
        Narrator::tell("Two guards block your path!", 20);
        Narrator::pause(1);

        for ($i = 1; $i <= 2; $i++) {
            if (!$this->knight->isAlive()) break;

            echo "\n⚔️  Guard #{$i} approaches!\n" . PHP_EOL;
            $guard = EnemyFactory::create('Guard');
            $battle = new BattleManager($this->knight, $guard);

            if (!$battle->startBattle()) {
                // Player fled or lost
                if (!$this->knight->isAlive()) {
                    return;
                }
                echo "\n🏃 You fled back to safety...\n" . PHP_EOL;
                return;
            }
        }

        if ($this->knight->isAlive()) {
            Narrator::announce("GUARDS DEFEATED");
            Narrator::tell("You've cleared the entrance! The way to the tower is open.", 20);
            echo "\n[Press Enter to continue...]";
            fgets(STDIN);
        }
    }

    private function faceDragon(): void
    {
        Narrator::announce("THE DRAGON'S LAIR");

        echo "\n";
        AsciiArt::displayWithDelay(AsciiArt::getDragon(), 30);
        echo PHP_EOL;

        Narrator::tell("The Ancient Dragon of Legacy Code awakens!", 20);
        Narrator::tell("It breathes fire made of deprecated PHP 4 code!", 20);
        Narrator::tell("This is the final battle!", 20);
        Narrator::pause(2);

        $dragon = EnemyFactory::create('Dragon');
        $battle = new BattleManager($this->knight, $dragon);

        if (!$battle->startBattle()) {
            if (!$this->knight->isAlive()) {
                return;
            }
            echo "\n🏃 You fled from the dragon! The princess remains captive...\n" . PHP_EOL;
            return;
        }

        Narrator::announce("DRAGON DEFEATED!");
        Narrator::tell("The dragon crumbles into a pile of deprecated code fragments!", 20);
        Narrator::pause(2);
    }

    private function rescuePrincess(): void
    {
        if (!$this->knight->isAlive()) {
            return;
        }

        Narrator::announce("THE TOWER");

        echo "\n";
        AsciiArt::displayWithDelay(AsciiArt::getPrincess(), 30);
        echo PHP_EOL;

        Narrator::tell("You climb the tower stairs...", 20);
        Narrator::tell("At the top, you find the Princess!", 20);
        Narrator::pause(1);

        $this->princess->rescue();

        echo "\n👸 " . $this->princess->getName() . ": \"";
        Narrator::tell($this->princess->getThankYouMessage(), 30);
        echo "\"" . PHP_EOL;

        Narrator::pause(2);

        echo "\n";
        AsciiArt::displayWithDelay(AsciiArt::getVictory(), 40);

        Narrator::pause(2);

        echo "\n" . str_repeat("=", 70) . PHP_EOL;
        echo "  FINAL STATS" . PHP_EOL;
        echo str_repeat("=", 70) . PHP_EOL;
        $this->knight->showStats();

        echo "\n  Thanks for playing!" . PHP_EOL;
        echo "  Yes, PHP CAN rescue princesses!" . PHP_EOL;
        echo "  Suck it, other languages! 🎉" . PHP_EOL;
        echo str_repeat("=", 70) . "\n" . PHP_EOL;

        $this->gameRunning = false;
    }

    private function gameOver(): void
    {
        echo "\n";
        AsciiArt::displayWithDelay(AsciiArt::getGameOver(), 50);
        Narrator::pause(2);

        echo "\n💀 Would you like to try again? [Y/N]: ";
        $choice = strtoupper(trim(fgets(STDIN)));

        if ($choice === 'Y') {
            // Reset the game
            $this->knight = new Knight();
            $this->princess = new Princess();
            $this->setupKnight();
            $this->gameRunning = true;
        } else {
            Narrator::say("\nMaybe JavaScript can save her... (JK, no way)");
            $this->gameRunning = false;
        }
    }

    private function showHelp(): void
    {
        echo "\n" . str_repeat("=", 70) . PHP_EOL;
        echo "📖 HELP" . PHP_EOL;
        echo str_repeat("=", 70) . PHP_EOL;
        echo "Game Objective:" . PHP_EOL;
        echo "  Rescue Princess PHPegasus from the Castle of Legacy Code!" . PHP_EOL;
        echo PHP_EOL;
        echo "How to Play:" . PHP_EOL;
        echo "  1. Approach the castle to start your quest" . PHP_EOL;
        echo "  2. Fight enemies in turn-based combat" . PHP_EOL;
        echo "  3. Use items to heal and deal damage" . PHP_EOL;
        echo "  4. Defeat all enemies to rescue the princess!" . PHP_EOL;
        echo PHP_EOL;
        echo "Combat:" . PHP_EOL;
        echo "  - Normal Attack: Basic attack (10-20 damage)" . PHP_EOL;
        echo "  - Special Attack: Deprecation Warning (15-30 damage)" . PHP_EOL;
        echo "  - Use Item: Heal yourself or attack with items" . PHP_EOL;
        echo "  - Flee: 50% chance to escape (coward!)" . PHP_EOL;
        echo PHP_EOL;
        echo "Tips:" . PHP_EOL;
        echo "  💡 Use potions when health is low" . PHP_EOL;
        echo "  💡 Special attacks deal more damage but are risky" . PHP_EOL;
        echo "  💡 The PHP Manual can be used as a weapon!" . PHP_EOL;
        echo "  💡 Composer Install fully heals you" . PHP_EOL;
        echo str_repeat("=", 70) . "\n" . PHP_EOL;
    }

    private function quitGame(): void
    {
        echo "\n👋 Giving up already?" . PHP_EOL;
        Narrator::tell("The princess will be maintained by legacy code forever...", 20);
        Narrator::tell("(You monster.)", 20);
        echo PHP_EOL;
        $this->gameRunning = false;
    }
}

// Start the game!
try {
    $game = new RescuePrincessGame();
    $game->start();
} catch (Exception $e) {
    echo "\n💥 FATAL ERROR: {$e->getMessage()}" . PHP_EOL;
    echo "Stack trace (because this is PHP):" . PHP_EOL;
    echo $e->getTraceAsString() . PHP_EOL;
}
