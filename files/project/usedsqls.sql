create table posts(
	id int NOT NULL,
	post text,
	PostDate timestamp DEFAULT CURRENT_TIMESTAMP(),
	foreign key(id) references users(id)
);