<?php

$data = query("SELECT * FROM fish");

?>

<div class="card">
    <div class="card-header row">
        <!-- SidebarSearch Form -->
        <div class="col"></div>
        <div class="form-inline text-right">
            <div class="input-group">
                <input class="form-control form-control-sidebar" type="text" placeholder="Search" aria-label="Search" aria-describedby="button-search">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="button-search">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-3 row">
        <?php foreach ($data as $item) : ?>
            <div class="col-md-3">
                <div class="card card-widget widget-user-2 shadow-sm">
                    <div class="widget-user-header bg-gradient-dark">
                        <div class="widget-user-image">
                            <img src="image/<?= $item['image'] ?>" class="img-rounded" alt="image bro">
                        </div>
                        <h3 class="widget-user-username"><?= $item['name'] ?></h3>
                        <p class="widget-user-desc">Rp <?= $item['price'] ?></p>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-link">Stok <span class="float-right badge bg-primary"><?= $item['stock'] ?></span></li>
                            <li class="nav-link">Size <span class="float-right badge bg-primary"><?= $item['size'] ?></span></li>
                        </ul>

                        <a href="" class="btn btn-outline-primary w-100">Beli</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>