<?php
    header('Content-type: text/css; charset:UTF-8');
?>

* {
    box-sizing: border-box;
    font-family: 'Gloock', serif;
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
    color: #fcf8f5;
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

@media (max-width: 500px) {
    .cover {
        flex-direction: column;
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
}

.cover-text {
    padding-right: 100px;
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
    color: white;
    border-radius: 20px;
    padding: 10px 20px;
    display: inline-block;
}

.button-orange {
    background: linear-gradient(90deg, #ff3592, #ffb800 50% 100%);
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
    background-color: black;
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
    background: linear-gradient(180deg, #202020 0% 50%, white 50% 100%);
}

.online .online-content {
    display: flex;
    padding: 75px 50px 50px;
    background: linear-gradient(90deg, #ff3592,#ffb800);
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
