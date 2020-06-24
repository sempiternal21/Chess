<?PHP
require_once ('figure.php');
class peshka extends figure
{

    public $id = "пешка";

    public function can($p1, $p2)
    {
        if ($_SESSION['count'] < 3)
        {
            if (($this->position2) != $p2)
            {
                return false;
            }
            if (abs(($this->position1) - $p1) > 2)
            {
                return false;
            }
            return true;
        }
        if (($this->position2) != $p2)
        {
            if (abs(($this->position1) - $p1) > 1)
            {
                return false;
            }
            if ($_SESSION['board'][$p1][$p2] == '')
            {
                return false;
            }
            if ($_SESSION['board'][$this->position1][$this
                ->position2]->team != $_SESSION['board'][$this->position1][$this
                ->position2]
                ->team)
            {
                echo "Вы побили фигуру пешкой.<br>";
                return true;
            }
            else
            {
                echo "Вы попытались атаковать своего. Переходите.<br>";
                return false;
            }
        }
        if (abs(($this->position1) - $p1) > 1)
        {
            return false;
        }
        else
        {
            if ($_SESSION['board'][$p1][$p2] == '')
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
?>
