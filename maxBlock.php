<?php
// ChungYoProbies
 $QAQ = array(
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
    
    $qoo= new block($QAQ);
    foreach($qoo->temp as $v){
       foreach($v as $y){
        echo $y.",";
        }
        echo "<br>";
    }
    
    echo "<br>";
    echo "<br>";
    
    echo $qoo->cc();
    
    echo "<br>";
    echo "<br>";
 foreach($qoo->temp as $v){
       foreach($v as $y){
        echo $y.",";
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
    
    function cc(){
    for($x = 0; $x < 10; $x ++){
        for($y = 0; $y < 10; $y ++){
             $score = 0;
                if( $this->temp[$x][$y] ){
                    $this->temp[$x][$y] = 0;
                    $score ++;
                    $score += $this->check($x,$y); 
                    } 
                if($score > $max){
                    $max = $score;
                    $sera['zz']=$x;
                    $sera['oo']=$y;
                }
            }
            
        }
    //   echo $max;
    $this->show($sera['zz'],$sera['oo']);
    return $max;
        
    }
    
    
    function check($x,$y){
        // global temp;
        if($this->temp[$x+1][$y]){
            $score ++;
            $this->temp[$x+1][$y] = 0;
            $score +=$this->check($x+1,$y);
        }
        if($this->temp[$x-1][$y]){
            $score ++;
            $this->temp[$x-1][$y] = 0;
            $score +=$this->check($x-1,$y);
        }
        if($this->temp[$x][$y+1]){
            $score ++;
            $this->temp[$x][$y+1] = 0;
            $score +=$this->check($x,$y+1);
        }
        if($this->temp[$x][$y-1]){
            $score ++;
            $this->temp[$x][$y-1] = 0;
            $score +=$this->check($x,$y-1);
        }
       return $score;
    }
        
        
    function show($x,$y){
        // global temp;
        // global temp2;
        if( $this->temp2[$x+1][$y]){
            $this->temp2[$x+1][$y]=0;
            $this->temp[$x+1][$y]=1;
            $this->show($x+1,$y);
        }
        if( $this->temp2[$x-1][$y]){
            $this->temp2[$x-1][$y]=0;
            $this->temp[$x-1][$y]=1;
            $this->show($x+1,$y);
        }
        if( $this->temp2[$x][$y+1]){
            $this->temp2[$x][$y+1]=0;
            $this->temp[$x][$y+1]=1;
            $this->show($x,$y+1);
        }
        if( $this->temp2[$x][$y-1]){
            $this->temp2[$x][$y-1]=0;
            $this->temp[$x][$y-1]=1;
            $this->show($x,$y-1);
        }
        
    }
}
    
    
    ?>