# PHP-Blog-Management-System

You should create DB first you can easly create using "cms.sql" scripts.

Inside this script you will see this script

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(2, 'deneme', '123', 'deneme', 'deneme', 'deneme2@gmail.com', '', 'subscriber', ''),
(3, 'deneme1', '123', 'deneme1', 'deneme1', 'deneme@gmail.com', '', 'subscriber', ''),
(10, 'admin', '$1$1qeI2Boo$KG8k3.4oU9Lw6INkhyGOi1', '', '', 'admin@admin.com', '', 'admin', '$2y$10$iusesomecrayzstring22');

this is a dummy users and one admin account 

for easy entrance with admin account you shouldn't change password state 
when you try to login with admin record pls use username as "admin" and password "123" 
than you can change admin html and edit other records.

ps ::: "'$1$1qeI2Boo$KG8k3.4oU9Lw6INkhyGOi1'" == "123"
