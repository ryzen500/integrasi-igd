<?php $this->load->view('teknisi/template/header');?>
<div id="wrapper">
    <?php $this->load->view('teknisi/template/sidebar');?>
    
    <?php echo $contents; ?> 
</div>
<?php $this->load->view('teknisi/template/logout');?>
<?php $this->load->view('teknisi/template/footer');?>