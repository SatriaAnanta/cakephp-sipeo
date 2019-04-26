<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder'). DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';
if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li>
        <a href="<?php echo $this->Url->build('/pelajar'); ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/pelajar/profil'); ?>">
            <i class="fa fa-user"></i> <span>Profil</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/pelajar/materi'); ?>">
            <i class="fa fa-book"></i> <span>Materi</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/pelajar/soal'); ?>">
            <i class="fa fa-pencil"></i> <span>Kerjakan Esai</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/pelajar/sejarah'); ?>">
            <i class="fa fa-check"></i> <span>Sejarah Pengerjaan</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/pelajar/password'); ?>">
            <i class="fa fa-gear"></i> <span>Ganti Password</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
</ul>
<?php } ?>
