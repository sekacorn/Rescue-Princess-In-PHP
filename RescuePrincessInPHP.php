<?php

// Castle class represents abstractly the castle where the princess is held captive
class Castle
{
    private $princessRescued = false;

    // Method to rescue the princess
    public function rescuePrincess()
    {
        $this->princessRescued = true;
    }

    // Method to double check if the princess has been rescued
    public function isPrincessRescued()
    {
        return $this->princessRescued;
    }
}


class BlackKnight
{
    private $armor;
    private $sword;
    private $castle;

    // Constructor prepared me for trek
    public function __construct($castle)
    {
        $this->armor = 'golden';
        $this->sword = 'PHP heart sword';
        $this->castle = $castle;
    }

    // Method to attempt to rescue the princess
    public function rescuePrincess()
    {
        if (!$this->castle->isPrincessRescued()) {
            $this->castle->rescuePrincess();
            echo "Yes, I did it in PHP mates! I'm number thats number 5! Who do you think I am?";
        } else {
            echo "The princess has already been rescued!";
        }
    }
}

// Create a new version of the Castle class
$castle = new Castle();

// Create a new version of the BlackKnight class with the castle object
$knight = new BlackKnight($castle);

// Attempt to rescue the princess
$knight->rescuePrincess();
?>

