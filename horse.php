<?php
require_once ('figure.php');
class horse extends figure
{

    public $id = "конь";

    public function can($p1, $p2)
    {
        if (!(abs(($this->position1) - $p1) < 2 and abs(($this->position2) - $p2) < 3 or abs(($this->position2) - $p2) < 2 and abs(($this->position1) - $p1) < 3))
        {
            return false;
        }
        elseif ($_SESSION['board'][$p1][$p2] != '')
        {
            if ($_SESSION['board'][$p1][$p2]->name[1] == $_SESSION['board'][$this->position1][$this
                ->position2]
                ->name[1])
            {
                echo "Вы попытались атаковать своего. Переходите<br>";
                return false;
            }
            $_SESSION['board'][$p1][$p2] = '';
            echo "Вы побили фигуру.<br>";
            return true;
        }
        else
        {
            return true;
        }
    }
}
?>