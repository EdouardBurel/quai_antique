<?php
require_once ('templates/header.php');
?>

<div class="containerMenu">
  <div class="titleMenu">
    <h2>Notre menu</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est fugit inventore officia provident cupiditate nemo eius nesciunt? Delectus incidunt minima tempore modi, adipisci itaque quidem distinctio ipsum, omnis officiis minus.</p>
  </div>
  <div class="listMenu">
    <li data-filter=".Menu">Menu</li>
    <li data-filter=".Starters">Entrées</li>
    <li data-filter=".Main">Plats</li>
    <li data-filter=".Desserts">Desserts</li>
  </div>
  <div class="contentMenu">
    <div class="boxMenu Menu Starters">
      <div class="imageMenu">
        <img src="images/food1.jpg" alt="food1">
      </div>
      <div class="text">
        <h3>French fries</h3>
        <hr>
        <section>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, totam?</section>
        <section>18€</section>
        <article>Catégorie: Entrées</article>
      </div>
    </div>

    <div class="boxMenu Menu Main">
      <div class="imageMenu">
        <img src="images/food4.jpg" alt="food1">
      </div>
      <div class="text">
        <h3>French fries</h3>
        <hr>
        <section>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, totam?</section>
        <section>18€</section>
        <article>Catégorie: Entrées</article>
      </div>
    </div>

    <div class="boxMenu Menu Desserts">
      <div class="imageMenu">
        <img src="images/food5.jpg" alt="food1">
      </div>
      <div class="text">
        <h3>French fries</h3>
        <hr>
        <section>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, totam?</section>
        <section>18€</section>
        <article>Catégorie: Entrées</article>
      </div>
    </div>

    <div class="boxMenu Menu Starters">
      <div class="imageMenu">
        <img src="images/food5.jpg" alt="food1">
      </div>
      <div class="text">
        <h3>French fries</h3>
        <hr>
        <section>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, totam?</section>
        <section>18€</section>
        <article>Catégorie: Entrées</article>
      </div>
    </div>
  </div>

</div>

<script src="main.js"></script>

<!--
<h1>Notre menu</h1>
<section class="menu-container">
<div id="myBtnContainer" class="menu-list">
  <button class="btn active" onclick="filterSelection('all')"> Nos plats</button>
  <button class="btn" onclick="filterSelection('starters')"> Entrées</button>
  <button class="btn" onclick="filterSelection('main')"> Plats</button>
  <button class="btn" onclick="filterSelection('desserts')"> Desserts</button>
</div>

 The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories)
<div class="container_menu">
  <div class="filterDiv starters">
    <div>Entrée 1</div>
    <div>
    <img src="./images/food7.jpg" alt="food" style="display:flex; width:3rem;">
  </div>
  </div>
  <div class="filterDiv starters">Entrée 2</div>

  <div class="filterDiv main">Main 1</div>
  <div class="filterDiv main">Main 2</div>
  <div class="filterDiv desserts">Dessert 1</div>
</div>
</section>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
-->

<?php
require_once('templates/footer.php');
?>