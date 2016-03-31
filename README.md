# CSCI E-15: P3
**By Michael Shull**

**[mshull@g.harvard.edu](mailto:mshull@g.harvard.edu)**

## Live URL
[https://p3.shullworks.com](https://p3.shullworks.com)

## Description
This project contains my data generator toolset. It consists of a lorem ipsum text generator, user data generator, and password generator. Server-side validation was added to verify required data was entered and of the correct type. As an optional addition I integrated the P2 password generator into the application, leveraging the Laravel controller and  validation functionality.

## Demo
[https://youtu.be/1Ud_FMfQkbU](https://youtu.be/1Ud_FMfQkbU)

## Details for Teaching Team

1. The Lorem Ipsum Text Generator uses the BadCow Lorem Ipsum package and the User Data Generator uses the Fzannito Faker package.

2. Password words are scraped from [http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html](http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html).

3. I created a central controller called GeneratorController for this project.

4. I use a combination of views for the home page and each generator tool and a master app layout for the template.

5. The Bootstrap resource files were copied into the public directory.

## Outside Code

1. This project uses the [Bootstrap framework](http://getbootstrap.com) as it's front-end foundation. 

2. This project uses content scraped from [http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html](http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html).

3. The LoremIpsum generator uses the package at [https://packagist.org/packages/badcow/lorem-ipsum](https://packagist.org/packages/badcow/lorem-ipsum)

4. The User Data generator uses the package at [https://github.com/fzaninotto/Faker](https://github.com/fzaninotto/Faker)
