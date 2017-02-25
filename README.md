# Hair Salon

#### Epicodus PHP Week 3 Solo Project, 2/24/2017

#### By Jake Campa

## Description

Hair salon app that creates relationships between clients and stylists

## Setup/Installation Requirements
* See https://secure.php.net/ for details on installing _PHP_.  Note: PHP is typically already installed on Macs.
* See https://getcomposer.org for details on installing _composer_.
* Clone repository
* Open MAMP- see https://www.mamp.info/en/downloads/ for details on installing _MAMP_
* Start MAMP server
* Run following in terminal /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot
* Open localhost:8888/phpmyadmin in browser
* Go to import tab
* Install hair_salon.zip.sql to access database structure
* Install hair_salon_test.zip.sql to access database structure for phpunit tests
* From project root, run > composer install
* From web folder in project, Start PHP > php -S localhost:8000
* In web browser open localhost:8000

_Error with importing mySQL files_
_After running "/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot" use the following commands in terminal to create the database structure from scratch_
* CREATE DATABASE hair_salon;
* USE hair_salon;
* CREATE TABLE stylist (id serial PRIMARY KEY, name VARCHAR(255));
* CREATE TABLE client (id serial PRIMARY KEY, name VARCHAR(255), stylist_id BIGINT);

_To create the hair_salon_test Database go to localhost:8888 and click on hair_salon in the side menu. Click on the tab Operations near the top of the webpage. In "Copy database to" panel, change hair_salon to hair_salon_test in the text field and select structure only in the menu while keeping the default selections. Click go in the panel_

## Known Bugs
* No known bugs

## Specifications

| Behavior | Input | Output |      
|---| --- | --- |        
|Add Stylist|Name = 'Phil'|Name = 'Phil'|        
|Add Client|Name = 'Timmy'|Name = 'Timmy'|        
|Assign Client to Stylist|Timmy's Stylist = Phil|Timmy's Stylist = Phil|        
|Update Client | Name = 'Timmy' ,Timmy's Stylist = Phil: new_name = 'Tommy' new_stylist = 'Alexis'| Name = 'Tommy' Tommy's stylist = Alexis |        
|Update Stylist |Name = 'Phil': new_name = 'Mary'|Name = Mary|        
|Delete Client |Name = 'Tommy' | Client Deleted|        
|Delete Stylist |Name = 'Mary' | Stylist Deleted and associated Clients deleted|        



## Support and contact details
no support

## Technologies Used
* PHP
* Composer
* MySQL
* Silex
* Twig
* HTML
* CSS
* Bootstrap
* Git

## Copyright (c)
* 2017 Jake Campa

## License
* MIT
