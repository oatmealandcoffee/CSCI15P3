# Project: CSCI E-15 P3
**Philip Regan**

# Live URL
[http://p3.regan15.pw](http://p3.regan15.pw)

# Description
<!-- 2-3+ sentences -->

# Demo information
<!-- If you attend your section to do an in-person demo, make a note of this. If you opt to do the Jing screencast demo, include the link here .-->
I will do an in-person demo

# Test Requirements and Details
<!-- Any details the instructor or TA needs to know, for example, test credentials. -->
Extra Features include:
*

# Dependencies and Citations
<!--A list of any plugins, libraries, packages or outside code used in the project. See Student Responsibilities for more details on avoiding code plagiarism.-->
* Based on the Laravel framework
* PHP created and edited with [PHPStorm](http://www.jetbrains.com/phpstorm/).
* HTML and CSS created and edited with [BBEdit](http://www.barebones.com/products/bbedit/)

# Project Notes

## URL Map
* http://p3.regan15.pw
	* landing page
* http://p3.regan15.pw/lorem ; lorem ipsum generator
	* GET
* http://p3.regan15.pw/user ; random user generator
	* GET 
* http://p3.regan15.pw/password ; password generator
	* GET 

## Roadmap

	* Integrate Bootstrap into default page
	* Landing page
		* Create default path
		* Create blade template
		* Description
		* Links
	* Lorem Ipsum Generator
		* Create default path
        * Create blade template
		* Form, use GET
		* https://packagist.org/packages/badcow/lorem-ipsum
	* Random User Generator
		* Create default path
        * Create blade template
		* Form, use GET
		* https://packagist.org/packages/fzaninotto/faker
	* XKCD Password Generator
		* Create default path
        * Create blade template
		* Form, use GET
	* All pages
		* Input validation

## Bugs
None known

# Change History

* 14\_09\_24\_01\_00\_000: Started source
* 14\_10\_09\_01\_00\_001: Updated roadmap
* 14\_10\_09\_01\_01\_000: Added intro landing page
* 14\_10\_09\_01\_01\_000: Added text generator landing page; Updated default layout to include menu bar
cd /Applications/MAMP/htdocs/CSCIE15P3; git add --all; git commit -m "Added text generator landing page; Updated default layout to include menu bar"; git push github master