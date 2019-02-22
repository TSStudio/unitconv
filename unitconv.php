<?php
/*
Copyright 2019 TS Studio, tmy_sam
GNU GPLv3
*/
class unitconv{
    private $midnum;
    private $outnum;
    private $errormsg;
    //coefficients
    //for example:
    //km=>1000 means 1km=1000standard unit(m)
    private $length=array("m"=>1,"km"=>1000,"dm"=>0.1,"cm"=>0.01,"mm"=>0.001,"um"=>0.000001,"nm"=>0.000000001,"ly"=>9460730472580800,"ld"=>25902068371200,"in"=>0.0254,"ft"=>0.3048,"yd"=>0.9144,"nmi"=>1852,"mi"=>1609.344);
    private $weight=array("g"=>1,"kg"=>1000,"mg"=>0.001,"ug"=>0.000001,"lb"=>453.59237,"oz"=>28.3495231,"ct"=>0.2,"t"=>1000000);
    private $times=array("s"=>1,"min"=>60,"h"=>3600,"d"=>86400,"yr"=>31536000,"week"=>604800,"ms"=>0.001,"us"=>0.000001,"ns"=>0.000000001);
    private $data=array("B"=>1,"b"=>0.125,"KB"=>1024,"Kb"=>128,"MB"=>1048576,"Mb"=>131072,"GB"=>1073741824,"Gb"=>134217728);
    private $types=array("length"=>$this->length,"weight"=>$this->weight,"time"=>$this->times,"data"=>$this->data);
    private function tempconv($value1,$unit1,$unit2){
        if($unit1!="C"&&$unit1!="H"&&$unit1!="K"){
            $this->errormsg="Fatal error: Unknown Unit: ".$unit1;
            return false;
        }
        if($unit2!="C"&&$unit2!="H"&&$unit2!="K"){
            $this->errormsg="Fatal error: Unknown Unit: ".$unit2;
            return false;
        }
        if($unit1==$unit2){
            $this->errormsg="Warning: Repeating Unit: ".$unit1;
            return $value1;
        }
        //step1 convert to C
        if($unit1!="C"){
            if($unit1=="H"){
                $value1=$value1-32;
                $value1=$value1/1.8;
            }
            if($unit1=="K"){
                $value1=$value1+273.15;
            }
        }
        if($unit2=="C"){
            return $value1;
        }
        if($unit2=="H"){
            $value1=$value1*1.8;
            $value1=$value1+32;
            return $value1;
        }
        if($unit2=="K"){
            $value1=$value1-273.15;
            return $value1;
        }
        $this->errormsg="Error: Unknown Error(200)";
        return false;
    }
    public function convert($value1,$unit1,$unit2){
        if($type=="temp"){
            return $this->tempconv($value1,$unit1,$unit2);
        }
        if(empty($this->types[$type][$unit1])){
            $this->errormsg="Fatal error: Unknown Unit: ".$unit1;
            return false;
        }
        if(empty($this->types[$type][$unit2])){
            $this->errormsg="Fatal error: Unknown Unit: ".$unit2;
            return false;
        }
        $midnum=$value1/$this->types[$type][$unit1];
        $outnum=$midnum*$this->types[$type][$unit2];
        return $outnum;
    }
}