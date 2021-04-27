<?php

function price_view($price) {
    return str_replace(".", ",",  $price)." zł";
}
