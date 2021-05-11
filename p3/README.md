*Any instructions/notes in italics should be removed from the template before submitting*

# Project 3
+ By: *Zahid Rashid*
+ Production URL: <http://e15p3.zrashid1970.xyz>

## Feature summary
*It is simple Grocery Sales System where a customer come to cash counter with his product then the counter man will create a sales invoice the respectiv products those are being selected by the customer. this system has following featurs*

+ option for register new cash counter man and log in
+ only the authenticate user (cash counter man) can add/update/delete the product  (product name, unit price)
+ only the authenticate user (cash counter man) can add/update/delete the customer (customer name, address and phone no)
+ only the authenticate user (cash counter man) can add/update/delete/view invoices 
  
## Database summary

+ My application has 5 tables in total (`users`, `customers`, `products`, `invoices`, `invoice_items`)
+ There's a one-to-one relationship between `customers` and `invoices`
+ There's a one-to-many relationship between `invoices` and `invoice_items`
+ There's a one-to-one relationship between `products` and `invoice_items`

## Outside resources
*N/A*

