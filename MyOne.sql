create database MyOne;
use MyOne;
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL,
    num_pizzas INT NOT NULL,
    pizza_size VARCHAR(10) NOT NULL,
    pizza_shape VARCHAR(10) NOT NULL,
    toppings TEXT,
    crust VARCHAR(20) NOT NULL,
    order_type VARCHAR(20) NOT NULL,
    comments TEXT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);