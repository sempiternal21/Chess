<?php
require_once ('figure.php');
class korol extends figure
{

    public $id = "король";

    public function can($p1, $p2)
    {
        if (abs(($this->position1) - $p1) > 1 or abs(($this->position2) - $p2) > 1)
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
