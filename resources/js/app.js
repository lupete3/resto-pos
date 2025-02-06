import './bootstrap';

function printFacture(url) {

    const showprint = window.open(url, "_blank", "height:500, width:300");

    showprint.addEventListener("load", function(){
        showprint.print();
        showprint.addEventListener("afterprint", function(){
            showprint.close();
        });
    });

    return false;

}

window.printFacture = printFacture;
  
