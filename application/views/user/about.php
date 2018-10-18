<?php $this->load->view('header_footer/header'); 
		$sessData=$this->session->userdata('logged_in');
?>

<div class="container-fluid" style="padding-left: 8%;padding-right:  8%; padding-top: 1%">
	
		<section style="background-image: url('<?=base_url()?>img/backgro.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100% ">
	      <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
	      <div style="height: 430px;">
	      	<nav class="navbar navbar-expand-md fixed-top" style="background-color: #FF000000; color: #FFFFFE;"> <!--  ff000000 -->
				<div class="collapse navbar-collapse" id="navbarCollapse">	
				</div>
			</nav>
	      	<center>
	      		<br><br>
				<div style="font-size: 48px;font-weight: bold; color: #ffffff">Forum Diskusi Terbesar di Indonesia</div>
				<img style="margin-top:-220px" src="<?=base_url()?>img/P.png" width="184" height="90">
				<div style="font-size: 48px;font-weight: bold; color: #ffffff;margin-top: -50px">Terima Kasih Telah Bergabung</div>
						<br>
			      		<?php echo form_open('Helpmy/search');?>
							  	<?php echo validation_errors(); ?>
							  		<input style="width: 500px" type="text" class="form-control" name="srch" placeholder="Cari Pertanyaanmu di sini ..." required>
					            	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
					    <?php echo form_close(); ?>
					    <br>
	      		<br>
			    <div style="font-size: 16px;font-weight: bold; color: #ffffff">Cari di antara jutaan pertanyaan.</div>
	      	</center>
	      </div>
	    </section>
	<div class="jumbotron" style="background-color: #FFFFFE">
		
		Forum ini dibuat untuk mengatasi permasalahan di tempat belajar. Forum ini dibuat oleh Wildan Almubarok untuk memenuhi tugas Akhir matakuliah Website, website ini dibuat berbasiskan pada web framework CodeIgiter. CodeIgniter is an open-source software rapid development web framework, for use in building dynamic web sites with PHP. <br>
		CodeIgniter is loosely based on the popular model–view–controller (MVC) development pattern. While controller classes are a necessary part of development under CodeIgniter, models and views are optional.[3] Codeigniter can be also modified to use Hierarchical Model View Controller (HMVC[4]) which allows developers to maintain modular grouping of Controller, Models and View arranged in a sub-directory format.<br>

		CodeIgniter is most often noted for its speed when compared to other PHP frameworks.[5][6][7] In a critical take on PHP frameworks in general, PHP creator Rasmus Lerdorf spoke at frOSCon in August 2008, noting that he liked CodeIgniter "because it is faster, lighter and the least like a framework."[8]
	</div>
	
	
</div>

<?php $this->load->view('header_footer/footer'); ?>