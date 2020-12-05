# task1
github crawler for task 1 project

When you give username in crawl.php, it displays the repositories' details of that account along with it like name,pulls,stars,issues etc.

DATABASE:

1)create a database named "forbes"
2)crete a table named "login"
  collation: utf8mb4_general_ci
  username varchar(255) not null,
  password varchar(255) not null,
  email varchar(255) not null,
  role varchar(12) not null
3)open register.php,register and in phpmyadmin manually edit role of one user to 'admin' from 'user' to check the functionalities of admin.
4)admin registration from register page is restricted for security purposes
