-- Create the database
CREATE DATABASE invoice_management;

-- Use the database
USE invoice_management;

-- Table: users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Primary Key
    username VARCHAR(50) NOT NULL UNIQUE, -- Unique username
    password VARCHAR(255) NOT NULL, -- Hashed password
    email VARCHAR(100) NOT NULL UNIQUE, -- Unique email
    role ENUM('admin', 'user') DEFAULT 'user', -- Role (admin or user)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp for creation
);

-- Table: contacts
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Primary Key
    user_id INT NOT NULL, -- Foreign Key to users
    name VARCHAR(100) NOT NULL, -- Contact name
    email VARCHAR(100) NOT NULL, -- Contact email
    phone VARCHAR(20), -- Contact phone number
    image_url VARCHAR(255), -- URL for contact image
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for creation
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE -- Foreign Key constraint
);

-- Table: invoices
CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Primary Key
    contact_id INT NOT NULL, -- Foreign Key to contacts
    user_id INT NOT NULL, -- Foreign Key to users
    amount DECIMAL(10, 2) NOT NULL, -- Invoice amount
    status ENUM('pending', 'paid', 'overdue') DEFAULT 'pending', -- Invoice status
    due_date DATE NOT NULL, -- Due date for the invoice
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for creation
    FOREIGN KEY (contact_id) REFERENCES contacts(id) ON DELETE CASCADE, -- Foreign Key constraint
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE -- Foreign Key constraint
);

-- Table: payments
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Primary Key
    invoice_id INT NOT NULL, -- Foreign Key to invoices
    amount DECIMAL(10, 2) NOT NULL, -- Payment amount
    payment_date DATE NOT NULL, -- Payment date
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for creation
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE CASCADE -- Foreign Key constraint
);

-- Table: logs
CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Primary Key
    user_id INT NOT NULL, -- Foreign Key to users
    action VARCHAR(255) NOT NULL, -- Action performed (e.g., login, create invoice)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for creation
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE -- Foreign Key constraint
);

-- Indexes for performance optimization
CREATE INDEX idx_user_id ON users(id);
CREATE INDEX idx_contact_id ON contacts(id);
CREATE INDEX idx_invoice_id ON invoices(id);
CREATE INDEX idx_payment_id ON payments(id);
CREATE INDEX idx_log_id ON logs(id);

-- Additional indexes for frequently queried columns
CREATE INDEX idx_invoice_status ON invoices(status);
CREATE INDEX idx_invoice_due_date ON invoices(due_date);
CREATE INDEX idx_payment_date ON payments(payment_date);


-- Insert Admin User
INSERT INTO users (username, password, email, role)
VALUES (
    'admin',
    -- Hashed password for 'admin123'
    '$2y$10$5Cw.h6b5f4e4f6b5e4d3eO9x8y7z6w5v4u3t2r1q0p9o8n7m6y5u',
    'admin@y-note.com',
    'admin'
);

-- Insert Regular User
INSERT INTO users (username, password, email, role)
VALUES (
    'user',
    -- Hashed password for 'user123'
    '$2y$10$5Cw.h6b5f4e4f6b5e4d3eO9x8y7z6w5v4u3t2r1q0p9o8n7m6y5u',
    'user@y-note.com',
    'user'
);