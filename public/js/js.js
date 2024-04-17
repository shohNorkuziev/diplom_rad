function filtr() {
    var selectedCategory = document.querySelector(".categoty").value;
    var productItems = document.querySelectorAll(".product_item-v");

    productItems.forEach((item)=> {
        var itemCategory = item.getAttribute("data-category");

        if (selectedCategory === "Все" || selectedCategory === itemCategory) {
            item.style.display = "block";
        } else {
            item.style.display = "none";
        }
    });
}
