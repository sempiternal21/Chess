<?php
require_once ('figure.php');
class lad extends figure
{

    public $id = "ладья";

    public function can($p1, $p2)
    {
        if (($this->position1) != $p1 and ($this->position2) != $p2)
        {
            return false;
        }
        if (($this->position1) != $p1)
        {
            if (($this->position1) < $p1)
            {
                for ($i = 0;$i < $p1;$i++)
                {
                    if ($_SESSION['board'][$i][$p2] != '')
                    {
                        echo "Вы попытались переступить через фигуру. Переходите.<br>";
                        return false;
                    }
                }
            }
            else
            {
                for ($i = ($this->position1) + 1;$i > $p1;$i--)
                {
                    if ($_SESSION['board'][$i][$p2] != '')
                    {
                        echo "Вы попытались переступить через фигуру. Переходите.<br>";
                        return false;
                    }
                }
            }
        }
        else
        {
            if (($this->position2) < $p2)
            {
                for ($i = 0;$i < $p2;$i++)
                {
                    if ($_SESSION['board'][$p1][$i] != '')
                    {
                        echo "Вы попытались переступить через фигуру. Переходите.<br>";
                        return false;
                    }
                }
            }
            else
            {
                for ($i = $p2 - 1;$i > 0;$i--)
                {
                    if ($_SESSION['board'][$p1][$i] != '')
                    {
                        echo "Вы попытались переступить через фигуру. Переходите.<br>";
                        return false;
                    }
                }
            }
        }
        if ($_SESSION['board'][$p1][$p2] == '')
        {
            return true;
        }
        if ($_SESSION['board'][$p1][$p2]->team == $_SESSION['board'][$this->position1][$this
            ->position1]
            ->team)
        {
            echo "Вы попытались напасть на своего. Переходите.<br>";
            $_SESSION['count']--;
            return false;
        }
        else
        {
            echo "Вы побили фигуру ладьей.<br>";
            return true;
        }
    }
}
?>
