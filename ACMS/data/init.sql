/* Appoinment System Database
 *
 */
CREATE DATABASE appoinment_system;

use appoinment_system;
/* Database for doctors */
CREATE TABLE doctors (
	dr_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(100) NOT NULL,
	gender VARCHAR(100) NOT NULL,
	license VARCHAR(150)  NOT NULL,
	department VARCHAR(100) NOT NULL,
	qualification VARCHAR(100) NOT NULL,
	experience VARCHAR(100) NOT NULL,
	address VARCHAR(100) NOT NULL,
	district VARCHAR(100) NOT NULL,
	state VARCHAR(100) NOT NULL,
	days_available VARCHAR(100) NOT NULL,
	time_from TIME(6) NOT NULL,
	time_to TIME(6) NOT NULL,
	phone BIGINT(20) NOT NULL, 
	email VARCHAR(100) NOT NULL, 
	user_name VARCHAR(100) NOT NULL, 
	password VARCHAR(100) NOT NULL, 
	review VARCHAR(100) NOT NULL, 
	type_id INT(3),
	created_at TIMESTAMP,
	created_by VARCHAR(90) NOT NULL, 
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	updated_by VARCHAR(90) NOT NULL, 
    is_active BOOLEAN
);
CREATE TABLE appoinments (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	dr_id INT(11) NOT NULL,
	p_name VARCHAR(100) NOT NULL,
	p_gender VARCHAR(100) NOT NULL,
	p_health VARCHAR(150)  NOT NULL,
	p_address VARCHAR(100) NOT NULL,
	p_district VARCHAR(100) NOT NULL,
	p_age INT(11) NOT NULL,
	p_district VARCHAR(100) NOT NULL,
	time_alloted TIME(6) NOT NULL,
	appoinment_date DATE(6) NOT NULL,
	created_at TIMESTAMP,
	created_by VARCHAR(90) NOT NULL, 
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	updated_by VARCHAR(90) NOT NULL, 
    is_active BOOLEAN
	);
CREATE TABLE pharmacy(
	pharmacy_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	pharmacy_name VARCHAR(100) NOT NULL,
	pharmacy_license_no VARCHAR(100) NOT NULL,
	drugs_category VARCHAR(100) NOT NULL,
	location VARCHAR(100) NOT NULL,
	pharmacy_owner_name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	gender VARCHAR(100) NOT NULL,
	mobile VARCHAR(100) NOT NULL,
	address VARCHAR(100) NOT NULL,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	type_id INT(3),
	created_at TIMESTAMP,
	created_by VARCHAR(90) NOT NULL, 
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	updated_by VARCHAR(90) NOT NULL, 
    is_active BOOLEAN
);

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `patient_reg` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phn` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  created_at TIMESTAMP,
	created_by VARCHAR(90) NOT NULL, 
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	updated_by VARCHAR(90) NOT NULL, 
    is_active BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `appointmentform` (
  `ap_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `date_apmnt` date NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  created_at TIMESTAMP,
	created_by VARCHAR(90) NOT NULL, 
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	updated_by VARCHAR(90) NOT NULL, 
    is_active BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE admin_d (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	type_id INT(11) NOT NULL,
    name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	mobile VARCHAR(100) NOT NULL,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	created_at TIMESTAMP,
	created_by VARCHAR(90) NOT NULL, 
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	updated_by VARCHAR(90) NOT NULL, 
    is_active BOOLEAN
);	

INSERT INTO `user_type`(`usertype_id`, `usertype_name`) 
           VALUES ('1','admin'),('2','trainer'),('3','student'),('4','parent');
		   
INSERT INTO `admin_d`(`type_id`, `name`, `email`, `mobile`, `username`, `password`)
           VALUES ('1','Orisys','orisysindia@gmail.com','9999988888','admin','admin11');


