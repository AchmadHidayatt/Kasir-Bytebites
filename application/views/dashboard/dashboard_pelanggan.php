
    <!-- Sidebar -->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="<?= base_url() ?>assets/#">
                <img src="<?= base_url() ?>assets/images/icon/bytebites.png" alt="Logo" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
    <ul class="list-unstyled navbar__list">
        <!-- Dashboard -->
        <li class="active has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li class="active has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-home"></i> Promo
            </a>
        </li>
        <!-- Menu -->
        <li class="treeview">
                    <a href="#" onclick="toggleDropdown(event)">
                        <i class="fa fa-archive"></i> <span>Product</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li><a href="<?=site_url('category')?>"><i class="fa fa-circle-o"></i> Categories</a></li>
                        <li><a href="<?=site_url('unit')?>"><i class="fa fa-circle-o"></i> satuan</a></li>
                        <li><a href="<?=site_url('item')?>"><i class="fa fa-circle-o"></i> Items</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</nav>

        </div>
    </aside>

    <!-- Main Content -->
    <div class="page-container">
        <section class="content p-5">
            <div class="row m-t-25">
                <!-- Card 1 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <div class="text">
                                    <h2>10368</h2>
                                    <span>Members Online</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                                <div class="text">
                                    <h2>388,688</h2>
                                    <span>Items Sold</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                                <div class="text">
                                    <h2>1,086</h2>
                                    <span>This Week</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                                <div class="text">
                                    <h2>$1,060,386</h2>
                                    <span>Total Earnings</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
