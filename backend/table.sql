CREATE TABLE `applications` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `age` INT NOT NULL,
  `contactNumber` VARCHAR(50) NOT NULL,
  `email` VARCHAR(255),
  /* add columns for each form field */
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);