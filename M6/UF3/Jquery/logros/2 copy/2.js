$(function() {
    var precios = $(".precio_producto").map(function() {
        return parseFloat($(this).text().replace(",", ".")) * parseFloat($(this).siblings(".cantidad_producto").text().replace(",", "."));
    }).get();

    var total = precios.reduce(function(a, b) {
        return a + b;
    }, 0);

    var totalDiv = $("<div>").addClass("precio_producto").text(total.toFixed(2));
    var cantidadDiv = $("<div>").addClass("cantidad_producto");

    $(".caja_producto").last().append(totalDiv, cantidadDiv);

    $("#total").text("total:");
    $(".caja_producto").css("background-color", "yellow");
    $(".precio_producto").append(" €");
});