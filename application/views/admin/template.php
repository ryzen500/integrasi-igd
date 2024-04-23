<?php $this->load->view('admin/template/header');?>
<div id="wrapper">
    <?php $this->load->view('admin/template/sidebar');?>
    <?php echo $contents; ?>
</div>
<?php $this->load->view('admin/template/logout');?>
<?php $this->load->view('admin/template/footer');?>