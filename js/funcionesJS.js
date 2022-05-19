$(document).ready(function() {
    //Ajax de categorias
    $(".divCategoria").click(function () {
        $(".divCategoria").css({"display": "none"});
        $("#bodyCategorias").load('index.php?accio=productosCategoria&id=' + this.id);
    });
});

$(document).ready(function() {
    //Ajax de para eliminar producto
    $(".cruzCarProd").click(function () {
        $("body").load('index.php?accio=carritoEliminar&id=' + this.id);
    });
});

function ClickBuscar()
{
    $("#buscador").css({"display":"block"});
}

$(document).ready(function() {
    // Muestra y oculta los menús
    $('ul li:has(ul)').hover(
        function(e)
        {
            $(this).children('ul').slideDown();
            $(this).find('ul').css({display: "block"});
        },
        function(e)
        {
            $(this).find('ul').css({display: "none"});
        }
    );
});

$(document).ready(function() {
    //Ir a categorias
    $(".botonCarrito1").click(function () {

        $(document).load('index.php?accio=categorias');

    });
});

$(document).ready(function() {
    //Confirmar compra con ajax
    $("#confirmarCompra").click(function () {

        $('.container').load('index.php?accio=confirmarCompra&id=-1');

    });
});


function PerfilClick()
{
    $("#perfil").css({"display":"block"});
}

function loadDescripcion(id)
{
    var x = document.getElementById(id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }

    //$("#cierraIframe").css({"display":"block"});
}