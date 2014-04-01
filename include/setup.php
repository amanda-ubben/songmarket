<html<head><title>Setting up database</title></head><body>

<h3>Setting Up...</h3>
<?php // setup.php
include_once 'functions.php';

createTable('users',
	    'idUser MEDIUMINT NOT NULL AUTO_INCREMENT
	     nameUser VARCHAR(16),
	     password VARCHAR(16),
	     email VARCHAR(100),
	     firstname VARCHAR(20),
	     lastname VARCHAR(60),
	     INDEX(user(6))');

createTable('messages',
	    'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	    auth VARCHAR(16),
	    recip VARCHAR(16),
	    pm CHAR(1),
	    time INT UNSIGNED,
	    message VARCHAR(4096),
	    INDEX(auth(6)),
	    INDEX(recip(6))');

createTable('friends',
	    'user VARCHAR(16),
	    friend VARCHAR(16),
	    INDEX(user(6)),
	    INDEX(friend(6))');

createTable('profiles',
	    'user VARCHAR(16),
	    text VARCHAR(4096),
	    INDEX(user(6))');

createTable('portfolios',
	    'user VARCHAR(16),
	    title VARCHAR(200),
	    authorfirstname VARCHAR(50),
	    authorlastname VARCHAR(50),
	    INDEX(user(6)),
	    INDEX(title(6))');

createTable('albums',);

createTable('artists',);

createTable('CrowdMembers',);

createTable('Crowds',);

createTable('interest',
	    'firstName VARCHAR(20),
	     lastName VARCHAR(20),
	     email VARCHAR(100)');

createTable('
?>

<br />...done.
</body></html>
	    
