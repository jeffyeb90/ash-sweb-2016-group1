# ash-sweb-2016-group1

How my functionality (View Student Details) can be tested

The name of the files I implemented include the ajax page representing the server side, studentsajax.php, the class, students.php and the client side, studentslist.php

The page on the client side, studentslist.php, shows a list of students with their name, ID, phone number, gender and email. Extra information such as height, weight and blood type are stored in a different table hence has to be fetched and linked to this page using the student ID. Each student once entered into the database should have this extra information that’s the height, weight and blood type added to it. This highlights my first implementation where I added these student’s records.

For the purpose of this implementation, I used a ‘view more’ button where you can click to show the extra information (height, weight and blood type) in a pop-up form. This is where the ajax implementation seem vital. Hence you should click ‘view more’ to test my implementation, a pop-up form with details such as height, weight and blood type will be displayed if the student exists on the list.

Before this functionality can be tested, a user has to log in with their credentials given below:

User 1
Username: k.tey@yahoo.com
Password: 000

User 2
Username: s.attah@ashesi.edu.gh
password :123
