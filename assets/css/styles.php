<?php
    header('Content-type: text/css; charset:UTF-8');
?>

* {
    box-sizing: border-box;
    font-family: 'Bree Serif', serif;
}

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    background-color: #fcf8f5;
    padding: 0;
    width:100%
}

.flux {
    margin-left: 75px;
    margin-right: 75px;
}

@media (max-width: 500px) {
    .flux {
        margin-left: 15px;
        margin-right: 15px;
    }
}

/* HEADER */

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #05263b;
    color: #cab5a7;
    padding-bottom: 0.5rem;
}

.nav-branding {
    font-size: 4rem;
    margin: 1rem;
    font-family: 'Cinzel', serif;
    text-decoration: none;
    color: #cab5a7;
}

.navbar-links ul {
    margin:0;
    padding:0;
    display: flex;
}

.navbar-links li a {
    list-style: none;
    text-decoration: none;
    color: #fcf8f5;
    padding: 1rem;
    display: block
}

.navbar-links li:hover {
    background-color: #cab5a7;
}

.list-logins {
    margin-right:30px;
    display: flex;
}

.list-logins ul {
    display: flex;
    column-gap: 20px;
}

.buttonLogin {
    border-radius: 0.5rem;
    background-color: #0f4454;
    padding: 10px 10px;
    display:flex
}

.toggle-button {
    position: absolute;
    top: .75rem;
    right: 1rem;
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 21px;
}

.toggle-button .bar { 
    height: 3px;
    width: 100%;
    background-color: #fcf8f5;
    border-radius: 10px;
}

a {
    text-decoration: none;
    color: inherit;
}

ul, ol {
    list-style: none;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 10px;
    margin-bottom: 50px;
}

/* MOBILE 500px */
@media (max-width: 975px) {

    .navbar {
        flex-direction: column;
        align-items: flex-start;
        width:100%;
    }

    .toggle-button {
        display: flex;
    }

    .navbar-links {
        display: none;
        width: 100%;
    }

    .navbar-links ul {
        width:100%;
        flex-direction: column;
    }

    .navbar-links li {
        text-align: center;
    }

    .navbar-links li a {
        padding: .5rem 2rem;
        flex-direction: column;
        width:100%;
    }

    .navbar-links.active {
        display: flex;
    }

    .nav-login li a {
        width:100%;
        justify-content: space-between;
    }

    .list-logins{
        width:100%;
        display:flex;
        justify-content: center;
    }
}

/* MAIN */
.cover {
    display: flex;
    align-items: center;
}

@media (max-width: 975px) {
    .cover {
        flex-direction: column;
    }

    .online {
        flex-direction: column;
    }

    .img-contact {
        width: 55%;
        border-radius:0.7rem;
        flex-shrink: 0;
        height: 250px;
        object-fit: cover;
        object-position: bottom;
    }
}

@media (max-width: 500px) {

    .img-contact {
        padding-top: 60px;
        width: 55%;
        border-radius: 1rem;
        flex-shrink: 0;
        object-fit: cover;
        object-position: bottom;
    }

    .title-2, .text-paragraphe {
        display: flex;
        font-size: 0.86rem;
    }
}

.image-office {
    width: 55%;
    border-radius:0.7rem;
    flex-shrink: 0;
    height: 250px;
    object-fit: cover;
    object-position: bottom;
}

.cover-title {
  font-size: 50px;
  margin-bottom: 20px; 
}

.cover-introduction {
    margin-bottom: 30px;
    font-family: 'Gloock', serif;
}

.cover-text {
    padding-right: 100px;
    font-family: 'Gloock', serif;
    color: #0f4454;
}

.flux .container-texts {
    color: #fcf8f5;
}

.title-2 {
    font-size: 40px;
    margin-bottom: 20px;
    line-height: 1.25;
}

.text-paragraphe {
    line-height: 1.5;
}

.button {
    text-transform: uppercase;
    color: #fcf8f5;
    border-radius: 20px;
    padding: 10px 20px;
    display: inline-block;
}

