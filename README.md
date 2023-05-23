<div id="top"></div>

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/Voice-Of-Youth/voy-v2">
    <img src="./public/images/VOYLogo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Voice of Youth | A place to explore and share ideas </h3>

  <p align="center">
    A platform made for sharing of ideas and betterment of the young generation. Get different information on things like Sexual Education, School life, Success and many other things from smart professionals and other people.
    <br />
    <br />
    ·
    <a href="https://github.com/Voice-Of-Youth/voy-v2/issues">Report Bug</a>
    ·
    <a href="https://github.com/Voice-Of-Youth/voy-v2/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#issues">Issues when using This project</a></li>
    <li><a href="#SampleData">Sample Data</a></li>
     <li><a href="#Issues">Issues</a></li>
    <li><a href="#DatabaseInfo">Database Information</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)

While many teenagers pick up sexual health information from sources other than schools like parents, peers, social media and pop culture, sometimes that information is not accurate or it is biased and can be misleading. This has led to an increasing demand from young people for reliable information, which prepares them for a safe, productive and fulfilling life.

When delivered well, Sex Education responds to this demand, empowering young people to make informed decisions about relationships, sexuality and navigate a world where genderbased violence, gender inequality, early and unintended pregnancies, HIV and other sexually transmitted infections (STIs) still pose serious risks to their health and well-being. It’s also an essential tool to help them learn about a broad range of topics related to biological, psychological and sociocultural perspectives of individual beings. It just needs to be delivered in an age-appropriate and engaging way based on science and facts. Equally, a lack of high-quality, age- and developmentally-appropriate sexual and relationship education may leave children and young people vulnerable to harmful sexual behaviors and sexual exploitation.

<p align="right">(<a href="#top">back to top</a>)</p>

### Built With

This section should list any major libraries used on this project. 

Languages

