<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->
    <script src="<?php echo base_url() ?>assets2/js/jquery.min.js"></script>	 
    <script src="<?php echo base_url() ?>assets2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/js/jquery.easing.min.js"></script>
	<script src="<?php echo base_url() ?>assets2/js/wow.min.js"></script>
	<script src="<?php echo base_url() ?>assets2/js/jquery.scrollTo.js"></script>
	<script src="<?php echo base_url() ?>assets2/js/jquery.appear.js"></script>
	<script src="<?php echo base_url() ?>assets2/js/stellar.js"></script>
	<script src="<?php echo base_url() ?>assets2/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="<?php echo base_url() ?>assets2/js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url() ?>assets2/js/nivo-lightbox.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/js/custom.js"></script>


	
	<script>
	var modal = document.getElementById('lg'); 
	var modal2 = document.getElementById('rg'); 
			

	window.onclick = function(event) { 
		if (event.target == modal) { 
			modal.style.display = "none"; 
		}else if (event.target == modal2) { 
			modal.style.display = "none"; 
		}
	} 


    $(document).ready(function(){
        $('.add_cart').click(function(){
            var id_medicine = $(this).data("id_medicine");
            var med_name = $(this).data("med_name");
            var  = $(this).data("price");
            var quantity      = $('#' + id_medicine).val();
            $.ajax({
                url : "<?php echo site_url('user/product/add_to_cart');?>",
                method : "POST",
                data : {id_medicine: id_medicine, med_name: med_name, product_price: price, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
 
         
        $('#detail_cart').load("<?php echo site_url('user/product/load_cart');?>");
 
         
        $(document).on('click','.romove_cart',function(){
            var row_id=$(this).attr("id"); 
            $.ajax({
                url : "<?php echo site_url('user/product/delete_cart');?>",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
    });

		
</script>
</body>

</html>