.button-orange {
    background: linear-gradient(90deg, #05263b, #cab5a7 65% 100%);
    background-size: 200% 100%;
    background-position: right;
    transition: all 0.5s;
}

.button-orange:hover {
    background-position: left;
}


.button-black {
    background-color: black;
    transition: background-color 0.25s;
}

.button-black:hover {
    background-color: grey;
}

.icon-scroll {
    background-color: #05263b;
    width: 50px;
    height: 50px;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.programs {
    background-color: #0f4454;
    margin-top: 75px;
    padding-top: 75px;
    padding-bottom: 75px;
}

.programs .flux {
    display: flex;
    gap: 1.5rem
}

.programs .container-texts {
    color: #fcf8f5;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.programs .title-2 {
    width: 75%;
}

.programs .container-texts .button {
    margin-top: 50px;
}

.programs .container-texts p {
    flex-grow: 1;
}

.programs .container-images {
    display: flex;
    flex-wrap: wrap;
    gap: 25px
}

.programs .container-images li {
    background-color: white;
    border-radius: 10px;
    width: 100%;
    height: 130px;
    padding: 10px;
}

.programs .container-images li img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

/* START : Stylisation du online */

/* 
Dégradé écriture
propriété : function(angle, couleur1, couleur2 debut fin, couleur3, ....) 

EXEMPLES 
    background: linear-gradient(90deg, blue, red);
    background: linear-gradient(to left bottom, blue, red);
    background: linear-gradient(45deg, blue 0%, green 20%, red 50%);
    background: linear-gradient(0,red 0% 20%, orange 20% 40%, yellow 40% 60%, green 60% 80%, blue 80% 100%);
    background: linear-gradient(0, rgba(0, 0, 0),rgba(0, 0, 0, 0) 25% );
FIN EXEMPLE 

*/

.online {
    background: linear-gradient(180deg, #05263b 0% 50%, #05263b 50% 100%);
}

.online .online-content {
    display: flex;
    padding: 75px 50px 50px;
    background: linear-gradient(90deg, #cab5a7,#05263b);
}

.online img {
    width: 50%;
    padding-right: 50px;
}

.online .container-texts {
    width: 50%;
    color: white;
}

.online .container-texts a {
    margin-top: 50px;
}

/* Login Page */
h1 {
    margin-left: 50px;
    text-decoration: underline
}

.loginEmail {
    margin-left: 50px;
    margin-bottom: 10px;
    gap: 25px
 
}

/* MENU */

.menu-container {
    display: grid;
    align-items: center;
    justify-content: center;
}

.menu-list {
    font-size: 3rem;
    align-content: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin: 2rem;
}

.container_menu {
  overflow: hidden;
}

.filterDiv {
  float: left;
  background-color: #2196F3;
  color: #ffffff;
  width: 100px;
  line-height: 100px;
  text-align: center;
  margin: 2px;
  display: none;

}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

/* Add a light grey background on mouse-over */
.btn:hover {
  background-color: #ddd;
}

/* Add a dark background to the active button */
.btn.active {
  background-color: #666;
  color: white;
}

/* ERROR SUCCESS INFO MESSAGE */

.success-msg,
.error-msg {
  margin: 10px 0;
  padding: 10px;
  border-radius: 3px 3px 3px 3px;
  font-weight: 300;
  font-family: 'Gloock', serif;
}

.success-msg {
  color: #270;
  background-color: #DFF2BF;
}

.error-msg {
  color: #D8000C;
  background-color: #FFBABA;
}

/* INSCRIPTION FORM */
.bg-img {
  /* The image used */
  background-image: url("/images/chef.jpg");

  /* Control the height of the image */
  min-height: 89vh;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.form-inline {
  display: flex;
//  flex-direction: column;
  align-items: center;
  background-color: white;
}

/* Add some margins for each label */
.form-inline label {
  margin: 5px 10px 5px 0;
}

/* Style the input fields */
.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

/* Style the submit button */
.form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
}

.form-inline button:hover {
  background-color: royalblue;
}

/* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
@media (max-width: 975px) {
  .form-inline input {
    margin: 10px 0;
  }

  .form-inline {
    flex-direction: column;
    align-items: stretch;
    margin: 10px;
  }
}

/* ADMIN */


#table-admin {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
}

#table-admin td, #table-admin th a {
  border: 1px solid #ddd;
  padding: 8px;
}

#table-admin tr:nth-child(even){background-color: #f2f2f2;}

#table-admin th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
}

#table-admin td a {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.tableHour, th, td {
    padding: 1rem;
}

.footer {
    display:grid;
    justify-content:center;
    background-color: #cab5a7;
}

.footerTitle {
    display:grid;
    justify-content:center;
}

.tableHour td {
    margin:0.2rem;
    padding:0.7rem;
}

.tableDay {
    padding: 1rem;
    margin:1 rem;
} 