* [HTML](https://www.w3schools.com/html/)
* [CSS](https://www.w3schools.com/css/)
* [JAVASCRIPT](https://www.w3schools.com/javascript/)
* [PHP](https://www.php.net/)

A library we used in this projects

* [PHPMAILER](https://github.com/PHPMailer/PHPMailer)


<p align="right">(<a href="#top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

Inorder to Start using this project We first need an apache server to run our php. For that we need to install XAMPP, WAMPP or other similar Software. We also need Composer, A Package Manager built For PHP.

### Prerequisites

The requirements for this project are listed above and you can install it by following the Instructions below

To install composer on your machine you need to go to <a href="https://getcomposer.org/">Composer</a> Official website and download the latest version.

This will download all the necessary files for this project to work like PHPMailer.

### Installation

_For Getting started on this project you first need to clone the VOY website from github._

1. Clone the repo
   ```sh
   https://github.com/Voice-Of-Youth/voy-v2.git
   ```
2. The website should be cloned in htdocs folder inside the XAMPP installation folder

3. Go into the directory and install all the dependencies
   ```sh
   composer install
   ```
4. When starting the website you will see it in local server i.e Localhost. you can copy the code below 
    ```sh
    localhost/voy-v2/
    ```  

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->
## Usage

When greeted with the front page You have the option to read the top rated Articles in the platform. You can create an account for added benefits like writting which will be unlocked after completing a screening interview.

  _The search Functionalities_

  the search area is used to enable the user to search for a specific article.then it will take it to the search page where there are results realated to what the user search for it in link format.in addition there are 
  two fuctionalities on the search page since the page prints out all the related articles, and difficlult for the user to look for each result so instead it can filter out the results my the authorswho wrote the article also it can sort the results by the title or content in this way it can decrease the work.

  _sign up and sign in_

  A user can sign in by using the sign in button in the top right corner, which will take them to our sign in page. If the user does not have an account, he or she can click the sign up button to be taken to the sign up page. Once there the user will be presented with a sign up form to be filled. After filling the appropriate information the user can sign in using his email and password.
  
  _VOY admin page_
  
  When we first try to access the admin page we will get redirected to the login page, where we have to log using email and password. After a successful login, you find the dashboard where one can find statistics and different activities made on the website. The next thing is the admin profile page where one can add/edit/delete admins that operate on the website.

  _Profile picture add and profile edit_
  
  Once a user logs in into his/her account they will have the option to change their profile picture. To do that they can press the round profile icon and will be redirected to a page where they can change thier profile picture from the default picture. In that page they can also press the "Edit profile" button to further change thier account information (username, email...)
<p align="right">(<a href="#top">back to top</a>)</p>

<!-- SAMPLE DATA -->
## SampleData

  Here we have listed the sample datas we have stored in our database. 

  Sample users include: 

    - Email: "nmktadesse@gmail.com"      Password:  "testing"
    - Email: "natishimelisg@gmail.com"   Password: "123456"

  Sample Admin include: 

    - Email: "natnaelmenelik@gmail.com"   Password: "123456" 
  
<p align="right">(<a href="#top">back to top</a>)</p>

<!-- ISSUES -->
## Issues

! _A latest issue since the end of may 2022 is that less secure option inside google accounts is disabled. that will cause our phpmailer to not send messages to the users of our site._
 To fix this issue replace the files named "php.ini" and "sendmail.ini" which are found inside the xampp php and sendmail directories with the files found respectively within the root folder of our project.

Different issues may arise while testing out this website. 

- _Issue related to composer and PHPmailer not being installed correctly._

  ```sh
  composer install
  ```

  Potential Solution include installing PHPMailer again.

- _Issue related to PHPmailer not sending email to the user._

  You can try and install phpmailer again using the method mentioned above.

 - _Browser Incompatibility_
   
   Try using chrome for viewing the website and development.

   

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- DATABASE INFORMATION-->
## DatabaseInfo

    serverName = 'localhost';
    Database UserName = 'root';
    Database Password = '';
    Database Name = 'voy';
  
<p align="right">(<a href="#top">back to top</a>)</p>

<!-- CONTACT -->
## Contact

if you have any question or other inquiries on the project use this email to contact one of our team members.
Nathnael Shimelis - natishimelisg@gmail.com
Nathnael Mekonnen - nmktadesse@gmail.com
Mahlet Assbu - massbu@gmail.com
Nahom Temam - exopain2930@gmail.com
Mahlet Tizazu - mahletalmi@gmail.com
Natnael Menelik - natnaelmenelik3@gmail.com

Project Link: [https://github.com/Voice-Of-Youth/voy-v2](https://github.com/Voice-Of-Youth/voy-v2)

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- ACKNOWLEDGMENTS -->
## Acknowledgments
This project is done for Internet Programming II.

* [Chere Lemma](cherelemma@aastu.edu.et)

below are the resources we found helpful and would like to give credit to.

* [PHP Manual](https://www.php.net/manual/en/)
* [Stack Overflow](https://www.stackoverflow.com/)
* [GeeksforGeeks](https://www.geeksforgeeks.org/)

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/Voice-Of-Youth/voy-v2.svg?style=for-the-badge
[contributors-url]: https://github.com/Voice-Of-Youth/voy-v2/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/Voice-Of-Youth/voy-v2.svg?style=for-the-badge
[forks-url]: https://github.com/Voice-Of-Youth/voy-v2/network/members
[stars-shield]: https://img.shields.io/github/stars/Voice-Of-Youth/voy-v2.svg?style=for-the-badge
[stars-url]: https://github.com/Voice-Of-Youth/voy-v2/stargazers
[issues-shield]: https://img.shields.io/github/issues/Voice-Of-Youth/voy-v2.svg?style=for-the-badge
[issues-url]: https://github.com/Voice-Of-Youth/voy-v2/issues
[license-shield]: https://img.shields.io/github/license/Voice-Of-Youth/voy-v2.svg?style=for-the-badge
[license-url]: https://github.com/Voice-Of-Youth/voy-v2/blob/master/LICENSE.txt
[product-screenshot]: public/images/voy.png
