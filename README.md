# Shopping Application

A PHP-based shopping application that supports user product browsing, cart management, and an administrative interface for managing products, orders, and user accounts.

## Features

- **User Interface**:
  - Product browsing and details
  - Cart and wishlist management
  - User account and order tracking
- **Admin Interface**:
  - Product and category management
  - Order processing (pending, delivered orders)
  - User management and logs

## Project Structure

- **Main Pages**: Core user functionalities are located in the root directory (`index.php`, `product-details.php`, etc.)
- **Admin Dashboard**: Located in `admin/` and includes product, category, and order management.
- **Database**:
  - `sqlConnection.php`: Database connection setup
  - `SQL file/shopping.sql`: SQL file to initialize the database
- **Assets**: Styling, images, and JavaScript files in the `assets/` directory
- **Includes**: Shared layout components (`header.php`, `footer.php`, etc.)

## Installation

### Prerequisites

- PHP
- MySQL

### Steps

1. **Clone the repository**:
   ```bash
   git clone https://github.com/sunilprregmi/shopping.git
   cd shopping
   ```

2. **Set up the database**:
   - Import `shopping.sql` into your MySQL server to create the necessary tables.

3. **Configure database connection**:
   - Update database credentials in `sqlConnection.php` to match your MySQL configuration.

4. **Run the application**:
   - Serve the project files on a local server (e.g., Apache).

5. **Access the application**:
   - Open a browser and navigate to `http://localhost/shopping`.

## Usage

- **User Side**: Visit `http://localhost/shopping` for product browsing and cart management.
- **Admin Side**: Access `http://localhost/shopping/admin` to manage products, orders, and users.

## Contributing

Contributions are welcome. Please fork this repository, make your changes, and submit a pull request.
