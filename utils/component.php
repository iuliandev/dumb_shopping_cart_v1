<?php

function component($product_name, $product_price, $product_prev_price, $product_description, $product_image, $product_id) {
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
    <form action=\"index.php\" method=\"post\">
        <div class=\"card d-flex justify-content-center shadow bg-white rounded\">
            <div class=\"img__box p-3 d-flex justify-content-center\">
                <img src=\"$product_image\" alt=\"product__img\" class=\"img-fluid card-img-top\">
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">
                    $product_name
                </h5>
                <h6>
                    <i class=\"bx bxs-star\"></i>
                    <i class=\"bx bxs-star\"></i>
                    <i class=\"bx bxs-star\"></i>
                    <i class=\"bx bxs-star\"></i>
                    <i class=\"bx bxs-star-half\"></i>
                </h6>
                <p class=\"card-text\">
                    $product_description
                </p>
                <h5>
                    <small><s class=\"text-secondary\">$$product_prev_price</s></small>
                    <span class=\"price\">$$product_price</span>
                </h5>
                <button type=\"submit\" name=\"add\" class=\"btn btn-warning my-3\">Add to Cart<i class=\"bx bxs-cart\"></i></button>
                <input type=\"hidden\" name=\"product_id\" value=\"$product_id\" />
            </div>
        </div>
    </form>
</div>
    ";
    echo $element;
}

function cartElement($product_image, $product_name, $product_price, $product_id){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$product_id\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$product_image alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$product_name</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">$$product_price</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class='bx bxs-minus-circle' ></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class='bx bxs-plus-circle' ></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}