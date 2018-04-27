CREATE DATABASE digital_signature CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE digital_signature.ds_2018(
    ds_id INT NOT NULL AUTO_INCREMENT,
    ds_no VARCHAR(13) NOT NULL,
    ds_docu_name VARCHAR(100) NOT NULL,
    ds_docu_type TEXT NOT NULL,
    ds_docu_size VARCHAR(100) NOT NULL,
    ds_docu_path TEXT NOT NULL,
    primary key (ds_id)
);

CREATE TABLE digital_signature.ds_info(
    ds_info_id INT NOT NULL AUTO_INCREMENT,
    ds_no VARCHAR(13) NOT NULL,
    ds_crtr VARCHAR(100) NOT NULL,
    ds_crtr_id VARCHAR(100) NOT NULL,
    ds_crtr_dept VARCHAR(10) NOT NULL,
    ds_crtd_date DATETIME NOT NULL,
    ds_ip_address VARCHAR(15) NOT NULL,
    ds_docu_name VARCHAR(100) NOT NULL,
    ds_image_name VARCHAR(100) NOT NULL,
    ds_file_validation VARCHAR(100) NOT NULL,
    ds_file_path TEXT NOT NULL,
    primary key (ds_info_id)
);

CREATE TABLE digital_signature.ds_settings(
    emp_no INT(4) NOT NULL,
    pet_id VARCHAR(13) NOT NULL,
    dept_font_s INT(4) NOT NULL,
    dept_font_x INT(4) NOT NULL,
    dept_font_y INT(4) NOT NULL,
    name_font_s INT(4) NOT NULL,
    name_font_x INT(4) NOT NULL,
    name_font_y INT(4) NOT NULL,
    primary key (emp_no)
);
