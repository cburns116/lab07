Corey Burns - Readme file lab 3

For part one I created a function that took a document and recursivly added the dom elements to a string. I kept track of dashes by creating a depth counter that increased everytime we hit the recall of the function. I then created an event listener for the dom to be completly downloaded before I ran the function.

For part two I used the same recurive function as part 1 but added an alert box so every time the function would loop, it would hit the alert with what you clicked on. 

For part 3 I used clone node and append child. It grabs the correct item but for some reason clone would not output the clone. The function appears right due to understanding how to slect the node and I also added it to the dom listener to active after it loads.

For the next part of part 3 I added a mouse over event listener and every time I moused over the "this" would be passed through the same function as part two in which it changed the nessesary style and shift the font