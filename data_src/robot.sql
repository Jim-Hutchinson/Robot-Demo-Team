show databases;
use u413142534_warehouse;
show tables;

describe location;
describe orders;
describe product;
describe order_hold;

/*
Create a middle table that can house many to many connections between the orders a products
This allows for quantities instead of there being repeating items in the cart
This table should only be populated when there are items in a customer's cart
Data associated with the order is deleted once the associated customer/order is checked out
*/
Create table order_hold
(orderID int NOT NULL,
productID int NOT NULL,
quantity int NOT NULL,
constraint minimum check (quantity > 0), -- There must be one or more items for something to be considered in the cart
constraint orderREF foreign key (orderID) references orders(id),
constraint productREF foreign key (productID) references product(productId)
);

-- Creating a new variable for easier chacking of order completion
alter table orders
add (delivered boolean);

-- Updating said variable to reflect previous orders
update orders
set delivered = true
where deliveredOn is not null;

-- Check updates
select * from orders;



