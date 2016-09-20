/**
 * Created by hao on 9/13/16.
 */
var myspan=document.getElementById("counter");
var timer=3;
var flag;
function counting(){
    timer=timer-1;
    myspan.innerHTML=timer;
    if(timer==0){
        location.href="index.php";
        clearInterval(flag);
    }
}
flag=setInterval(counting,1000);