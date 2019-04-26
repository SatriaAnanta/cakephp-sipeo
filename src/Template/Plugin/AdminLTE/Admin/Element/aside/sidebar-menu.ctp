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
        <a href="<?php echo $this->Url->build('/admin'); ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/admin/profil'); ?>">
            <i class="fa fa-user"></i> <span>Profil</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/admin/pengguna'); ?>">
            <i class="fa fa-users"></i> <span>Pengguna</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/admin/topik'); ?>">
            <i class="fa fa-briefcase"></i> <span>Topik</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/admin/materi'); ?>">
            <i class="fa fa-book"></i> <span>Materi</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/admin/pertanyaan'); ?>">
            <i class="fa fa-question"></i> <span>Pertanyaan</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/admin/jawaban'); ?>">
            <i class="fa fa-check"></i> <span>Jawaban</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/admin/password'); ?>">
            <i class="fa fa-gear"></i> <span>Ganti Password</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
</ul>
<?php } ?>
