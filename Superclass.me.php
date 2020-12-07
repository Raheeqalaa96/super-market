<?php

class SuperClass
{
    var $name;
    var $proname;
    var $city;
    var $dept;
    var $price;
    var $qty;

    public function getname()
    {
        return $this->name;
    }
    
    public function setprice($p)
    {
        $this->price=$p;
    }
    public function setqty($q)
    {
        $this->qty=$q;
    }

    public function setname($n){
        $this->name=$n;
    }
    public function setproname($p){
        $this->proname=$p;
    }
    public function setcity($c)
    {
        $this->city=$c;
    }
    public function setdept($d)
    {
        $this->dept=$d;
    }


    public function getproname()
    {
        return $this->proname;
    }
    public function getcity()
    {
        return $this->city;
    }
    public function getdept(){
        return $this->dept;
    }
    public function getprice()
    {
        return $this->price;
    }
    public function getqty()
    {
        return $this->qty;
    }


   public function showTotal()
{      $z= $this->getqty()* $this->getprice();  
       return $z; }

function Showpercentig ($t)
{ if($t<500)
    return 0;
else if($t<1500)
    return 0.10;
else if($t<2500)
    return 0.2;
else
    return 0.25;
}
  function ShowDiscValue($t,$y)
  {

     return $t*$y;

  }
  public function ShowAfter($t,$v)
    {
        return $t-$v;
    }


    public function ShowDelivery()
    {
        if($this->getcity()=="Cairo")
            return 40;
        else if($this->getcity()=="Giza")
            return 30;
        else 
            return 50;
    }

    public function Shownettotal($delv,$aft)
    {
        return $aft+$delv;
    }



   

}








?>