@vite(['resources/css/app.css', 'resources/js/app.js'])

<header>
    <div class="header-title">
        Master Data
    </div>
</header>
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/master_data/food_menu">Food Menu</a></li>
        <li><a href="">Food Type</a></li>
        <li><a href="">Food Discount</a></li>
        <li><a href="">Help</a></li>
    </ul>
</nav>
<section class="wrapper">
    @yield('App')
</section>
