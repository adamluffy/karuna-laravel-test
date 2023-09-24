import { AxiosResponse } from "axios";
import axios from "../bootstrap";
import { Product } from "./product.model";

interface ApiResult {
    success: boolean
}

const name = document.getElementById("name") as HTMLInputElement;
const details = document.getElementById("details") as HTMLTextAreaElement;
const price = document.getElementById("price") as HTMLInputElement;
const publish = document.querySelector("input[name='publish']:checked") as HTMLInputElement;

export function getProductFormData() : Product {
    return {
        name: name.value,
        details: details.value,
        price: parseFloat(price.value),
        publish: publish?.value ?? "No"
    }
}

export function isFormValid() : boolean {
    return name.validity.valid &&
        details.validity.valid &&
        price.validity.valid &&
        publish.validity.valid;
}

export function redirectToProductList(result: ApiResult) {
    if(result.success) {
        window.location.href = location.origin;
    }
}


export function insertProduct() : void {

    const productData = getProductFormData();

    axios.post(`${location.origin}/product`, productData)
         .then((res: AxiosResponse<ApiResult>) => res.data)
         .then(redirectToProductList);
}


export function updateProduct(id: number) : void {

    const productData = getProductFormData();

    axios.put(`${location.origin}/product/${id}`, productData)
    .then((res: AxiosResponse<ApiResult>) => res.data)
    .then(redirectToProductList);
}


export function deleteProduct(id: number) : void {

    axios.delete(`${location.origin}/product/${id}`)
    .then((res: AxiosResponse<ApiResult>) => res.data)
    .then(redirectToProductList);
}
