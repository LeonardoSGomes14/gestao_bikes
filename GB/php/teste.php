<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu com função onClick</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .menu-icon {
      cursor: pointer;
      position: fixed;
      top: 20px;
      left: 20px;
      z-index: 2;
    }

    .bar1, .bar2, .bar3 {
      width: 35px;
      height: 5px;
      background-color: #333;
      margin: 6px 0;
      transition: 0.4s;
    }

    .menu-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.4s;
    }

    .menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #f4f4f4;
      padding-top: 80px;
      transition: left 0.4s; /* Transição para animar o deslize do menu */
      z-index: 2;
    }

    .menu ul {
      list-style-type: none;
      padding: 0;
    }

    .menu ul li {
      padding: 15px;
    }

    .change .bar1 {
      -webkit-transform: rotate(-45deg) translate(-9px, 6px);
      transform: rotate(-45deg) translate(-9px, 6px);
    }

    .change .bar2 {
      opacity: 0;
    }

    .change .bar3 {
      -webkit-transform: rotate(45deg) translate(-8px, -8px);
      transform: rotate(45deg) translate(-8px, -8px);
    }

    .change-bg {
      z-index: 1;
      opacity: 1;
      pointer-events: auto;
    }

    @media screen and (max-width: 768px) {
      .menu {
        width: 200px;
      }
    }
  </style>
</head>
<body>

<div id="menu-bar" class="menu-icon" onclick="menuOnClick()">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>

<div id="menu-bg" class="menu-bg" onclick="menuOnClick()"></div>

<nav id="nav" class="menu">
  <ul>
    <li><a href="#" style="color: #333;">Página 1</a></li>
    <li><a href="#" style="color: #333;">Página 2</a></li>
    <li><a href="#" style="color: #333;">Página 3</a></li>
    <li><a href="#" style="color: #333;">Página 4</a></li>
  </ul>
</nav>

<script>
  function menuOnClick() {
    document.getElementById("menu-bar").classList.toggle("change");
    document.getElementById("nav").classList.toggle("change");
    document.getElementById("menu-bg").classList.toggle("change-bg");
  }
</script>

</body>
</html>
