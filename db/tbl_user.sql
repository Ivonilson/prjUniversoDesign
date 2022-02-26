CREATE table tbl_user(
	
	id_user int(8) PRIMARY KEY AUTO_INCREMENT,
	user varchar (15) UNIQUE,
	pass varchar (8) UNIQUE

) engine = innoDB;