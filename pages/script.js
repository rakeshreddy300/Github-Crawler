function getData(num){
    if(num){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } 

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("table").innerHTML = this.responseText;
            } 
        };
        xmlhttp.open("GET","result.php?user="+num,true);
        xmlhttp.send();
    }else{
        alert('enter a valid string');
    }
}




