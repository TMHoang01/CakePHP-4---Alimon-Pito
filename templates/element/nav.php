<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <a href="#" class="navbar-brand">Logo</a>
    <ul class="navbar-nav">
        <?php foreach ($menus as $key => $menu) : ?>
            <?php if(empty($menu->submenus)) : ?>
                <li class="nav-item">
                    <a href="#" class="nav-link"><?= $menu->name ?></a>
                </li>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?= $menu->name; ?>
                    </a>
                    <div class="dropdown-menu">
                        <?php foreach ($menu->submenus as $key => $submenu) : ?>
                            <a class="dropdown-item" href="#"><?= $submenu->name ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>

            <?php endif; ?>


        <?php endforeach; ?>
    </ul>
</nav>



<nav class="navbar navbar-expand-lg navbar-light ">

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

            <li class="nav-item active">
                <a class="nav-link" href=<?= $this->Url->build(['controller' => 'blogs', 'action' => 'home']) ?>>Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=<?= $this->Url->build(['controller' => 'blogs', 'action' => 'about']) ?>>About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=<?= $this->Url->build(['controller' => 'blogs', 'action' => 'contact']) ?>>Contact</a>
            </li>
        </ul>
    </div>

</nav>
