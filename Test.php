<?php

echo "<div style='text-align:center; font-size:36px;'>";
$origin = array(
        array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
        array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(1, 1, 1, 0, 1, 0, 1, 1, 1, 1),
        array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
        array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 1)
    );
    
// $origin = array(
//         array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
//         array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
//         array(0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
//         array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
//         array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
//         array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
//         array(1, 1, 1, 0, 1, 1, 1, 1, 1, 1),
//         array(1, 0, 1, 0, 1, 0, 1, 1, 1, 1),
//         array(1, 0, 1, 1, 1, 0, 1, 1, 1, 1),
//         array(1, 1, 1, 1, 1, 0, 0, 0, 0, 1)
//     );

    
    $data = array();
    $temp = array();
    
    for ($x = 0; $x < 10; $x++)
    {
        for ($y = 0; $y < 10; $y++)
        {
            if ($origin[$x][$y] == 1)
            {   
                $IsExist = false;
                for ($c = 0 ; $c < count($temp); $c++) {
                    if (strpos($temp[$c], '('.$x.':'.$y.')' ) !== false) {
                        if ($origin[$x + 1][$y] == 1) {
                            $temp[$c] .= '('.($x + 1).':'.$y.')';
                        }
                        if ($origin[$x - 1][$y] == 1) {
                            $temp[$c] .= '('.($x - 1).':'.$y.')';
                        }
                        if ($origin[$x][$y + 1] == 1) {
                            $temp[$c] .= '('.$x.':'.($y + 1).')';
                        }
                        if ($origin[$x][$y - 1] == 1) {
                            $temp[$c] .= '('.$x.':'.($y - 1).')';
                        }
                        $IsExist = true;
                    }
                }
                
                if (!$IsExist) {
                    $gh = '('.$x.':'.$y.')';
                    
                        if ($origin[$x + 1][$y] == 1) {
                            $gh .= '('.($x + 1).':'.$y.')';
                        }
                        if ($origin[$x - 1][$y] == 1) {
                            $gh .= '('.($x - 1).':'.$y.')';
                        }
                        if ($origin[$x][$y + 1] == 1) {
                            $gh .= '('.$x.':'.($y + 1).')';
                        }
                        if ($origin[$x][$y - 1] == 1) {
                            $gh .= '('.$x.':'.($y - 1).')';
                        }   
                    array_push($temp, $gh);
                }
            }
        }
    }
    
    $maxStr = 0;
    for ($c = 0 ; $c < count($temp); $c++) {
        if (strlen($temp[$c]) > $maxStr) {
            $maxStr = strlen($temp[$c]);
        }
    }
    
    
    for ($c = 0 ; $c < count($temp); $c++) {
        if (strlen($temp[$c]) == $maxStr) {
            $final = $temp[$c];
        }
    }
    
    for ($x = 0; $x < 10; $x++)
    {
        for ($y = 0; $y < 10; $y++)
        {
            if (strpos($final, '('.$x.':'.$y.')' ) !== false) {
                $data[$x][$y] = 1;
            }
        }
    }
    
    for ($x = 0; $x < 10; $x++)
    {
        for ($y = 0; $y < 10; $y++)
        {
            if ($data[$x][$y] > 0)
                echo $data[$x][$y];
            else
                echo 0;
        }
        echo "<br/>";
    }
    
    echo "</div>";
    
    echo $maxStr;

?>