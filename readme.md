# Project: CSCI E-15 P3
**Philip Regan**

# Live URL
[http://p3.regan15.pw](http://p3.regan15.pw)

# Description
Developer's Bet Friend is a utility site that assists in the creation of filler data for testing designs and websites. Utilities include creation of dummy text, fake users, and random passwords.

# Demo information
<!-- If you attend your section to do an in-person demo, make a note of this. If you opt to do the Jing screencast demo, include the link here .-->
I will do an in-person demo

# Test Requirements and Details
<!-- Any details the instructor or TA needs to know, for example, test credentials. -->
Extra Features include:
* Used Bootstrap in the master template to improve UI
* Added options for user generation
* Added password generator project code
* Moved logic for all of the pages out of the view into custom controller classes. These classes manage the sanitizing of user content and content generation.
	* Text -> LoremGenerator
	* Users -> UsersGenerator
	* Passwords -> PasswordGenerator, WordController (source list and access)

# Dependencies and Citations
<!--A list of any plugins, libraries, packages or outside code used in the project. See Student Responsibilities for more details on avoiding code plagiarism.-->
* Based on the Laravel framework
* PHP created and edited with [PHPStorm](http://www.jetbrains.com/phpstorm/).
* HTML and CSS created and edited with [BBEdit](http://www.barebones.com/products/bbedit/)

# Project Notes

## URL Map
* http://p3.regan15.pw
	* landing page
* http://p3.regan15.pw/text ; lorem ipsum generator
	* GET
* http://p3.regan15.pw/users ; random user generator
	* GET 
* http://p3.regan15.pw/passwords ; password generator
	* GET 

## Roadmap

	> Tweaks
		X Migrate user generation code to custom controller
		X Update user HTML form to Laravel
		* Move master-embedded styles to external CSS in /public/css (href="/css/styles.css")
		? add JSON option for user generation output
		X Migrate text generation code to custom controller
		- Create a default user in absence of settings // shows a user-friendly error instead
		X Fix table layout for settings
	X Integrate Bootstrap into default page
	X Landing page
		X Create default path
		X Create blade template
		X Description
		X Links
	X Lorem Ipsum Generator
		X Create default path
        X Create blade template
		X Form, use GET
			X paragraph count 1-10
		X https://packagist.org/packages/badcow/lorem-ipsum
	X Random User Generator
		X Create default path
        X Create blade template
		X Form, use GET
			X $faker->name
			X $faker->address
			X $faker->email
			X $faker->text
		X https://packagist.org/packages/fzaninotto/faker
	X XKCD Password Generator
		X Create default path
        X Create blade template
		X Form, use GET
		X Add word and special character selection
	X All pages
		X Input validation
	X Update design to be DRY (esp. NavBar)
	X Packages to install
		X "badcow/lorem-ipsum": "dev-master",
    	- "nubs/random-name-generator": "dev-master", // deprecated, using Faker instead
    	* "fzaninotto/company-name-generator": "dev-master"

## Bugs
	X [0107001] URIs are not resolving on the production server

# Change History

* 14\_09\_24\_01\_00\_000: Started source
* 14\_10\_09\_01\_00\_001: Updated roadmap
* 14\_10\_09\_01\_01\_000: Added intro landing page
* 14\_10\_09\_01\_02\_000: Added text generator landing page; Updated default layout to include menu bar
* 14\_10\_09\_01\_03\_000: Added users and password generator pages
* 14\_10\_09\_01\_04\_000: Added _master.blade.php; Added intro.blade.php; Removed intro.php
* 14\_10\_09\_01\_05\_000: Added text.blade.php; Removed text.php
* 14\_10\_09\_01\_06\_000: Added users.blade.php; Removed users.php
* 14\_10\_09\_01\_07\_000: Added passwords.blade.php; Removed passwords.php; Updated navigation bar
* 14\_10\_09\_01\_07\_001: Fixing URI bug [0107001]
* 14\_10\_09\_01\_08\_000: Added Pre; Added LoremIpsum
* 14\_10\_09\_01\_09\_000: Added LoremIpsum text generation to text page
* 14\_10\_09\_01\_10\_000: Added Faker
* 14\_10\_09\_01\_10\_001: Updated text page to set a default paragraph count; added user form value capture and validation
* 14\_10\_09\_01\_10\_002: Fixed bugs related to undefined variables; Added table form styles to _master.blade.php
* 14\_10\_09\_01\_10\_003: Added basic user generation
* 14\_10\_14\_01\_11\_000: Started password generation page; Updated formatting of users results
* 14\_10\_14\_01\_11\_001: Added WordController holding source lists and retrieval functions
* 14\_10\_15\_01\_11\_001: Updated WordController to be a class; Updated composer.json to autoload the WordController class
* 14\_10\_15\_01\_11\_002: Updated passwords.blade.php to get random special character
* 14\_10\_15\_01\_11\_003: Updated style in _master.blade.php to better handle long passwords; minor UI tweaks in passwords.blade.php
* 14\_10\_15\_01\_11\_004: Updated users to give a default when no options are selected
* 14\_10\_17\_01\_12\_000: Added PasswordGenerator class; Updated passwords.blade.php to use PasswordGenerator; Minor UI tweaks in users.blade.php
* Begin conforming rest of site to pure Laravel and aligning to passwords architecture
* 14\_10\_20\_02\_00\_000: Updated text form to Laravel
* 14\_10\_20\_02\_01\_000: Added LoremGenerator class for all logic; Updated text form to use LoremGenerator class
* 14\_10\_20\_02\_02\_000: Added UserGenerator class for all logic; Updated user form to use UserGenerator class
* 14\_10\_20\_02\_03\_000: Updated users form to Laravel

cd /Applications/MAMP/htdocs/CSCIE15P3; git add --all; git commit -m "Updated users form to Laravel"; git push github master