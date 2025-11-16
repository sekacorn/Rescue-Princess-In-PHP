@echo off
REM Build script for Windows
REM Because even Windows users deserve to rescue princesses

echo.
echo ========================================
echo   BUILDING RESCUE PRINCESS IN PHP
echo ========================================
echo.

REM Check if composer is installed
where composer >nul 2>nul
if %ERRORLEVEL% neq 0 (
    echo [ERROR] Composer is not installed!
    echo Please install Composer from https://getcomposer.org/
    echo.
    pause
    exit /b 1
)

echo [1/3] Running composer install...
call composer install

if %ERRORLEVEL% neq 0 (
    echo [ERROR] Composer install failed!
    pause
    exit /b 1
)

echo.
echo [2/3] Generating optimized autoloader...
call composer dump-autoload -o

if %ERRORLEVEL% neq 0 (
    echo [ERROR] Autoload generation failed!
    pause
    exit /b 1
)

echo.
echo [3/3] Build complete!
echo.
echo ========================================
echo   BUILD SUCCESSFUL!
echo ========================================
echo.
echo You can now run the game with: run.bat
echo Or: php game.php
echo.
pause
