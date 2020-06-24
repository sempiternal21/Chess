<?php
require_once ('peshka.php');
require_once ('lad.php');
require_once ('horse.php');
require_once ('slon.php');
require_once ('korol.php');
require_once ('ferz.php');
session_start();

//$_SESSION = array();
class apitest extends apiBaseClass
{

    //http://www.example.com/?apitest.game={"TestParamOne":"fff"}
    function game($apiMethodParams)
    {
        $retJSON = $this->createDefaultJson();

        if (isset($apiMethodParams->TestParamOne))
        {
            $retJSON->retParameter = $apiMethodParams->TestParamOne;
        }
        else
        {
            $retJSON->errorno = APIConstants::$ERROR_PARAMS;
        }
        $retJSON = (array)$retJSON;
        $ans = implode("", $retJSON);
        if ($ans == 'check')
        {
            if (!isset($_SESSION['count']))
            {
                echo "Матч не идет<br>";
            }
            else
            {
                echo "Номер хода: " . $_SESSION['count'];
                echo " Матч идет <br>";
                echo '<pre>';
                var_dump($_SESSION['board']);
                echo '</pre>';
            }
        }
        elseif ($ans == 'new')
        {
            $_SESSION = array();
        }
        else
        {
            $this->play($ans);
        }
    }
    public function play($ans)
    {

        if (!isset($_SESSION['count']))
        {
            $_SESSION['count'] = 1; // текущий ход
            $peshka1 = new peshka(1, 0, 'P1', 1, 1);
            $peshka2 = new peshka(1, 1, 'P2', 1, 1);
            $peshka3 = new peshka(1, 2, 'P3', 1, 1);
            $peshka4 = new peshka(1, 3, 'P4', 1, 1);
            $peshka5 = new peshka(1, 4, 'P5', 1, 1);
            $peshka6 = new peshka(1, 5, 'P6', 1, 1);
            $peshka7 = new peshka(1, 6, 'P7', 1, 1);
            $peshka8 = new peshka(1, 7, 'P8', 1, 1);

            $peshka9 = new peshka(6, 0, 'P1', 2, 1);
            $peshka10 = new peshka(6, 1, 'P2', 2, 1);
            $peshka11 = new peshka(6, 2, 'P3', 2, 1);
            $peshka12 = new peshka(6, 3, 'P4', 2, 1);
            $peshka13 = new peshka(6, 4, 'P5', 2, 1);
            $peshka14 = new peshka(6, 5, 'P6', 2, 1);
            $peshka15 = new peshka(6, 6, 'P7', 2, 1);
            $peshka16 = new peshka(6, 7, 'P8', 2, 1);

            $lad1 = new lad(0, 0, 'L1', 1, 1);
            $lad2 = new lad(0, 7, 'L2', 1, 1);

            $lad3 = new lad(7, 0, 'L1', 2, 1);
            $lad4 = new lad(7, 7, 'L2', 2, 1);

            $horse1 = new horse(0, 1, 'H1', 1, 1);
            $horse2 = new horse(0, 6, 'H2', 1, 1);

            $horse3 = new horse(7, 1, 'H1', 2, 1);
            $horse4 = new horse(7, 6, 'H2', 2, 1);

            $slon1 = new slon(0, 2, 'S1', 1, 1);
            $slon2 = new slon(0, 5, 'S2', 1, 1);

            $slon3 = new slon(7, 2, 'S1', 2, 1);
            $slon4 = new slon(7, 5, 'S2', 2, 1);

            $korol1 = new korol(0, 4, 'K1', 1, 1);
            $korol2 = new korol(7, 4, 'K1', 2, 1);

            $ferz1 = new ferz(0, 3, 'F1', 1, 1);
            $ferz2 = new ferz(7, 3, 'F1', 2, 1);

            $_SESSION['board'] = array(
                array(
                    $lad1,
                    $horse1,
                    $slon1,
                    $ferz1,
                    $korol1,
                    $slon2,
                    $horse2,
                    $lad2
                ) , //ЧЕРНАЯ СТОРОНА
                array(
                    $peshka1,
                    $peshka2,
                    $peshka3,
                    $peshka4,
                    $peshka5,
                    $peshka6,
                    $peshka7,
                    $peshka8
                ) ,
                array(
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ) ,
                array(
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ) ,
                array(
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ) ,
                array(
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ) ,
                array(
                    $peshka9,
                    $peshka10,
                    $peshka11,
                    $peshka12,
                    $peshka13,
                    $peshka14,
                    $peshka15,
                    $peshka16
                ) ,
                array(
                    $lad3,
                    $horse3,
                    $slon3,
                    $ferz2,
                    $korol2,
                    $slon4,
                    $horse4,
                    $lad4
                )
            );; // доска с фигурами
            
        }
        else
        {
            ++$_SESSION['count'];
        }

        $figure = $ans[0] . $ans[1];
        if ($_SESSION['count'] % 2 == 1)
        {
            $team = 2;
        }
        else
        {
            $team = 1;
        }
        switch ($ans[2])
        {
            case 'a':
                $p2 = 0;
            break;
            case 'b':
                $p2 = 1;
            break;
            case 'c':
                $p2 = 2;
            break;
            case 'd':
                $p2 = 3;
            break;
            case 'e':
                $p2 = 4;
            break;
            case 'f':
                $p2 = 5;
            break;
            case 'g':
                $p2 = 6;
            break;
            case 'h':
                $p2 = 7;
            break;
        }
        $p1 = abs(8 - $ans[3]);

        switch ($figure[0])
        {
            case 'P':
                $s = 'пешкой';
            break;
            case 'L':
                $s = 'ладьей';
            break;
            case 'H':
                $s = 'конем';
            break;
            case 'S':
                $s = 'слоном';
            break;
            case 'K':
                $s = 'королем';
            break;
            case 'F':
                $s = 'ферзем';
            break;
        }
        if ($_SESSION['count'] % 2 == 1)
        {
            echo "Белые сходили " . $s . ' на ' . $ans[2] . $ans[3] . ". Черные, делайте ход.<br>";
        }
        else
        {
            echo "Черные сходили " . $s . ' на ' . $ans[2] . $ans[3] . ". Белые, делайте ход.<br>";
        }
        echo "<br>";

        foreach ($_SESSION['board'] as $v1)
        {
            foreach ($v1 as $v2)
            {
                if ($v2->name == $figure and $_SESSION['count'] % 2 != $v2->team % 2)
                {
                    $now = $v2;
                    if ($_SESSION['board'][$now->position1][$now
                        ->position2]
                        ->doWalk($p1, $p2))
                    {
                        $_SESSION['board'][$now->position1][$now
                            ->position2]
                            ->go($p1, $p2);
                        if ($_SESSION['board'][1][5]->team == 2 and $_SESSION['board'][4][2] != '')
                        {
                            echo "Мат черным. Начните новую игру";
                        }
                    }

                }
            }
        }
    }

}
?>