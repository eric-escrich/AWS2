// Esta funcion hace una peticion a la API para obtener todos los productos
// No tiene parametros de entrada y te devuelve un objeto json con todos los productos

// @return object
async function getProductos() {
    const url = 'https://localhost/productos';
    try {
        let response = await fetch(url);
        let products = await response.json();
        return products;
    } catch (error) {
        console.error('Error:', error);
    }
}

// Esta funcion hace una peticion a la API para obtener la informacion de un producto mediante su id
// Tiene un parametro de entrada que es el id del producto que quieres obtener
// Devuelve un objeto json con la informacion del producto

// @param productId - string
// @return object
async function getInfoProductById(productId) {
    const url = `https://localhost/productos/${productId}`;
    try {
        let response = await fetch(url);
        let product = await response.json();
        return product;
    } catch (error) {
        console.error('Error:', error);
    }
}

// Esta funcion crea una lista de productos. Si clicas en un producto te muestra la descripcion
// Recibe un parámetro de entrada que es un objeto json de productos
// No devuelve nada

// @param products - object
function showProducts(products) {
    let productList = $('<ul>');

    products.forEach(product => {
        let listItem = $('<li>');
        listItem.attr('id', product.id);
        listItem.text(`Name: ${product.name}, Price: ${product.price}`);
        listItem.on('click', function() {
            showProductInfo(product.id);
        });
        productList.append(listItem);
    });

    let h1 = $('h1');
    h1.after(productList);
}

// Esta funcion muestra la descripcion de un producto
// Recibe un parámetro de entrada que es el id del producto
// No devuelve nada

// @param productId - string
function showProductInfo(productId) {
    let product = getInfoProductById(productId);
    let productInfo = $('<div>');
    productInfo.text(`Description: ${product.description}`);
    let li = $("#" + productId);
    li.after(productInfo);
}

$(function() {
    let products = getProductos();
    showProducts(products);
});

