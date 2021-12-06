<div id="top"></div>

<!-- [![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url] -->



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <!-- <a href="https://github.com/KDTEC/Software-project">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a> -->

  <h3 align="center">Appointify</h3>

  <p align="center">
    An online clinic system that caters to clinic management requirements.
    <br />
    <a href="https://github.com/KDTEC/Software-project/issues">Report Bug</a>
    ·
    <a href="https://github.com/KDTEC/Software-project/issues">Request Feature</a>
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
    <!-- <li><a href="#contributing">Contributing</a></li> -->
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

#

<!-- ABOUT THE PROJECT -->
## About The Project

[![Landing Page Screen Shot][landing-screenshot]](https://github.com/KDTEC/Software-project)

[![Product Name Screen Shot][product-screenshot]](https://github.com/KDTEC/Software-project)

The Online Clinic System is specifically designed to delineate the boundaries of the Healthcare Information System design provides clinical Management Activities and functionality that enables you to effectively manage your practice, providing standards-based integration points to schedule an appointment, Online Follow-ups, complete reports, Laboratory Information. 

It maintains 3 types of users:
1. Admin
2. Doctors
3. Patients

This Project provides security for the users with the use of Login-id and Password, so that unauthorized users cannot use anyone else’s account. The only authorized will have proper access authority can access the software.

<p align="right">(<a href="#top">back to top</a>)</p>


### Built With

* HTML, CSS, JavaScript
* [Laravel](https://laravel.com)
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [openFDA](https://open.fda.gov/apis/)

<p align="right">(<a href="#top">back to top</a>)</p>

#

<!-- GETTING STARTED -->
## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

1. XAMPP
   * [Download](https://www.apachefriends.org/download.html)
   * [Install](https://xamppguide.com/)
2. IDE of choice - e.g. [VSCode](https://code.visualstudio.com/download)
3. Web Browser of choice - e.g. [Google Chrome](https://www.google.com/intl/en_in/chrome/)

### Installation

1. Start XAMPP and open phpMyAdmin on browser.
2. Create a new database for the project and name it "clinic_db"
3. Import the [Database](https://github.com/KDTEC/Software-project/blob/master/Database/clinic_db.sql)
4. Clone the repository in any folder and name folder as per choice.
    ```
    git clone git@github.com:KDTEC/Software-project.git your-folder-name
    ```
5. Start XAMPP servers - Apache and MySQL
   ![XAMPP Ready][xampp-ready]

6. Start PHP development server (at port of your choice) in Folder Directory via command line
   ```
    php -S localhost:5000
   ```
7. Navigate to http://localhost:5000
8. Admin Details:-
    - Username : admin@ocs.com
    - Password : admin

<p align="right">(<a href="#top">back to top</a>)</p>

#
<!-- CONTRIBUTING -->
<!-- ## Contributing

See the [open issues](https://github.com/KDTEC/Software-project/issues) for a full list of proposed features (and known issues).
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>

# -->

<!-- CONTACT -->
## Contact

* Kshitij Dhawan - kshitij.dhawan310@gmail.com
* Swaranjana Nayak - swaranjananayak@gmail.com
* Vaishnavi Sharma
* Project Link: [https://github.com/KDTEC/Software-project](https://github.com/KDTEC/Software-project)

<p align="right">(<a href="#top">back to top</a>)</p>

#

<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

1. [Dai, Xin, "Online Clinic Appointment Scheduling" (2013). Theses and Dissertations. 1467.](https://preserve.lib.lehigh.edu/islandora/object/preserve%3Abp-7256324)
2. [Clinics Management System (CMS) based on Patient Centered Process Ontology, Ruhuna Journal of Science DOI:10.4038/rjs.v1i0.72.](https://www.researchgate.net/publication/228569210_Clinics_Management_System_CMS_based_on_Patient_Centered_Process_Ontology)
3. [SRS Documentation](https://drive.google.com/file/d/1YV67uo7NL4TTZVo_CxvYwomzwMn5VZ9e/view?usp=sharing)
4. [SDS Documentation](https://drive.google.com/file/d/10Tz74ncoZZU6tJM1t2mpLfJ9ZMr7xK02/view?usp=sharing)

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/KDTEC/Software-project.svg?style=for-the-badge
[contributors-url]: https://github.com/KDTEC/Software-project/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/KDTEC/Software-project.svg?style=for-the-badge
[forks-url]: https://github.com/KDTEC/Software-project/network/members
[stars-shield]: https://img.shields.io/github/stars/KDTEC/Software-project.svg?style=for-the-badge
[stars-url]: https://github.com/KDTEC/Software-project/stargazers
[issues-shield]: https://img.shields.io/github/issues/KDTEC/Software-project.svg?style=for-the-badge
[issues-url]: https://github.com/KDTEC/Software-project/issues
[product-screenshot]: screenshots/admin.png
[landing-screenshot]: screenshots/landing.png
[xampp-ready]: screenshots/xampp.png