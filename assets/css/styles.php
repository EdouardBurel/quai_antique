<?php
    header('Content-type: text/css; charset:UTF-8');
?>

* {
    box-sizing: border-box;
    font-family: 'Gloock', serif;
}

body {
    margin: 0;
    background-color: #fcf8f5;
    padding: 0;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #05263b;
    color: #fcf8f5;
}

.nav-branding {
    font-size: 3rem;
    margin: 1rem;
    font-family: 'Cinzel', serif;
    text-decoration: none;
    color: #fcf8f5;
}

.navbar-links ul {
    margin:0;
    padding:0;
    display: flex;
}

.navbar-links li {
    list-style: none;
}

.navbar-links li a {
    text-decoration: none;
    color: #fcf8f5;
    padding: 1rem;
    display: block
}

.navbar-links li:hover {
    background-color: #cab5a7;
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

@media (max-width: 500px) {
    .toggle-button {
        display: flex;
    }

    .navbar-links {
        display: none;
        width: 100%;
    }

    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .navbar-links ul {
        width:100%;
        flex-direction: column;
    }

    .navbar-links li {
        text-align: center;

    }

    .navbar-links li a {
        padding: .5rem 1rem;
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
}

.flux {
    margin-left: 50px;
    margin-right: 10px;
}

@media (max-width: 500px) {
    .flux {
        margin-left: 10px;
        margin-right: 75px;
    }

    .button {
        width:100%;
    }
}

.title-2 {
    font-size: 40px;
    margin-bottom: 20px;

}

.button {
    text-transform: uppercase;
    color: #05263b;
    border-radius: 20px;
    padding: 10px 15px;
    background-color: #fcf8f5;
    display: inline-block;
}

h1 {
    color: #0f4454;
    font-style: italic;
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

.nav {
    align-items: center;
    
}

.list-links {
    margin-left: 10px;
    display: inline-flex;
    list-style: none;
    column-gap: 90px;
    align-items:center;

}

.list-logins {
    margin-left: 10px;
    margin-right: 30px;
    display: inline-flex;
    list-style: none;
    column-gap: 10px;
    align-items:center;
    font-size: 16px;
}

.list-logins a {
    background-color: #0f4454;
    color: #fcf8f5;
}


.nav-link {
    text-transform: uppercase;
    font-size: 16px;
}

.nav-link:last-child a {
    color: white;
    font-weight: 500;

}

.cover {
    display: flex;
    align-items: center;
}

@media (max-width: 500px) {
    .cover {
        flex-direction: column;
        width: 100vw;
    }
}

.image-office {
   width: 45%; 
   flex-shrink: 0;
   height: 250px;
   object-fit: top;
   object-position: bottom;
}

/* COVER */
.cover-title {
  font-size: 50px;
  margin-bottom: 30px; 
}

.icon-scroll {
    background-color: black;
    width: 50px;
    height: 50px;
    border-radius: 100%;
    display:flex;
    justify-content: center;
    align-items: center;
}

.cover-intro {
    font-size: 30px;
}

.cover-text {
    padding-left: 30px;
    padding-right: 100px;
    color: #0f4454;
}

/* PROGRAMS */

.programs {
    background-color: #05263b;
    margin-top: 75px;
    padding-top: 75px;
    padding-bottom: 75px;
}

.programs .flux {
    display: flex;
    gap: 50px;
}

.programs .container-texts {
    color: white;
    line-height: 1.5;
    display: flex;
    flex-direction: column;
    align-items: flex-start;


}

.programs .title-2 {
    width: 75%;
    line-height: 1.25;
    letter-spacing: 1rem;
}

.programs .container-texts .button {
    margin-top: 25px;
}

.title-title {
    text-decoration:underline ;
}

.programs .container-texts p {
    flex-grow: 1;
}

.programs .container-image {
    display: flex;
    flex-wrap: wrap;
    gap: 25px;
}

.programs .container-image li {
    border-radius: 15px;

    width: calc(50% - 25px /2);
    height: 130px;
    padding: 20px;
}

.programs .container-image li img {
    width: 100%;
    height: 100%;
    object-fit:cover
}

.flux .container-texts {
    color: #fcf8f5;
}