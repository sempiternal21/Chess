<?php
require_once ('figure.php');
class ferz extends figure
{

    public $id = "ферзь";

    public function can($p1, $p2)
    {
        if (abs(($this->position1) - ($p1)) == abs(($this->position2) - ($p2)))
        {
            $x = abs(($this->position1) - ($p1));
            if (($this->position1) > ($p1) and ($this->position2) > ($p2))
            {
                for ($i = 1;$i < $x;$i++)
                {
                    if ($_SESSION['board'][($this->position1) + $i][($this->position2) + $i] != '')
                    {
                        return false;
                    }
                }
            }
            elseif (($this->position1) < ($p1) and ($this->position2) < ($p2))
            {
                for ($i = 1;$i < $x;$i++)
                {
                    if ($_SESSION['board'][($this->position1) - $i][($this->position2) - $i] != '')
                    {
                        return false;

                    }
                }
            }
            elseif (($this->position1) < ($p1) and ($this->position2) > ($p2))
            {
                for ($i = 1;$i < $x;$i++)
                {
                    if ($_SESSION['board'][($this->position1) + $i][($this->position2) - $i] != '')
                    {
                        return false;
                    }
                }
            }
            else
            {
                for ($i = 1;$i < $x;$i++)
                {
                    if ($_SESSION['board'][($this->position1) - $i][($this->position2) + $i] != '')
                    {
                        return false;
                    }
                }
            }
            if ($_SESSION['board'][$p1][$p2] != '')
            {
            	$_SESSION['board'][$p1][$p2]->live = 0;
                echo "Вы срубили ферзем вражескую фигуру<br>";
            }
            return true;
        }
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
            echo "Вы побили фигуру ферзем.<br>";
            return true;
        }
    }
}
?>
