<?php
require_once ('figure.php');
class slon extends figure
{

    public $id = "слон";

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
                echo "Вы срубили слоном вражескую фигуру.<br>";
            }
            return true;
        }
        return false;
    }
}
?>
