CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL -- hashed password
);

-- Insert default admin user (password = "admin123")
INSERT INTO admin_users (username, password)
VALUES ('admin', SHA2('admin123', 256));
