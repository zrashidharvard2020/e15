# Project 3
+ By: *Zahid Rashid*
+ Production URL: <http://e15p3.zrashid1970.xyz>

## Feature summary
It is simple Invoice Creationg for a Small Grocery Store. A customer will come to the cash counter with the products, he/she would likes to buy. The cash counter employee will create a sales invoice based on the respective products which are being selected by the customer. This system has following features

+ option for registering new cash counter employee and able to give them a login access
+ only the authenticated user (cash counter employee) is able to add/update/delete the product  (product name, unit price)
+ only the authenticated user (cash counter employee) is able to add/update/delete the customer (customer name, address and phone no)
+ only the authenticated user (cash counter employee) is able to add/update/delete/view invoices 
  
## Database summary

+ My application has 5 tables in total (`users`, `customers`, `products`, `invoices`, `invoice_items`)
+ There's a one-to-one relationship between `customers` and `invoices`
+ There's a one-to-many relationship between `invoices` and `invoice_items`
+ There's a one-to-one relationship between `products` and `invoice_items`

## Outside resources
*N/A*

