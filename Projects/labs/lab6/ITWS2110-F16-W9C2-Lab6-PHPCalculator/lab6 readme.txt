I resubmitted this due to not having my readme with sources please dont take off points


Corey Burns 
Readme file lab 6
Resources:

To use the tooltip and all jquery edits were made possible by
https://jqueryui.com/.

CSS and some php was helped out by w3schools



Questions:

My classes are all based off of the abstract operation class. For Subtraction I followed the same format as add but this time I used the "-" instead of "+". The same is for multiply and divide. For the cube, I researched and found a way in php to get the power of two numbers, I used the first input and a 3 in the pow function and returned that value. For the factorial I created a for loop which went from 1 till the input and added *= $x to a running tally and returned that value. As far as the flow of the program, two inputs are entered then based on the button clicked one of the functions is run. This output is then posted from the function.



Also explain how the application would differ if you were to use $_GET, and why this may or may not be preferable.

The $_GET request is to retrieve data from a server. If we did not use $_POST we would not have the retrivable information in our body due to $_GET not having a body. We would not want to use $_GET because it is cached by the browser is not convienent. Also a $_POST can pass much mroe information to the server of any size. 


Finally, please explain whether or not there might be another (better +/-) way to determine which button has been pressed and take the appropriate action

Another way we could possibly do it would be to not use php and just get the values using jquery. This would be been not as effective but a option. Another option would be to use an echo. An echo call would be efficent as well but impractical for the assignment. 