CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','vendor','customer') NOT NULL DEFAULT 'customer'
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  name VARCHAR(255),
  description TEXT,
  price DECIMAL(10,2),
  image VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE order_product (
  order_id INT,
  product_id INT,
  quantity INT,
  PRIMARY KEY(order_id, product_id),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Demo data for quick testing
INSERT INTO users (email, password, role) VALUES
  ('vendor@example.com', '$2b$12$N.tn7Wy7pYqE3zphYcVSZOw7p4/b.24VtbDxn7aE0gvcg.TW5krhW', 'vendor');

INSERT INTO products (user_id, name, description, price, image) VALUES
  (1, 'Sample Product 1', 'Description 1', 9.99, 'https://via.placeholder.com/150'),
  (1, 'Sample Product 2', 'Description 2', 19.99, 'https://via.placeholder.com/150'),
  (1, 'Sample Product 3', 'Description 3', 29.99, 'https://via.placeholder.com/150'),
  (1, 'Sample Product 4', 'Description 4', 39.99, 'https://via.placeholder.com/150'),
  (1, 'Sample Product 5', 'Description 5', 49.99, 'https://via.placeholder.com/150'),
  (1, 'Sample Product 6', 'Description 6', 59.99, 'https://via.placeholder.com/150');
