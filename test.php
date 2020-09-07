<?php
   
class Robot
{
    private $x;
    private $y;
    private $orientation;
    private $moves;
    private $obstacles;
    public $euclidean;

    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->orientation = 0; 
        $this->moves = [];
        $this->obstacles = [];
        $this->euclidean = 0;
        $this->loadFile();
        $this->movement();
    }
    
    private function loadFile()
    {
        $counter = 0;
        foreach(file('test.txt') as $line) {
            $counter++;
            if ($counter == 1) {
                $config = explode (" ", $line);
                $obstaclesAmount = $config[0];
                $movementAmount = $config[1];
            }
            if ($counter >= 2 && $counter <= $obstaclesAmount + 1) {
                $this->obstacles[] = $line;
            }
            if ($counter > $obstaclesAmount + 1 && $counter <= $movementAmount + $obstaclesAmount + 1) {
               $this->moves[] = $line;
            }
        }
    }

    private function changeOrientation($turn)
    {
        if ($turn == 'R') {
            if ($this->orientation == 3) {
                $this->orientation = 0;
            } else {
                $this->orientation++;
            } 
        } elseif ($turn == 'L') {
            if ($this->orientation == 0) {
                $this->orientation = 3;
            } else {
                $this->orientation--;
            } 
        }
    }

    private function walk($steps)
    {
        for ($i=0; $i < $steps; $i++) {
            if ($this->orientation == 0) {
                foreach ($this->obstacles as $obstacle)
                {
                    $stop = explode(" ", $obstacle);
                 
                    if ($this->x == $stop[0] && $this->y + 1 == $stop[1]) {
                        break 2;
                    }
                }
                $this->y += 1;
            }
            if ($this->orientation == 1) {
                foreach ($this->obstacles as $obstacle)
                {
                    $stop = explode(" ", $obstacle);
                 
                    if ($this->x +1 == $stop[0] && $this->y == $stop[1]) {
                        break 2;
                    }
                }    
                $this->x += 1;  
            }
            if ($this->orientation == 2) {
                foreach ($this->obstacles as $obstacle)
                {
                    $stop = explode(" ", $obstacle);
                 
                    if ($this->x == $stop[0] && $this->y - 1 == $stop[1]) {
                        break 2;
                    }
                }
                $this->y -= 1;  
            }
            if ($this->orientation == 3) {
                foreach ($this->obstacles as $obstacle)
                {
                    $stop = explode(" ", $obstacle);

                    if ($this->x - 1 == $stop[0] && $this->y == $stop[1]) {
                        break 2;
                    }
                }
                $this->x -= 1;   
            }   
        } 
        $this->euclidean();
    }

    private function movement()
    {
        foreach($this->moves as $move) {
            $command = $move[0];

            switch($command) {
                case "M":
                    $steps = explode(" ", $move);
                    $this->walk($steps[1]);
                
                    break;
                case "R":
                case "L":
                    $this->changeOrientation($command);

                    break;
                default:
                    break;
            }
        }
        
    }

   public function euclidean()
    {   
        $distance = round(sqrt(pow (($this->x), 2) + (pow (($this->y), 2))), 2);

    if ($this->euclidean < $distance) {
        $this->euclidean = $distance;
        }
    }
}

$robot = new Robot;

echo $robot->euclidean;

?>