Corey Burns list of improvments on lab 5.html

Change 1:
For my first optimization went hand in hand with part 1. I thought it was a bit redudent to append each line to the html. Instead I added them all to a variable then appended one single "line" to the html by using the jquery provided: $("div.bar ul#foo").append(total);. To get "total" I created a second variable called newlines which I added the <li> to then added that variable to total and appended it to the div foo. newlines = "<li>This is an item in the list. Click to make me disappear.</li>");
							total+=newlines;


Change 2:

	For this optimization I looked at the show all function. In that function we go thought every <li> and show it using a .each function and a show. I thought that it would be a great idea to instead just have it show all of the children of the div class foo. To implument this I simply added $('#foo').children().show(400); instead of the loop. I do not need to check every element to see if it is present, just show them all when that button is clicked.

Change 3:
	Displaying an image accross the whole screen will eat up alot of load time. To fix this I added a simple css editor to make the the body a hex color of light blue. This is much more efficient than using an image. I decided to go with the simple css of background-color: #00FFFF; inside of the body brackets. The other option I thought about was to use jQuery such as the $("body").css("background-color", "#00FFFF");. Both are effective and an easy fix that freed up alot of time by not using an image.

Change 4:

I moved the script that we wrote to the bottom. This ensures the script doesnt run until the page is loaded, making the entire html faster. This is a common practice that usually causes alot of problems, in particular since we have a function to have run after the page is loaded.

Change 5:

This optimization was brought out by the optimization with the images now converted to hex using css. After inspecting the document I saw that the css was getting loaded in the body and not in the head. It should be in the head so it is rendered first and then the page can be displayed correctly and quickly. To actually do this, I simply added my <style>...</style> into the head tag. This will help alot with speed becuase now the page will simple add the correct styles instead of waiting for the body to load and then change around the css.

Conclusion:

Now the load time is alot faster. In fact I ran the same record test as before and got a load time of 1.2 seconds. This is alot faster than before. I think it was a combination of alot of changes but in my opinion the images change did the most. In order to test these I would have to see how much faster each item made the load proccess. I would be very curious in finding out which made the largest difference but that is for another time.