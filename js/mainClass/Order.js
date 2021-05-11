class Order {

    constructor(isActive, orderDate, arrDevices) {
        // this.userID = userID;
        this.isActive = isActive;
        this.orderDate = orderDate;
        this.arrDevices = arrDevices;
        arrDevices.forEach(element => {
            this.amount += element.countBuy;
            this.totalCost += element.price * element.countBuy;
        });
    }

    //Out order data
    outOrderDetails() {
        let orderedProductBlock = document.getElementById('orderProductsBlock');

        orderedProductBlock.innerHTML = '';

        this.arrDevices.forEach(element => {
            orderedProductBlock.innerHTML += `
            <div class="order_product_card">
                <div class="product_image">
                    <img src="${element.image}" alt="">
                </div>
                <div class="product_content">
                    <div class="product_name"><p>${element.name}</p></div>
                    <div class="order_price_block">
                        <div class="one_product_price"><span>${element.price}грн</span></div>
                        <div class="count_price">
                            <div class="count_product">${element.countBuy} <span>шт.</span></div>
                            <div class="devider"></div>
                            <span class="total_product_cost">${element.countBuy * element.price}грн</span>
                        </div>
                    </div>
                </div>
            </div>`
        });
    }

    //Calculate total cost
    getTotalCost() {
        let totalCostOrder = 0;
        this.arrDevices.forEach(element => {
            totalCostOrder += element.price * element.countBuy;
        });
        return totalCostOrder;
    }
}

export default Order;