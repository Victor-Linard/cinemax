<!-- Map CSS -->
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css"/>

<!-- Libs CSS -->
<link rel="stylesheet" href="./assets/css/libs.bundle.css"/>

<!-- Theme CSS -->
<link rel="stylesheet" href="./assets/css/theme.bundle.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="JSScripts/launchSwal.js"></script>
<script src="node_modules/isotope-layout/dist/isotope.pkgd.js"></script>

<div class="card">
    <div class="card-body">
        <div class="row mb-7">
            <div class="col-12">

                <!-- Nav -->
                <nav class="nav justify-content-center">
                    <div class="filters">
                            <div class="button-group js-radio-button-group" data-filter-group="color">
                                <button class="button" data-filter=""  data-bs-toggle="pill">any</button>
                                <button class="button" data-filter=".yellow"  data-bs-toggle="pill">yellow</button>
                                <button class="button" data-filter=".blue"  data-bs-toggle="pill">blue</button>
                                <button class="button" data-filter=".green"  data-bs-toggle="pill">green</button>
                                <button class="button" data-filter=".purple"  data-bs-toggle="pill">purple</button>
                            </div>

                            <div class="button-group js-radio-button-group" data-filter-group="type">
                                <button class="button" data-filter=""  data-bs-toggle="pill">any</button>
                                <button class="button" data-filter=".object"  data-bs-toggle="pill">object</button>
                                <button class="button" data-filter=".person"  data-bs-toggle="pill">person</button>
                            </div>
                    </div>
                </nav>

            </div>
        </div>
        <div class="row active grid" id="portfolio" data-isotope="{&quot;layoutMode&quot;: &quot;masonry&quot;}" style="position: relative; height: 1048px;">
            <div class="col-12 col-md-4 person purple color-shape" style="position: absolute; left: 0px; top: 0px;">

                <!-- Image -->
                <img class="img-fluid rounded mb-7" src="./assets/img/portfolio/portfolio-1.jpg" alt="..">

            </div>
            <div class="col-12 col-md-4 object color-shape" style="position: absolute; left: 391.984375px; top: 0px;">

                <!-- Image -->
                <img class="img-fluid rounded mb-7" src="./assets/img/portfolio/portfolio-10.jpg" alt="..">

            </div>
            <div class="col-12 col-md-4 yellow person color-shape" style="position: absolute; left: 783.96875px; top: 0px;">

                <!-- Image -->
                <img class="img-fluid rounded mb-7" src="./assets/img/portfolio/portfolio-11.jpg" alt="..">

            </div>
            <div class="col-12 col-md-4 object green color-shape" style="position: absolute; left: 391.984375px; top: 392px;">

                <!-- Image -->
                <img class="img-fluid rounded mb-7" src="./assets/img/portfolio/portfolio-13.jpg" alt="..">

            </div>
            <div class="col-12 col-md-4 object blue color-shape" style="position: absolute; left: 0px; top: 524px;">

                <!-- Image -->
                <img class="img-fluid rounded mb-7" src="./assets/img/portfolio/portfolio-12.jpg" alt="..">

            </div>
            <div class="col-12 col-md-4 person blue color-shape" style="position: absolute; left: 0px; top: 524px;">

                <!-- Image -->
                <img class="img-fluid rounded mb-7" src="./assets/img/portfolio/portfolio-12.jpg" alt="..">

            </div>
        </div>
    </div>
    <div class="card-footer bg-black">
        <code class="highlight html hljs xml">
            <span class="hljs-comment">&lt;!--&nbsp;Nav&nbsp;--&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">nav</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"nav"</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">a</span>&nbsp;<span class="hljs-attr">href</span>=<span class="hljs-string">"#"</span>&nbsp;<span class="hljs-attr">data-bs-toggle</span>=<span class="hljs-string">"pill"</span>&nbsp;<span class="hljs-attr">data-filter</span>=<span class="hljs-string">"*"</span>&nbsp;<span class="hljs-attr">data-bs-target</span>=<span class="hljs-string">"#portfolio"</span>&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;Primary<br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">a</span>&nbsp;<span class="hljs-attr">href</span>=<span class="hljs-string">"#"</span>&nbsp;<span class="hljs-attr">data-bs-toggle</span>=<span class="hljs-string">"pill"</span>&nbsp;<span class="hljs-attr">data-filter</span>=<span class="hljs-string">".product"</span>&nbsp;<span class="hljs-attr">data-bs-target</span>=<span class="hljs-string">"#portfolio"</span>&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;Product<br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">a</span>&nbsp;<span class="hljs-attr">href</span>=<span class="hljs-string">"#"</span>&nbsp;<span class="hljs-attr">data-bs-toggle</span>=<span class="hljs-string">"pill"</span>&nbsp;<span class="hljs-attr">data-filter</span>=<span class="hljs-string">".ux"</span>&nbsp;<span class="hljs-attr">data-bs-target</span>=<span class="hljs-string">"#portfolio"</span>&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;UX<br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">a</span>&nbsp;<span class="hljs-attr">href</span>=<span class="hljs-string">"#"</span>&nbsp;<span class="hljs-attr">data-bs-toggle</span>=<span class="hljs-string">"pill"</span>&nbsp;<span class="hljs-attr">data-filter</span>=<span class="hljs-string">".resources"</span>&nbsp;<span class="hljs-attr">data-bs-target</span>=<span class="hljs-string">"#portfolio"</span>&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;Resources<br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">nav</span>&gt;</span><br><br><span class="hljs-comment">&lt;!--&nbsp;Items&nbsp;--&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">div</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"row"</span>&nbsp;<span class="hljs-attr">id</span>=<span class="hljs-string">"portfolio"</span>&nbsp;<span class="hljs-attr">data-isotope</span>=<span class="hljs-string">'{"layoutMode":&nbsp;"masonry"}'</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">div</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"col-12&nbsp;col-md-4&nbsp;product"</span>&gt;</span><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-comment">&lt;!--&nbsp;Image&nbsp;--&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">img</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"img-fluid&nbsp;rounded&nbsp;mb-7"</span>&nbsp;<span class="hljs-attr">src</span>=<span class="hljs-string">"../assets/img/portfolio/portfolio-1.jpg"</span>&nbsp;<span class="hljs-attr">alt</span>=<span class="hljs-string">".."</span>&gt;</span><br><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">div</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"col-12&nbsp;col-md-4&nbsp;ux"</span>&gt;</span><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-comment">&lt;!--&nbsp;Image&nbsp;--&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">img</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"img-fluid&nbsp;rounded&nbsp;mb-7"</span>&nbsp;<span class="hljs-attr">src</span>=<span class="hljs-string">"../assets/img/portfolio/portfolio-10.jpg"</span>&nbsp;<span class="hljs-attr">alt</span>=<span class="hljs-string">".."</span>&gt;</span><br><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">div</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"col-12&nbsp;col-md-4&nbsp;product"</span>&gt;</span><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-comment">&lt;!--&nbsp;Image&nbsp;--&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">img</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"img-fluid&nbsp;rounded&nbsp;mb-7"</span>&nbsp;<span class="hljs-attr">src</span>=<span class="hljs-string">"../assets/img/portfolio/portfolio-11.jpg"</span>&nbsp;<span class="hljs-attr">alt</span>=<span class="hljs-string">".."</span>&gt;</span><br><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">div</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"col-12&nbsp;col-md-4&nbsp;ux"</span>&gt;</span><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-comment">&lt;!--&nbsp;Image&nbsp;--&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">img</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"img-fluid&nbsp;rounded&nbsp;mb-7"</span>&nbsp;<span class="hljs-attr">src</span>=<span class="hljs-string">"../assets/img/portfolio/portfolio-13.jpg"</span>&nbsp;<span class="hljs-attr">alt</span>=<span class="hljs-string">".."</span>&gt;</span><br><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">div</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"col-12&nbsp;col-md-4&nbsp;resources"</span>&gt;</span><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-comment">&lt;!--&nbsp;Image&nbsp;--&gt;</span><br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="hljs-tag">&lt;<span class="hljs-name">img</span>&nbsp;<span class="hljs-attr">class</span>=<span class="hljs-string">"img-fluid&nbsp;rounded&nbsp;mb-7"</span>&nbsp;<span class="hljs-attr">src</span>=<span class="hljs-string">"../assets/img/portfolio/portfolio-12.jpg"</span>&nbsp;<span class="hljs-attr">alt</span>=<span class="hljs-string">".."</span>&gt;</span><br><br>&nbsp;&nbsp;<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>
        </code>
    </div>
</div>


<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
<!-- Vendor JS -->
<script src="./assets/js/vendor.bundle.js"></script>
<!-- Theme JS -->
<script src="./assets/js/theme.bundle.js"></script>
<!-- Vendor JS -->
<script src="JSScripts/isotope.js"></script>