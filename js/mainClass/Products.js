class Products {

    constructor(arr) {
        this.productContainer = arr;
    }

    outProduct() {
        let mainCardGrid = document.getElementById('mainCardGrid');
        let cardMode1 = document.getElementById('mode1');
        let cardMode2 = document.getElementById('mode2');
        let mode;

        if (cardMode1 == true) {
            mode = 'card_mode_tile'
        } else {
            mode = 'card_mode_tile_long'
        }

        if (this.productContainer != null) {

            mainCardGrid.innerHTML = '';

            this.productContainer.forEach(elem => {
                mainCardGrid.innerHTML += `
            <div class="card_wrapper ${mode}">
                <div class="card">
                    <div class="product_image">
                        <img src="${elem.image}"alt="">
                    </div>
                    <div class="min_describe">
                        <h4 class="name_product">${elem.name}</h4>
                        <div class="in_stock_block">
                            <span class="in_stock">
                                <img src="photo/checkmark.png" alt="">
                            </span>
                            <p>in stock</p>
                        </div>
                    </div>
                    <div class="more_describe">
                        <p>${elem.description}</p>
                    </div>
                    <div class="buy_block">
                        <span class="price">${elem.price}грн</span>
                        <button class="standart_btn buy_btn">Buy</button>
                    </div>
                </div>
            </div>`;
            });
        }

    }

    getProduct(index) {
        return this.productContainer[index];
    }

    searchProduct() {

    }

    updateData(arr) {
        this.productContainer = arr;
    }
}

export default Products;