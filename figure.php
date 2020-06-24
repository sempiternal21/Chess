<?php
class figure
{

    public $position1;
    public $position2;
    public $name;
    public $team;
    public $live;

    public function __construct($a, $b, $c, $d, $e)
    {
        $this->position1 = $a;
        $this->position2 = $b;
        $this->name = $c;
        $this->team = $d;
        $this->live = $e;
    }

    public function go($p1, $p2)
    {
        if ($this->can($p1, $p2))
        {
            $_SESSION['board'][$p1][$p2] = $this;
            $_SESSION['board'][$this->position1][$this->position2] = '';
            $this->position1 = $p1;
            $this->position2 = $p2;
            echo "Ход сделан.<br>";
        }
        else
        {
            echo "Ход невозможен. Переходите<br>";
            $_SESSION['count']--;
        }
    }

    public function doWalk($p1, $p2)
    {
        if (($this->position1) == $p1 and ($this->position2) == $p2)
        {
            echo "Вы не сдвинули фигуру с места. Переходите<br>";
            $_SESSION['count']--;
            return false;
        }
        return true;
    }
}
?>
