<nav>
<a href="index.php?page=index" class="nav-link" style="color: darkgreen; font-weight: bold;">Startseite</a>

  <div class="dropdown">
    <a href="#" class="dropbtn">Über uns <i class="fa fa-caret-down"></i></a>
    <div class="dropdown-content">
      <a href="index.php?page=portfolio">Portfolio</a>
      <a href="index.php?page=blog">Blog</a>
      <a href="index.php?page=about">Das sind wir</a>
    </div>
  </div>

  <a href="index.php?page=restaurant">Unser Restaurant</a>
  <a href="index.php?page=speisekarte">Speisekarte</a>
  <a href="index.php?page=tischreservierung">Tischreservierung</a>
</nav>

<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>