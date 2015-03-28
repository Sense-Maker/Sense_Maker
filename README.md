# Sense_Maker
A tool to provide user location based comparisons to social issues in order to spread awareness in an effective way

##Breakup of Files--
####css, font-awesome,img,js - 
All used for bootstrap
####d3, svgs -
Contain svgs like stadium.svg for the data visualization. Also contain javascript files for d3 and layout.
####landing_page.html -
Main page. Select this on lcalhost.
####main.php-
Contains code for responding to html form, retrieving data from databases, calculating ratio, printing out text in styled text and calling d3/d3.v3.js 


---------------------------------------------------------------------------------------------------------------------------

##Immediate To-Do list--
####0.Adding comments to code and renaming method names and variables to be suitable to their purpose.
####1.Randomize comparisons-
Remove event input field in html form. When user enters his location, a comparison to a random event must be made instead of him having to select a class( terror attacks, stadiums etc.).
####2.Upvotes/Downvotes-
Since we are randomizing comparisons, the user should have a say whether in the comparison is effective or not. Number of upvotes, downvotes should be stored and using that info, some events can be removed from the list of random events.
####3.Better data visualization-
Comparing to a picture related to that event, or atleast in that class, and showing comparisons with some scale comparing to something easil relatable to will be far more effective. We need to provide different visualizations for different classes, related to those classes, to improve effectiveness.
####4.Detailed description-
On the website, a tab or section needs to be placed which provides a detailed description of what our aim is and what were trying to achieve through this. And also how to use the website.


##Future enhancements--
####1.Better UI-
UI of the website needs to completely change with probably a video explaining what we're trying to achieve and its advantages and applications.
####2.Data mining-
Instead of the user having to enter a number to compare to, we should somehow get the numbers from the description the user will type in the compare to section of the form.
eg: user enters "farmer deaths in India". Our system should get the number of farmer deaths in India to compare to automatically.
####3.Improved comparison event selection-
Think of ways to improve the comparison event selection instead of leaving it as random. Upvotes/downvotes can be taken into consideration along with various features such as number of tweets on that topic, to determine if an event had left a lasting impact on the people of that area.
