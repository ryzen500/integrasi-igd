<?php $this->load->view('user/template/header');?>
<div id="wrapper">
    <?php $this->load->view('user/template/sidebar');?>
    
    <?php echo $contents; ?> 
</div>
<?php $this->load->view('user/template/logout');?>
<?php $this->load->view('user/template/footer');?>