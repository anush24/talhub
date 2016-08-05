-----------------------
PROJECT DESCRIIPTION
-----------------------

---------------------
NAME OF THE PROJECT
--------------------
www.talhub.com
talhub ----->short form of talent hub
----------------------------
DESCRIPTION OF THE PROJECT
---------------------------
The project aims to connect the candidate(students) and clients(companies). 

First screening level test is conducted by talhub.com. 

The candiate can register with talhub.com and take the test launched by the companies.

The companies can register, choose questions from a question bank based on the subject, preview the questions, set the eligibility criteria for the candidates.

talhub.com will launch the test at the specified time, candidates whose skill set matches with the topic of the quiz can register and take the quiz.

A list of candidate's e-mail ID who have crossed the eligibility criteria  are sent to the company.

The website acts as an interface between the client and candidate.

-------------------------------------------
DATABASE CREATION
-------------------------------------------
1.Create a database in mysql as "talhub1"
2.Import the SQL script file

-------------------------------------------
INSTRUCTION TO RUN WEBSITE
------------------------------------------
1.Unzip final folder
2.Unzip talhub folder and place in www in such a way "www/final project/talhub" is the path.
3.Open localhost/final project/talhub/Index1.html

-------------------------------------------
COMPANY SIDE - CREDENTIALS FOR VERIFICATION 
--------------------------------------------
username:comp1
password:hello 
---------------------------------------
COMPANY SIDE - IMPLEMENTATION DETAILS
--------------------------------------
1. register with talhub
2. js validation for the forms.
3. once the user has created an account phpmailer is used to send a mail to the company mentioning his username and password.
4. the company employee can create a new job posting, create new quiz
5. from a question bank, he/she can add questions to the quiz
6. preview of the quiz is generated.
7. the quiz questions can added, edited and deleted.
8. the new jobs can added, edited.
9. the company profile can be created, edited and viewed.
-------------------------------------------
CANDIDATE SIDE - CREDENTIALS FOR VERIFICATION 
--------------------------------------------
username:sharadha7290@gmail.com
password:Thenu@7290

-------------------------------------------
CANDIDATE SIDE - IMPLEMENTATION DETAILS
--------------------------------------------
1. registering with website
2. php authentication of the user registration information.
3. Display tests available based on candidate's skillset.
4. Filter the tests based on start and end date using ajax.
5. Register for test.
6. Take the test, test will be enabled after the specified date and time.
7. The test is pulled from a xml file named "test[testid].txt" saved by the clients.
7. The take test option will be disabled once you take it.
8. The scores are computed and sent to a file if the required marks are attained in a file "sol[testid].txt"