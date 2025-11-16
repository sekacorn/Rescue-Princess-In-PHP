<?php

namespace RescuePrincess\Core;

/**
 * ASCII Art Manager
 * Because real games have graphics, but we have ASCII
 */
class AsciiArt
{
    public static function getTitle(): string
    {
        return <<<'ASCII'

╔═══════════════════════════════════════════════════════════════════════╗
║                                                                       ║
║   ____                            _   _            ______ _      _    ║
║  |  _ \ ___  ___  ___ _   _  ___ | \ | |          | ___ \ |    | |   ║
║  | |_) / _ \/ __|/ __| | | |/ _ \|  \| |          | |_/ / |__  | |_  ║
║  |  _ <  __/\__ \ (__| |_| |  __/| |\  |          |  __/|  _ \|  _| ║
║  |_| \_\___||___/\___|\__,_|\___||_| \_|          |_|   |_| |_|_|   ║
║                                                                       ║
║               THE PRINCESS IN PHP (Enterprise Edition™)              ║
║                                                                       ║
║           Proving that PHP can rescue princesses too!                ║
║                                                                       ║
╚═══════════════════════════════════════════════════════════════════════╝

ASCII;
    }

    public static function getCastle(): string
    {
        return <<<'ASCII'
                              |>>>
                              |
                    |>>>      |
                    |         |
                    |        \|/
                   \|/       |*|
                   |*|    _\<|*|>/_
        _\<|>/_  _\<|>/_  \   |*|   /
         \  |  /   \|*|/    \ \|/ /
          \ | /     |*|      \|*|/
           \|/      |*|       |*|
           |*|      |*|       |*|
           |*|      |*|       |*|
      __/\<|*|>/\__<|*|>_/\_/\|*|/\__
      \              |*|              /
       \             |*|             /
        \            |*|            /
   ~^~^~^~^~^~^~^~^~^|*|~^~^~^~^~^~^~^~
                     ~~~
      THE CASTLE OF LEGACY CODE
ASCII;
    }

    public static function getDragon(): string
    {
        return <<<'ASCII'
           ____
          /    \
         /      \
        |  O  O  |
         \  <>  /     __
          \____/    /   \
           |  |    /     \
           |  |   |  🔥   |
          _|  |_   \     /
         /      \   \___/
        /        \
       /__      __\
          |    |
          |____|

     ANCIENT DRAGON OF LEGACY CODE
ASCII;
    }

    public static function getPrincess(): string
    {
        return <<<'ASCII'
          👑
         /||\
        / || \
       /  ||  \
         /  \
        /👗 \
        |    |
       /      \
      /        \
     |          |
     |_        _|
       |      |
       |      |
      👠    👠

   PRINCESS PHPEGASUS
ASCII;
    }

    public static function getVictory(): string
    {
        return <<<'ASCII'

    ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨

       🎉  YOU DID IT IN PHP!  🎉

       The Princess has been rescued!
       Legacy code has been refactored!
       All bugs have been squashed!

       (Well, most bugs. There's always that one...)

    ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨  ✨

          ⚔️  THE END ⚔️

         (Until the sequel:
      Rescue Princess in PHP 8.4)

ASCII;
    }

    public static function getGameOver(): string
    {
        return <<<'ASCII'

    ═══════════════════════════════════════════════

              💀  GAME OVER  💀

         You were defeated by legacy code.

         Your code will be maintained by
         junior developers for eternity.

         (The true horror)

    ═══════════════════════════════════════════════

ASCII;
    }

    public static function displayWithDelay(string $art, int $delayMs = 50): void
    {
        $lines = explode("\n", $art);
        foreach ($lines as $line) {
            echo $line . PHP_EOL;
            usleep($delayMs * 1000);
        }
    }
}
