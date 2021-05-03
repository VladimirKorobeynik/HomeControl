class Cart {
    cartContainer = [];

    addProduct(productObj) {
        let dublicate = 0

        this.cartContainer.forEach(element => {
            if (productObj.device_id == element.device_id) {
                element.countBuy = element.countBuy + 1;
                dublicate++;
            }
        });
        if (dublicate == 0) {
            productObj.countBuy = 1;
            this.cartContainer.push(productObj);
        }
    }

    createOrder() {

    }

    deleteProduct(index) {
        let newCartContainer = [];
        this.cartContainer.map((elem, indexElem) => {
            if (indexElem != index) {
                newCartContainer.push(elem);
            } else {
                this.updateCartCounter(elem.countBuy, false);
            }
        });
        this.cartContainer = newCartContainer;
    }

    getCountAddedProduct() {
        return this.cartContainer.length;
    }

    calculateTotalCost() {
        let totalCost = 0;
        if (this.cartContainer.length > 0)
            this.cartContainer.map(elem => {
                totalCost += elem.price * elem.countBuy;
            });
        return totalCost;
    }

    outProductInCart() {
        let cartOutContainer = document.getElementById('addedCardGrid');
        let totalCostContainer = document.getElementById('totalCost');

        this.calculateTotalCost();

        cartOutContainer.innerHTML = '';

        if (this.getCountAddedProduct() > 0) {
            this.cartContainer.map(element => {
                cartOutContainer.innerHTML += `
                <div class="added_product_card block_theme">
                    <div class="added_card_head">
                        <img src="${element.image}" alt="">
                    </div>
                    <div class="added_card_content">
                        <div class="product_info">
                            <h4 class="name_product">${element.name}</h4>
                            <div class="in_stock_block">
                                <span class="in_stock">
                                    <img src="photo/checkmark.png" alt="">
                                </span>
                                <p>in stock</p>
                            </div>
                            <p class="price">${element.price}грн</p>
                        </div>
                        <div class="count_product">
                            <div class="input_incrementation">
                                <button class="decr" id="decr">-</button>
                                <input type="text" value="${element.countBuy}" id="countInput" disabled>
                                <button class="incr" id="incr">+</button>
                            </div>
                            <div class="total_cost_block">
                                <span class="total_cost">${element.price * element.countBuy}грн</span>
                            </div>
                        </div>
                    </div>
                    <div class="added_card_delete">
                        <img src="photo/closeIconBlack.png" alt="X">
                        <img src="photo/closeIconWhite.png" alt="X">
                    </div>
                </div>`
            });

            //Cart product count
            let arrAddedproduct = Array.from(document.getElementsByClassName('added_product_card'));

            for (let i = 0; i < arrAddedproduct.length; i++) {
                let decr = arrAddedproduct[i].childNodes[3].childNodes[3].childNodes[1].childNodes[1];
                let input = arrAddedproduct[i].childNodes[3].childNodes[3].childNodes[1].childNodes[3];
                let incr = arrAddedproduct[i].childNodes[3].childNodes[3].childNodes[1].childNodes[5];
                let deleteBtn = arrAddedproduct[i].childNodes[5];
                let totalCostOneProduct = arrAddedproduct[i].childNodes[3].childNodes[3].childNodes[3].childNodes[1];
                let obj = this;

                deleteBtn.onclick = function() {
                    obj.deleteProduct(i);
                    obj.outProductInCart();
                }

                decr.onclick = function() {
                    if (input.value > 1) {
                        input.value = +input.value - 1;
                        obj.cartContainer[i].countBuy = obj.cartContainer[i].countBuy - 1;
                        totalCostOneProduct.innerHTML = obj.cartContainer[i].countBuy * obj.cartContainer[i].price + 'грн';
                        totalCostContainer.innerHTML = obj.cartContainer[i].countBuy.countBuy + 'грн';
                        totalCostContainer.innerHTML = obj.calculateTotalCost() + 'грн';
                        obj.updateCartCounter(1, false);
                    }
                }

                incr.onclick = function() {
                    input.value = +input.value + 1;
                    obj.cartContainer[i].countBuy = obj.cartContainer[i].countBuy + 1;
                    totalCostOneProduct.innerHTML = obj.cartContainer[i].countBuy * obj.cartContainer[i].price + 'грн';
                    totalCostContainer.innerHTML = obj.cartContainer[i].countBuy.countBuy + 'грн';
                    totalCostContainer.innerHTML = obj.calculateTotalCost() + "грн";
                    obj.updateCartCounter(1, true);
                }

                totalCostContainer.innerHTML = this.calculateTotalCost() + 'грн';
            }
        } else {
            cartOutContainer.innerHTML = '<p class="text_empty_cart">Ваша корзина пуста</p>';
            totalCostContainer.innerHTML = 0 + 'грн';
        }
    }

    updateCartCounter(num, modeUpdate) {
        let cartCounter = document.getElementById('cartCounter');
        if (modeUpdate) {
            cartCounter.innerHTML = +cartCounter.innerText + num;
        } else {
            cartCounter.innerHTML = +cartCounter.innerText - num;
        }
    }
}