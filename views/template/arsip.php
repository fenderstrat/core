<div class="news">

	<div class="judul">
		<h2 class="juduls">berita terbaru</h2>
		<div class="clear"></div>
	</div>

	<!-- looping arsip -->
		
	<?php foreach ($artikel as $newArtikel): ?>
		<div class="arsip">
			<div class="arsip-thumb">
				<a href="<?php echo base_url().'artikel/show/'.$newArtikel->artikel_id.'/'.url_title($newArtikel->judul); ?>"><img src="<?php echo base_url().'assets/uploads/'?>images/<?php echo $newArtikel->image; ?>"></a>
			</div>

			<div class="arsip-summary">
				<h3><a href="<?php echo base_url().'artikel/show/'.$newArtikel->artikel_id.'/'.url_title($newArtikel->judul); ?>"><?php echo $newArtikel->judul; ?></a>
					<span class="meta-date">Diterbitkan pada <?php echo $newArtikel->tanggal ?></span>
				</h3>

				<div class="arsip-sum-text">
					<?php echo character_limiter($newArtikel->isi, 470); ?>
				</div>
			</div>

			<div class="clear"></div>

		</div>
	<?php endforeach ?>

	<?php echo $this->pagination->create_links(); ?>
	
</div>