@echo off
REM Run script for Windows
REM Execute the most over-engineered princess rescue ever

REM Check if vendor directory exists
if not exist "vendor\" (
    echo [ERROR] Dependencies not installed!
    echo Please run build.bat first
    echo.
    pause
    exit /b 1
)

REM Check if PHP is installed
where php >nul 2>nul
if %ERRORLEVEL% neq 0 (
    echo [ERROR] PHP is not installed or not in PATH!
    echo Please install PHP from https://www.php.net/
    echo.
    pause
    exit /b 1
)

REM Clear screen for better experience
cls

REM Run the game!
php game.php

REM Pause after game ends
echo.
pause
