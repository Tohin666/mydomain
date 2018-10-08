<?php
function getCatalog()
{
    $sql = "SELECT * FROM products";
    $catalog = returnQueryAll($sql);
    closeConnection();
    return $catalog;
}

function getProduct($id)
{
    // защита от sql-инъекций
    $id = (int)mysqli_escape_string(getConnection(), $id);

    $sql = "SELECT * FROM products where id = {$id}";
    $product = returnQueryOne($sql);
    closeConnection();
    return $product;
}

function getProducts($ids)
{
    $sql = "SELECT * FROM products where id IN ({$ids})";
    $products = returnQueryAll($sql);
    closeConnection();
    return $products;
}

/**
 * Функция возвращает содержимое корзины.
 * @return array|null $cartArray - Возвращает массив с товарами, где нулевой индекс содержит общую сумму.
 */
function getCart()
{
    // Сохраняем в переменную содержимое корзины из сессии.
    $sessionCart = $_SESSION['cart'];
    if ($sessionCart) {
        // Так как id товаров хранятся в виде ключей массива корзины - извлекаем их в одну строку.
        $ids = implode(',', array_keys($sessionCart));
        // Получаем массив товаров из базы по их айдишникам.
        $products = getProducts($ids);
        $cartArray = [];
        $totalSum = null;
        // Перебираем товары.
        foreach ($products as $product) {
            // Добавляем к каждому товару его количества, которое берем из сессии.
            $product['quantity'] = $sessionCart[$product['id']];
            // Считаем общую сумму товара.
            $product['sum'] = $product['price'] * $product['quantity'];
            // Считаем общую сумму всего заказа.
            $totalSum += $product['sum'];
            // Добавляем товар в массив товаров.
            $cartArray[] = $product;
        }
        // Добавляем сумму заказа в нулевой индекс массива товаров.
        array_unshift($cartArray, $totalSum);
        return $cartArray;
    } else {
        return null;
    }
}

function addProductsToOrder($orderID, $productsArray)
{
    foreach ($productsArray as $product) {
        if (gettype($product) == 'array') {
            // Добавил в таблицу сумму товара.
            $sql = "INSERT INTO order_list (order_id, product_id, quantity, sum) 
                    VALUES ({$orderID}, {$product['id']}, {$product['quantity']}, {$product['sum']})";
            executeQuery($sql);
            closeConnection();
        }

    }
}

function createProduct($name, $description, $price, $photo)
{
    $sql = "INSERT INTO products (name, description, price, photo) VALUES ('{$name}', '{$description}', {$price}, '{$photo}')";
    executeQuery($sql);
    closeConnection();
}

function deleteProduct($id)
{
    $sql = "DELETE FROM products WHERE id = {$id}";
    executeQuery($sql);
    closeConnection();
}