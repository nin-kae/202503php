<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Shopping Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 40px;
            color: #2c3e50;
        }
        .main-container {
            display: flex;
            gap: 40px;
            max-width: 1200px;
            margin: auto;
        }
        section {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
        }
        .product-list {
            flex: 2;
        }
        .shopping-cart {
            flex: 1.5;
        }
        h2 {
            margin-top: 0;
            font-size: 24px;
            border-bottom: 2px solid #eee;
            padding-bottom: 12px;
        }
        #products-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .product-card {
            border: 1px solid #e3e3e3;
            border-radius: 10px;
            background: #fdfdfd;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }
        .product-card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }
        .product-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .product-card .info {
            padding: 16px;
        }
        .product-card .info h3 {
            font-size: 18px;
            margin: 0 0 10px;
        }
        .product-card .info .price {
            font-weight: 600;
            color: #27ae60;
            margin-bottom: 10px;
        }
        .product-card button {
            padding: 10px;
            background: #2980b9;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }
        .product-card button:hover {
            background: #1f6391;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }
        .cart-total {
            text-align: right;
            font-size: 18px;
            font-weight: 600;
            margin-top: 20px;
        }
        .action-btn {
            background: #ecf0f1;
            padding: 5px 10px;
            border: 1px solid #bdc3c7;
            cursor: pointer;
            border-radius: 5px;
        }
        .action-btn:hover {
            background: #d0d7dc;
        }
    </style>
</head>
<body>
<div class="main-container">
    <section class="product-list">
        <h2>Products</h2>
        <div id="products-container">
            <!-- Dynamic items -->
        </div>
    </section>
    <section class="shopping-cart">
        <h2>Shopping Cart</h2>
        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="cart-body"></tbody>
        </table>
        <div class="cart-total">
            Total: ¥<span id="total-amount">0.00</span>
        </div>
    </section>
</div>

<script>
    const productList = [
        { id: 1, name: "电竞桌", price: 1199, img: "https://via.placeholder.com/300x200?text=Desk" },
        { id: 2, name: "电竞椅", price: 289, img: "https://via.placeholder.com/300x200?text=Chair" },
        { id: 3, name: "显示器", price: 899, img: "https://via.placeholder.com/300x200?text=Monitor" },
        { id: 4, name: "电脑主机", price: 2499, img: "https://via.placeholder.com/300x200?text=PC" },
    ];

    const productsContainer = document.getElementById('products-container');
    const cartBody = document.getElementById('cart-body');
    const totalAmount = document.getElementById('total-amount');
    const cart = {};

    productList.forEach(item => {
        const div = document.createElement('div');
        div.className = 'product-card';
        div.innerHTML = `
        <img src="${item.img}" alt="">
        <div class="info">
          <h3>${item.name}</h3>
          <div class="price">¥${item.price}</div>
          <button onclick="addToCart(${item.id})">加入购物车</button>
        </div>
      `;
        productsContainer.appendChild(div);
    });

    window.addToCart = function(id) {
        const item = productList.find(p => p.id === id);
        if (cart[id]) {
            cart[id].qty += 1;
        } else {
            cart[id] = { ...item, qty: 1 };
        }
        renderCart();
    };

    function renderCart() {
        cartBody.innerHTML = '';
        let total = 0;
        Object.values(cart).forEach(item => {
            const subtotal = item.qty * item.price;
            total += subtotal;
            const row = document.createElement('tr');
            row.innerHTML = `
          <td>${item.name}</td>
          <td>¥${item.price}</td>
          <td>
            <button class="action-btn" onclick="changeQty(${item.id}, -1)">-</button>
            ${item.qty}
            <button class="action-btn" onclick="changeQty(${item.id}, 1)">+</button>
          </td>
          <td>¥${subtotal.toFixed(2)}</td>
          <td><button class="action-btn" onclick="removeItem(${item.id})">删除</button></td>
        `;
            cartBody.appendChild(row);
        });
        totalAmount.textContent = total.toFixed(2);
    }

    window.changeQty = function(id, delta) {
        if (!cart[id]) return;
        cart[id].qty += delta;
        if (cart[id].qty <= 0) delete cart[id];
        renderCart();
    };

    window.removeItem = function(id) {
        delete cart[id];
        renderCart();
    };
</script>
</body>
</html>
