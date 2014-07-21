<?php  if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

function register_widget()
{
	$arrayWidget = array(
                    'recent_post' => array(
                            'name' => 'Recent Post',
                            'desc' => 'Description recent post'
                        ),
                    'recent_page' => array(
                            'name' => 'Recent Page',
                            'desc' => 'Description Recent Post'
                        )
                    ,
                    'text_widget' => array(
                            'name' => 'Text Widget',
                            'desc' => 'Widget Dengan Text'
                        )
                );
	return $arrayWidget;
}

function register_widget_tags()
{
	$widget_tags = array(
			'before_widget' => '<div id="%d_%s" class="sidebar-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		);
	return $widget_tags;
}

function get_widget( $name )
{
	$instance = &get_instance();
	$instance->load->model( 'widget_model' );

	if( $instance->widget_model->all( $name )->num_rows()=='NULL' ){
		return;
	} else {
		$widgets = $instance->widget_model->all( $name )->result();

		$register_widget_key = array_keys(register_widget());
		
		ob_start();
		
		foreach ( $widgets as $widget ) {
			if( in_array( $widget->widget_name, $register_widget_key ) ){
				$widget_id = $widget->widget_id;
				$widget_name = $widget->widget_name;
				$widget_data = $widget->widget_data;

				call_user_func( $widget_name, $widget_id, $widget_name, $widget_data );
			}
		}

		return ob_get_contents();
	}
}

function recent_post( $widget_id, $widget_name, $widget_data )
{
	$widget_tags = register_widget_tags();

	$instance = &get_instance();
	$instance->load->model( 'artikel_model' );

	$recalculating = preg_replace( '!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $widget_data );
	$serializeData = unserialize( $recalculating );

	echo sprintf( $widget_tags['before_widget'], $widget_id, $widget_name );

		echo $widget_tags['before_title'];

			echo $serializeData['widget_title'];

		echo $widget_tags['after_title'];

		// put some code here

		$recent_posts = $instance->artikel_model->all_limit( $serializeData['widget_limit_post'], 0 );
		if( $recent_posts->num_rows() > 1 ) {
			echo "<ul>";
			
			foreach ( $recent_posts->result() as $recent_post ) {
				if( "1" == $serializeData['widget_show_date'] ){
					$string = $recent_post->tanggal;
	                $dt = explode("-", $string);
	                $a = explode(" ", $dt[2]);
	                $post_date = $a[0].'/'.$dt[1].'/'.$dt[0];
					
					echo '<li>' . anchor( base_url('artikel/show/'.$recent_post->artikel_id.'/'.url_title($recent_post->judul)), $recent_post->judul . '<span class="post-date">' . $post_date . '</span>' ) . '</li>';
				} else {
					echo '<li>' . anchor( base_url('artikel/show/'.$recent_post->artikel_id.'/'.url_title($recent_post->judul)), $recent_post->judul ) . '</li>';
				}
			}

			echo "</ul>";
		}

	echo $widget_tags['after_widget'];
}

function recent_post_form($data)
{
	if (!empty($data)) {
		$jd_widget = $data['widget_title'];
		$count_post = $data['widget_limit_post'];
		$show_date = $data['widget_show_date'];
		$ps_widget = $data['widget_position'];
		$sort_widget = $data['widget_sort'];
	} else {
		$jd_widget = '';
		$count_post = 5;
		$show_date = 1;
		$ps_widget = '';
		$sort_widget = 0;
	}

	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<label>Judul Widget</label>' . "\n";
	echo "\t\t" . '<input type="text" name="jd_widget" class="form-control" value="'.$jd_widget.'">' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<label>Jumlah Artikel</label>' . "\n";
	echo "\t\t" . '<input type="text" name="count_post" class="form-control" value="'.$count_post.'">' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<label><input type="checkbox" name="show_date" value="'.$show_date.'"> Tampilkan Tanggal</label>' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<div class="row">' . "\n";
	echo "\t\t\t" . '<div class="col-xs-12 col-sm-12 col-md-6">' . "\n";
	echo "\t\t\t\t" . '<label>Posisi Widget</label>' . "\n";
	echo "\t\t\t\t" . '<select name="ps_widget" class="form-control">' . "\n";

	if ($ps_widget == 'widget1') {
		echo "\t\t\t\t\t" . '<option value="widget1" selected="selected">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2">Widget 2</option>' . "\n";
	} else if ($ps_widget == 'widget2') {
		echo "\t\t\t\t\t" . '<option value="widget1">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2" selected="selected">Widget 2</option>' . "\n";
	} else {
		echo "\t\t\t\t\t" . '<option value="widget1">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2">Widget 2</option>' . "\n";
	}

	echo "\t\t\t\t" . '</select>' . "\n";
	echo "\t\t\t" . '</div>' . "\n";
	echo "\t\t" . '</div>' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<div class="row">' . "\n";
	echo "\t\t\t" . '<div class="col-xs-12 col-sm-12 col-md-6">' . "\n";
	echo "\t\t\t\t" . '<label>Urutan</label>' . "\n";
	echo "\t\t\t\t" . '<input type="text" name="sort_widget" class="form-control" value="'.$sort_widget.'">' . "\n";
	echo "\t\t\t" . '</div>' . "\n";
	echo "\t\t" . '</div>' . "\n";
	echo "\t" . '</div>' . "\n";
}

function recent_page( $widget_id, $widget_name, $widget_data )
{
	$widget_tags = register_widget_tags();

	$instance = &get_instance();
	$instance->load->model( 'halaman_model' );

	$recalculating = preg_replace( '!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $widget_data );
	$serializeData = unserialize( $recalculating );
	
	echo sprintf( $widget_tags['before_widget'], $widget_id, $widget_name );

		echo $widget_tags['before_title'];

			echo $serializeData['widget_title'];

		echo $widget_tags['after_title'];

		// put some code here

		$recent_pages = $instance->halaman_model->all_limit( $serializeData['widget_limit_page'], 0 );
		if( $recent_pages->num_rows() > 1 ) {
			echo "<ul>";

			foreach ($recent_pages->result() as $recent_page) {
				echo "<li>" . anchor( base_url( 'halaman/index/'.$recent_page->halaman_id.'/'.url_title( $recent_page->judul ) ), $recent_page->judul ) . "</li>";
			}

			echo "</ul>";
		}

	echo $widget_tags['after_widget'];
}

function recent_page_form($data)
{
	if (!empty($data)) {
		$jd_widget = $data['widget_title'];
		$count_page = $data['widget_limit_post'];
		$ps_widget = $data['widget_position'];
		$sort_widget = $data['widget_sort'];
	} else {
		$jd_widget = '';
		$count_page = 5;
		$ps_widget = '';
		$sort_widget = 0;
	}
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<label>Judul Widget</label>' . "\n";
	echo "\t\t" . '<input type="text" name="jd_widget" class="form-control" value="'.$jd_widget.'">' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<label>Jumlah Halaman</label>' . "\n";
	echo "\t\t" . '<input type="text" name="count_page" class="form-control" value="'.$count_page.'">' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<div class="row">' . "\n";
	echo "\t\t\t" . '<div class="col-xs-12 col-sm-12 col-md-6">' . "\n";
	echo "\t\t\t\t" . '<label>Posisi Widget</label>' . "\n";
	echo "\t\t\t\t" . '<select name="ps_widget" class="form-control">' . "\n";

	if ($ps_widget == 'widget1') {
		echo "\t\t\t\t\t" . '<option value="widget1" selected="selected">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2">Widget 2</option>' . "\n";
	} else if ($ps_widget == 'widget2') {
		echo "\t\t\t\t\t" . '<option value="widget1">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2" selected="selected">Widget 2</option>' . "\n";
	} else {
		echo "\t\t\t\t\t" . '<option value="widget1">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2">Widget 2</option>' . "\n";
	}

	echo "\t\t\t\t" . '</select>' . "\n";
	echo "\t\t\t" . '</div>' . "\n";
	echo "\t\t" . '</div>' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<div class="row">' . "\n";
	echo "\t\t\t" . '<div class="col-xs-12 col-sm-12 col-md-6">' . "\n";
	echo "\t\t\t\t" . '<label>Urutan</label>' . "\n";
	echo "\t\t\t\t" . '<input type="text" name="sort_widget" class="form-control" value="'.$sort_widget.'">' . "\n";
	echo "\t\t\t" . '</div>' . "\n";
	echo "\t\t" . '</div>' . "\n";
	echo "\t" . '</div>' . "\n";
}


function text_widget( $widget_id, $widget_name, $widget_data )
{
	$widget_tags = register_widget_tags();

	$instance = &get_instance();
	$instance->load->model( 'halaman_model' );

	//$recalculating = preg_replace( '!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $widget_data );
	$serializeData = unserialize( $widget_data );
	
	echo sprintf( $widget_tags['before_widget'], $widget_id, $widget_name );

		echo $widget_tags['before_title'];

			echo $serializeData['widget_title'];

		echo $widget_tags['after_title'];

		// put some code here
		echo $serializeData['widget_content'];

	echo $widget_tags['after_widget'];
}

function text_widget_form($data)
{
	if (!empty($data)) {
		$jd_widget = $data['widget_title'];
		$ps_widget = $data['widget_position'];
		$sort_widget = $data['widget_sort'];
		$content = $data['widget_content'];
	} else {
		$jd_widget = '';
		$ps_widget = '';
		$sort_widget = 0;
		$content = '';		
	}
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<label>Judul Widget</label>' . "\n";
	echo "\t\t" . '<input type="text" name="jd_widget" class="form-control" value="'.$jd_widget.'">' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<textarea id="editor2" class="form-control" name="content"rows="10">'.$content.'</textarea>' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<div class="row">' . "\n";
	echo "\t\t\t" . '<div class="col-xs-12 col-sm-12 col-md-6">' . "\n";
	echo "\t\t\t\t" . '<label>Posisi Widget</label>' . "\n";
	echo "\t\t\t\t" . '<select name="ps_widget" class="form-control">' . "\n";

	if ($ps_widget == 'widget1') {
		echo "\t\t\t\t\t" . '<option value="widget1" selected="selected">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2">Widget 2</option>' . "\n";
	} else if ($ps_widget == 'widget2') {
		echo "\t\t\t\t\t" . '<option value="widget1">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2" selected="selected">Widget 2</option>' . "\n";
	} else {
		echo "\t\t\t\t\t" . '<option value="widget1">Widget 1</option>' . "\n";
		echo "\t\t\t\t\t" . '<option value="widget2">Widget 2</option>' . "\n";
	}

	echo "\t\t\t\t" . '</select>' . "\n";
	echo "\t\t\t" . '</div>' . "\n";
	echo "\t\t" . '</div>' . "\n";
	echo "\t" . '</div>' . "\n";
	echo "\t" . '<div class="form-group">' . "\n";
	echo "\t\t" . '<div class="row">' . "\n";
	echo "\t\t\t" . '<div class="col-xs-12 col-sm-12 col-md-6">' . "\n";
	echo "\t\t\t\t" . '<label>Urutan</label>' . "\n";
	echo "\t\t\t\t" . '<input type="text" name="sort_widget" class="form-control" value="'.$sort_widget.'">' . "\n";
	echo "\t\t\t" . '</div>' . "\n";
	echo "\t\t" . '</div>' . "\n";
	echo "\t" . '</div>' . "\n";
}

/* End of file : widget_helper.php */
/* Location : ./application/helpers/widget_helper.php */