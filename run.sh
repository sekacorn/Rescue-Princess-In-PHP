#!/bin/bash
# Run script for Unix-like systems
# Execute the most over-engineered princess rescue ever

# Check if vendor directory exists
if [ ! -d "vendor" ]; then
    echo "[ERROR] Dependencies not installed!"
    echo "Please run ./build.sh first"
    echo ""
    exit 1
fi

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "[ERROR] PHP is not installed!"
    echo "Please install PHP from your package manager"
    echo ""
    exit 1
fi

# Clear screen for better experience
clear

# Run the game!
php game.php
