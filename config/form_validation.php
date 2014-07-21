<?php
$config = array(
	'login' => array(
		array(
			'field' => 'username', 'label' => 'Username', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'password', 'label' => 'Password', 'rules' => 'required|trim|xss_clean'
		)
	),
	'artikel' => array(
		array(
			'field' => 'jd', 'label' => 'Judul', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'isi', 'label' => 'Isi', 'rules' => 'required|trim|xss_clean'
		),
	),
	'halaman' => array(
		array(
			'field' => 'jd', 'label' => 'Judul', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'isi', 'label' => 'Isi', 'rules' => 'required|trim|xss_clean'
		),
	),
	'kategori' => array(
		array(
			'field' => 'kate', 'label' => 'Nama Kategori', 'rules' => 'required|trim|xss_clean'
		)
	),
	'album' => array(
		array(
			'field' => 'judul', 'label' => 'Judul Album', 'rules' => 'required|trim|xss_clean'
		)
	),
	'menu' => array(
		array(
			'field' => 'menu', 'label' => 'Nama Menu', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'link', 'label' => 'Link', 'rules' => 'required|trim|xss_clean'
		),
	) ,
	'user' => array(
		array(
			'field' => 'username', 'label' => 'Username', 'rules' => 'trim|required'
		),
		array(
			'field' => 'nama', 'label' => 'Nama Lengkap', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|valid_emails'
		),
		array(
			'field' => 'password', 'label' => 'Password', 'rules' => 'trim|required'
		),
		array(
			'field' => 'conf', 'label' => 'Konfirmasi Password', 'rules' => 'trim|required|matches[password]'
		),
	),
	'user_edit' => array(
		array(
			'field' => 'username', 'label' => 'Username', 'rules' => 'trim|required'
		),
		array(
			'field' => 'nama', 'label' => 'Nama Lengkap', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|valid_emails'
		)
	),
	'widget_recent_post' => array(
		array(
			'field' => 'widget_name', 'label' => 'ID Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'jd_widget', 'label' => 'Judul Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'count_post', 'label' => 'Jumlah Artikel', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'show_date', 'label' => 'Tampilkan Tanggal', 'rules' => 'trim|xss_clean'
		),
		array(
			'field' => 'ps_widget', 'label' => 'Posisi Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'sort_widget', 'label' => 'Urutan Widget', 'rules' => 'required|trim|xss_clean'
		)
	),
	'widget_recent_page' => array(
		array(
			'field' => 'widget_name', 'label' => 'ID Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'jd_widget', 'label' => 'Judul Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'count_page', 'label' => 'Jumlah Halaman', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'ps_widget', 'label' => 'Posisi Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'sort_widget', 'label' => 'Urutan Widget', 'rules' => 'required|trim|xss_clean'
		)
	),
	'widget_text' => array(
		array(
			'field' => 'widget_name', 'label' => 'ID Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'jd_widget', 'label' => 'Judul Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'content', 'label' => 'Konten Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'ps_widget', 'label' => 'Posisi Widget', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'sort_widget', 'label' => 'Urutan Widget', 'rules' => 'required|trim|xss_clean'
		)
	),
	'kontak' => array(
		array(
			'field' => 'judul', 'label' => 'Judul Halaman Kontak', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'deskripsi', 'label' => 'Deskipsi Kontak', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'email', 'label' => 'Email Kontak', 'rules' => 'required|valid_emails|valid_email|trim|xss_clean'
		),
		array(
			'field' => 'phone', 'label' => 'Phone', 'rules' => 'required|trim|xss_clean|numeric'
		),
		array(
			'field' => 'logitude', 'label' => 'logitude', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'latitude', 'label' => 'latitude', 'rules' => 'required|trim|xss_clean'
		)
	),
	'seo' => array(
		array(
			'field' => 'title', 'label' => 'title', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'description', 'label' => 'description', 'rules' => 'required|trim|xss_clean'
		),
		array(
			'field' => 'keyword', 'label' => 'keyword', 'rules' => 'required|trim|xss_clean'
		)
	),
);