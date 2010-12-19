</main>

<footer class="fixed my-5">
	<div class="container">
		<div class="text-center">
			<div class="btn-group">
				<a href="https://www.facebook.com/Adiknya.situmorang">
					<i class="fa fa-facebook-square fa-fw fa-2x" aria-hidden="true"></i>
				</a>
				<a href="https://github.com/luhur65">
					<i class="fa fa-github fa-fw fa-2x" aria-hidden="true"></i>
				</a>
				<a href="https://www.instagram.com/dharma_situmorang">
					<i class="fa fa-instagram fa-fw fa-2x" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<p class="mb-0 small creator text-center mt-1 text-dark"> &copy;<?= date('Y'); ?> Made With <i class="fa fa-heart fa-fw text-danger" aria-hidden="true"></i> By
			<a href="https://github.com/luhur65"> Luhur65 </a>
		</p>
	</div>
</footer>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('/vendor/popper/popper.min.js'); ?>"></script>
<script src="<?= base_url('/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('/vendor/sweatalert/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('/vendor/script.js'); ?>"></script>

</body>

<!-- <script>
	$(function(){

		// Mengerjakan Todo 
		$('.btn-kerjakan').on('click',function(e){
			e.preventDefault();

			const kerja = $(this).attr('href');
			
			Swal.fire({
				icon: 'warning',
				title: 'Kerjakan ??',
				text: 'Tuntaskan Pekerjaan Mu Sampai Selesai!',
				showCancelButton: true,
				cancelButtonText: 'Tidak',
				confirmButtonText: 'Ya, Kerjakan!',
				confirmButtonColor: '#3085d6',
    			cancelButtonColor: '#d33'
			}).then((result)=>{
				if (result.value) {
					document.location.href = kerja;
				}
			});
		});

		// Menunda Todo Sementara
		$('.btn-tunda').on('click',function(e){
			e.preventDefault();

			const tunda = $(this).attr('href');
			
			Swal.fire({
				icon: 'warning',
				title: 'Ditunda ??',
				text: 'Ingatlah Untuk Melanjutkannya Besok!',
				showCancelButton: true,
				cancelButtonText: 'Tidak',
				confirmButtonText: 'Ya, Tunda!',
				confirmButtonColor: '#3085d6',
    			cancelButtonColor: '#d33'
			}).then((result)=>{
				if (result.value) {
					document.location.href = tunda;
				}
			});
		});

		// Menyelesaikan Todo
		$('.btn-selesai').on('click', function(e){
			e.preventDefault();
			
			const selesai = $(this).attr('href');
			
			Swal.fire({
				icon: 'question',
				title: 'Selesai ??',
				text: 'Yakin Anda Sudah Menyelesaikan Tugas Ini ??',
				showCancelButton: true,
				cancelButtonText: 'Belum',
				confirmButtonText: 'Selesai!',
				confirmButtonColor: '#3085d6',
    			cancelButtonColor: '#d33'
			}).then((result)=>{
				if (result.value) {
					document.location.href = selesai;
				}
			});
		});
	});

</script> -->

</html>