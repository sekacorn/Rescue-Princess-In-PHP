#!/bin/bash
# Build script for Unix-like systems
# Because even Linux users deserve to rescue princesses

echo ""
echo "========================================"
echo "  BUILDING RESCUE PRINCESS IN PHP"
echo "========================================"
echo ""

# Check if composer is installed
if ! command -v composer &> /dev/null; then
    echo "[ERROR] Composer is not installed!"
    echo "Please install Composer from https://getcomposer.org/"
    echo ""
    exit 1
fi

echo "[1/3] Running composer install..."
composer install

if [ $? -ne 0 ]; then
    echo "[ERROR] Composer install failed!"
    exit 1
fi

echo ""
echo "[2/3] Generating optimized autoloader..."
composer dump-autoload -o

if [ $? -ne 0 ]; then
    echo "[ERROR] Autoload generation failed!"
    exit 1
fi

echo ""
echo "[3/3] Build complete!"
echo ""
echo "========================================"
echo "  BUILD SUCCESSFUL!"
echo "========================================"
echo ""
echo "You can now run the game with: ./run.sh"
echo "Or: php game.php"
echo ""
