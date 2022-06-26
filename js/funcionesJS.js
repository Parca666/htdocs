

$(document).ready(function (){
    $(".Cjuego").click(function (){
        $.ajax({url: "index.php?dest=cJuego", success: function(result){
                $(".PGuardada").html(result);
            }});
    });
});

function cargarPartida(id){
    id = id -1;
    $('.container').load('index.php?dest=cJuego&id=' + id);
}

function  eliminarPartida(id){
    id = id -1;
    $('.container').load('index.php?dest=eJuego&id='+ id);
}

function getNumRand(min, max)
{
    return Math.round(Math.random()*(max-min)+parseInt(min));
}

function tirarDados(nDados, nTurno, pos)
{
    let dado1; let dado2 = 0;
    dado1 = getNumRand(1,6);
    if(nDados === 2){  dado2= getNumRand(1,6);}
    let suma = dado1 + dado2;

    document.getElementById("btTirarDados").style.display = 'none';
    document.getElementById("divDados").style.display= 'block';

    $({deg: 0}).animate({deg:360}, {
        duration: 600,
        step: function (now) {
            var scale = (1 * now / 360)

            document.getElementById('dado1').style.transform = 'rotate(' + now + 'deg) scale(' + scale + ')';

            if(nDados === 2){
                document.getElementById('dado2').style.transform = 'rotate(' + now + 'deg) scale(' + scale + ')';
            }
        }
    });

    document.getElementById("dado1").src="./img/juego/dados/"+dado1+".svg";
    if(nDados === 2){document.getElementById("dado2").src="./img/juego/dados/"+dado2+".svg";}
    //alert(suma);

    document.getElementById("tableroFrame").src='index.php?dest=EiGame&tipo=tablero&nDado='+suma;

    setTimeout(function (){
        //alert("casilla");
        document.getElementById("cartaFrame").src='index.php?dest=EiGame&tipo=carta';
        document.getElementById("cartaFrame").style.display = 'block';
        document.getElementById("cPopUp").style.display = 'block';

    }, 1000);


}

function actStats ()
{
    $('.juego').load('index.php?dest=actStats');

    setTimeout(function (){
        //alert("casilla");
        document.getElementById("cartaFrame").style.display = 'none';
        document.getElementById("cPopUp").style.display = 'none';
        document.getElementById("btTirarDados").style.display = 'none';
        document.getElementById("divDados").style.display = 'none';
        document.getElementById("bFinalizarTurno").style.display = 'block';

    }, 10);

}

function finalizarPartida ()
{
    $('.juego').load('index.php?dest=fPartida');

    setTimeout(function (){
        //alert("casilla");
        document.getElementById("cartaFrame").style.display = 'none';
        document.getElementById("cPopUp").style.display = 'none';
        document.getElementById("btTirarDados").style.display = 'block';
        document.getElementById("divDados").style.display = 'none';
        document.getElementById("bFinalizarTurno").style.display = 'none';

    }, 10);

}

/*$(document).ready(function (){
    $(".cJuego").click(function (){
        $.ajax(ajax({url: 'index.php?dest=cPartida$id=' + this.id, success: function (juego){
            //$(document).html(juego);
                alert("hola");
            }}));
    });
});
*/


