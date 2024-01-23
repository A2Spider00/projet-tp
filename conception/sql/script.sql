#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: roles
#------------------------------------------------------------

CREATE TABLE H743w_roles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE H743w_users(
        id             Int  Auto_increment  NOT NULL ,
        firstname      Varchar (20) NOT NULL ,
        lastname       Varchar (20) NOT NULL ,
        birthdate      Date NOT NULL ,
        email          Varchar (100) NOT NULL ,
        password       Varchar (255) NOT NULL ,
        id_roles Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_roles_FK FOREIGN KEY (id_roles) REFERENCES H743w_roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: brands
#------------------------------------------------------------

CREATE TABLE H743w_brands(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT brands_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categories
#------------------------------------------------------------

CREATE TABLE H743w_categories(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: products
#------------------------------------------------------------

CREATE TABLE H743w_products(
        id                  Int  Auto_increment  NOT NULL ,
        name                Varchar (20) NOT NULL ,
        prix                Float NOT NULL ,
        id_categories Int NOT NULL
	,CONSTRAINT products_PK PRIMARY KEY (id)

	,CONSTRAINT products_categories_FK FOREIGN KEY (id_categories) REFERENCES H743w_categories(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sizes
#------------------------------------------------------------

CREATE TABLE H743w_sizes(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT sizes_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: images
#------------------------------------------------------------

CREATE TABLE H743w_images(
        id                Int  Auto_increment  NOT NULL ,
        link              Varchar (255) NOT NULL ,
        id_products Int NOT NULL
	,CONSTRAINT images_PK PRIMARY KEY (id)

	,CONSTRAINT images_products_FK FOREIGN KEY (id_products) REFERENCES H743w_products(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: orders
#------------------------------------------------------------

CREATE TABLE H743w_orders(
        id             Int  Auto_increment  NOT NULL ,
        date           Datetime NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT orders_PK PRIMARY KEY (id)

	,CONSTRAINT users_FK FOREIGN KEY (id_users) REFERENCES H743w_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: productsSizes
#------------------------------------------------------------

CREATE TABLE H743w_productsSizes(
        id_products             Int NOT NULL ,
        id_sizes Int NOT NULL
	,CONSTRAINT productsSizes_PK PRIMARY KEY (id_products,id_sizes)

	,CONSTRAINT productsSizes_products_FK FOREIGN KEY (id_products) REFERENCES H743w_products(id)
	,CONSTRAINT productsSizes_sizes_FK FOREIGN KEY (id_sizes) REFERENCES H743w_sizes(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: productsBrands
#------------------------------------------------------------

CREATE TABLE H743w_productsBrands(
        id_products              Int NOT NULL ,
        id_brands Int NOT NULL
	,CONSTRAINT productsBrands_PK PRIMARY KEY (id_products,id_brands)

	,CONSTRAINT productsBrands_products_FK FOREIGN KEY (id_products) REFERENCES H743w_products(id)
	,CONSTRAINT productsBrands_brands_FK FOREIGN KEY (id_brands) REFERENCES H743w_brands(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ordersContent
#------------------------------------------------------------

CREATE TABLE h743w_ordersContent(
        id_products              Int NOT NULL ,
        id_orders Int NOT NULL,
        quantity Int NOT NULL
	,CONSTRAINT ordersContent_PK PRIMARY KEY (id_products,id_orders)

	,CONSTRAINT ordersContent_products_FK FOREIGN KEY (id_products) REFERENCES H743w_products(id)
	,CONSTRAINT ordersContent_orders_FK FOREIGN KEY (id_orders) REFERENCES H743w_orders(id)
)ENGINE=InnoDB;

