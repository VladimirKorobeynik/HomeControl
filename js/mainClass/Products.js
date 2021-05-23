class Products {

    constructor(arr) {
        this.productContainer = arr;
    }

    //Get product item
    getProduct(index) {
        return this.productContainer[index];
    }

    //Search product
    searchProduct() {

    }

    //Update product data
    updateData(arr) {
        this.productContainer = arr;
    }
}

export default Products;