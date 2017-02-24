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
* Open localhost:8888/phpmyadmin in browser
* Go to import tab
* Install hair_salon.zip.sql to access database structure
* From project root, run > composer install
* From web folder in project, Start PHP > php -S localhost:8000
* In web browser open localhost:8000

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
