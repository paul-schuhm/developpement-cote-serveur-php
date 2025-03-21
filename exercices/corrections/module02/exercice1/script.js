const selectProduct = document.getElementById('product');
const totalPrice = document.getElementById('total');
const inputQuantity = document.getElementById('quantity');
const checkboxShipping = document.getElementById('shipping');

function update_total_price() {
    const selectedProduct = selectProduct.options[selectProduct.selectedIndex];
    const shipping_extra = checkboxShipping.checked ? 5 : 0;
    const price = Number.parseInt(selectedProduct.dataset.price) * Number.parseInt(inputQuantity.value) + shipping_extra;
    totalPrice.textContent = price;
}

inputQuantity.addEventListener('change', function (event) {
    update_total_price();
});

checkboxShipping.addEventListener('change', function(event){
    update_total_price();
});

selectProduct.addEventListener('change', function (event) {
    update_total_price();
});

update_total_price();