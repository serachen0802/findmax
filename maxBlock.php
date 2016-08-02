<?php
// ChungYoProbies
header('Content-type: text/html; charset=utf-8');
//-----原陣列
//  $Z = array(
//         array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
//         array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
//         array(0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
//         array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
//         array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
//         array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
//         array(1, 1, 1, 0, 1, 0, 1, 1, 1, 1),
//         array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
//         array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
//         array(1, 1, 0, 1, 1, 0, 0, 0, 0, 1)
//     );
// -----有兩相同區塊的陣列
    $Z = array(
        array(1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
        array(1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
        array(0, 1, 1, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 1, 0, 0, 1, 1, 1, 0, 0),
        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(1, 1, 1, 0, 1, 0, 1, 1, 1, 1),
        array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
        array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 1)
    );
    $Q = new block($Z);
    //原本的陣列
    foreach($Q -> temp as $v){
       foreach($v as $value){
        echo $value." ";
        }
        echo "<br>";
    }

    
    echo "<br>";
    echo "<br>";
    
    echo "最大的陣列總和:". $Q -> score();
    
    echo "<br>";
    echo "<br>";
 foreach($Q -> temp as $v){
       foreach($v as $value){
        echo $value." ";
        }
        echo "<br>";
    }
    
    
class block{
    var $temp;
    var $temp2;
    public function __construct($array){
        $this->temp = $array;
        $this->temp2 = $array;
        }
    
    // -----計算最大分數
    // -----如果相同則都顯示
    function score(){
        $m = 1;
    for($x = 0; $x < count($this->temp); $x ++){
        for($y = 0; $y < count($this->temp[$x]); $y ++){
             $score = 0;
                if( $this -> temp[$x][$y] ){
                    $this -> temp[$x][$y] = 0;
                    $score ++;
                    $score += $this -> check($x,$y); 
                    } 
                if($score > $max){
                    $max = $score;
                    $s[0]['$x'] = $x;
                    $s[0]['$y']= $y;
                }
                if($score == $max){
                    $max = $score;
                    $s[$m]['$x'] = $x;
                    $s[$m]['$y'] = $y;
                }
            }
        }
    for($t = 0; $t <= $m; $t ++){
    $this -> show($s[$t]['$x'],$s[$t]['$y']);
    }
    return $max;
    }
    // -----重複檢查上下左右是否為1
    // -----並將數字歸0
    function check($x,$y){
        if($this -> temp[$x+1][$y]){
            $score ++;
            $this -> temp[$x+1][$y] = 0;
            $score += $this->check($x+1,$y);
        }
        if($this -> temp[$x-1][$y]){
            $score ++;
            $this -> temp[$x-1][$y] = 0;
            $score += $this->check($x-1,$y);
        }
        if($this -> temp[$x][$y+1]){
            $score ++;
            $this -> temp[$x][$y+1] = 0;
            $score += $this->check($x,$y+1);
        }
        if($this -> temp[$x][$y-1]){
            $score ++;
            $this -> temp[$x][$y-1] = 0;
            $score += $this->check($x,$y-1);
        }
       return $score;
    }
    // -----劃出陣列將數值改為1
    function show($x,$y){
        if( $this -> temp2[$x+1][$y]){
            $this -> temp2[$x+1][$y] = 0;
            $this -> temp[$x+1][$y] = 1;
            $this -> show($x+1,$y);
        }
        if( $this -> temp2[$x-1][$y]){
            $this -> temp2[$x-1][$y] = 0;
            $this -> temp[$x-1][$y] = 1;
            $this -> show($x-1,$y);
        }
        if( $this -> temp2[$x][$y+1]){
            $this -> temp2[$x][$y+1] = 0;
            $this -> temp[$x][$y+1] = 1;
            $this -> show($x,$y+1);
        }
        if( $this -> temp2[$x][$y-1]){
            $this -> temp2[$x][$y-1] = 0;
            $this -> temp[$x][$y-1] = 1;
            $this -> show($x,$y-1);
        }
    }
}
    ?>