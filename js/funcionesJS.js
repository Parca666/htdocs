

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

function tirarDados(nDados)

/*$(document).ready(function (){
    $(".cJuego").click(function (){
        $.ajax(ajax({url: 'index.php?dest=cPartida$id=' + this.id, success: function (juego){
            //$(document).html(juego);
                alert("hola");
            }}));
    });
});
*/
