@vite(['resources/css/app.css', 'resources/js/app.js','resources/js/setTime.js'])

<header>
    <div class="header-title">
        Master Data
    </div>
</header>
<nav>
    <ul>
        <li><a href="/">Dashboard</a></li>
        <li><a href="/master_data/form/food_menu">เพิ่มเมนู</a></li>
        <li><a href="/master_data/form/food_type">เพิ่มประเภทของเมนู</a></li>
        <li><a href="">ตั้งค่าส่วนลด</a></li>
        <li><a href="">Help</a></li>
    </ul>
</nav>
<section class="wrapper">
    @yield('App')
</section>
