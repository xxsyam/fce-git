<?php
/**
* 【 WP基本機能関連 】
*  - 基本設定
*/
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

/**
* 【 WP基本機能関連 】
*  - ビジュアルエディタ用CSSを提供
*/
add_editor_style();
add_editor_style('editor-style.css');

/**
* 【 WP基本機能関連 】
*  - 余計なヘッダ要素を削除
*/
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra',3,0);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
* 【 WP基本機能関連 】
*  - 不要なJSを燃やす
*/
function my_delete_local_jquery() {wp_deregister_script('jquery');}
add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );

/**
* 【 WP基本機能関連 】
*  - 記事のHTMLコードを削除
*/
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_content', 'wptexturize' );
function override_mce_options( $init_array ) {
  $init_array['indent']  = true;
  $init_array['wpautop'] = false;
  return $init_array;
}
add_filter( 'tiny_mce_before_init', 'override_mce_options' );

/**
* 【 WP基本機能関連 】
*  - 不要なCSSを燃やす
*/
add_action( 'wp_enqueue_scripts', 'remove_block_library_style' );
function remove_block_library_style() {
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
}


/**
* * 【 WP基本機能関連 】
*  - スラッグの日本語禁止
*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
$slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
}
return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );

/**
* 【 WP基本機能関連 】
*  - 管理画面絵文字無効化
*/
add_filter( 'embed_oembed_discover', '__return_false' );
remove_action( 'parse_query', 'wp_oembed_parse_query' );
remove_action( 'wp_head', 'wp_oembed_remove_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_remove_host_js' );
remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

/**
* 【 WP基本機能関連 】
*  - oembed / Embeds無効化
*/
function disable_emoji()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');

/**
* 【 WP基本機能関連 】
*  - 寄稿者 (contributor) であれば管理画面にアクセスできないようにする
*/
function contributor_redirect( $user_id ) {
  $user = get_userdata( $user_id );
  if ( ! $user->has_cap( 'publish_posts' ) ) {
    wp_redirect( home_url() );
    exit();
  }
}
add_action( 'auth_redirect', 'contributor_redirect' );

/**
* 【 WP基本機能関連 】
*  - メディアを追加で挿入されるimgタグから不要な属性を削除
*/
add_filter('image_send_to_editor', 'remove_image_attribute', 10);
add_filter('post_thumbnail_html', 'remove_image_attribute', 10);
function remove_image_attribute($html){
  $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
  $html = preg_replace('/class=[\'"]([^\'"]+)[\'"]/i', '', $html);
  $html = preg_replace('/title=[\'"]([^\'"]+)[\'"]/i', '', $html);
  $html = preg_replace('/<a href=".+">/', '', $html);
  $html = preg_replace('/<\/a>/', '', $html);
  return $html;
}

/**
* 【 WP基本機能関連 】
*  - titleタグを整形 ＊ head タグ内にはtitleを書かないでこれをfunctionに記述しておく。
*/
//add_theme_support( 'title-tag' );

/**
* 【 WP基本機能関連 】
*  - 絶対パス->相対パスに変更
*/
/**class relative_URI {
  public function __construct() {
    add_action('get_header', array(&$this, 'get_header'), 1);
    add_action('wp_footer', array(&$this, 'wp_footer'), 99999);
  }
  protected function replace_relative_URI($content) {
    $home_url = trailingslashit(get_home_url('/'));
    $top_url = preg_replace( '/^(https?:\/\/.+?)\/(.*)$/', '$1', $home_url );
    return str_replace( $top_url, '', $content );
  }
  public function get_header(){
    ob_start(array(&$this, 'replace_relative_URI'));
  }
  public function wp_footer(){
    ob_end_flush();
  }
}
$relative_URI = new relative_URI();*/

/**
* 【 WP基本機能関連 】
*  - スラッグを管理画面に表示
*/
function add_posts_columns($columns) {
  $columns['slug'] = "スラッグ";
  echo '<style>.fixed .column-slug {width: 8%;}</style>';
  return $columns;
}
function add_posts_column_row($column_name, $post_id) {
  if( $column_name == 'slug' ) {
      $post = get_post($post_id);
      $slug = $post->post_name;
      echo esc_attr($slug);
  }
}
add_filter( 'manage_posts_columns', 'add_posts_columns');
add_action( 'manage_posts_custom_column', 'add_posts_column_row', 10, 2);

function add_page_columns($columns) {
  $columns['slug'] = "スラッグ";
  echo '<style>.fixed .column-slug {width: 8%;}</style>';
  return $columns;
}
function add_page_column_row($column_name, $post_id) {
  if( $column_name == 'slug' ) {
      $post = get_post($post_id);
      $slug = $post->post_name;
      echo esc_attr($slug);
  }
}
add_filter( 'manage_pages_columns', 'add_page_columns');
add_action( 'manage_pages_custom_column', 'add_page_column_row', 10, 2);

/**
* 【 WP基本機能関連 】
*  - 固定ページにカテゴリ追加
*/
add_action( 'init', 'add_categories_for_pages' ) ;
function add_categories_for_pages(){
  register_taxonomy_for_object_type( 'category', 'page' ) ;
}
add_action( 'pre_get_posts', 'nobita_merge_page_categories_at_category_archive' ) ;
function nobita_merge_page_categories_at_category_archive( $query ){
  if ( $query->is_category== true && $query->is_main_query()){
    $query->set( 'post_type', array( 'post', 'page', 'nav_menu_item' )) ;
  }
}

/**
* 【 WP基本機能関連 】
*  - カテゴリーアーカイブに固定ページを含める
*/
function add_page_to_category_archive( $query ) {
  if ( $query->is_category== true && $query->is_main_query() ) {
    $query->set('post_type', array( 'post', 'page' ));
  }
}
add_action( 'pre_get_posts', 'add_page_to_category_archive' );

/**
* 【 WP基本機能関連 】
*  - 固定ページでタグを利用
*/
function add_tag_to_page() {
 register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'add_tag_to_page');

function add_tag_to_face() {
 register_taxonomy_for_object_type('post_tag', 'face');
}
add_action('init', 'add_tag_to_face');


/**
* 【 WP基本機能関連 】
*  - タグアーカイブに固定ページを含める
*/
function add_page_to_tag_archive( $obj ) {
  if ( is_tag() ) {
    $obj->query_vars['post_type'] = array( 'post', 'page' );
  }
}
add_action( 'pre_get_posts', 'add_page_to_tag_archive' );

function add_face_to_tag_archive( $obj ) {
  if ( is_tag() ) {
    $obj->query_vars['post_type'] = array( 'post', 'face' );
  }
}
add_action( 'pre_get_posts', 'add_face_to_tag_archive' );

/**
* 【 機能拡張 】
*  - メニュー機能拡張
*/
function register_my_menus() {
  register_nav_menus( array(
  //'「メニューの位置」の識別子' => 'メニューの説明の文字列',
    'main-menu'  => 'ヘッダメニュー',
    'footer-menu_a'  => 'Footer：A',
    'footer-menu_b'  => 'Footer：B',
    'footer-menu_c'  => 'Footer：C',
  ) );
}
add_action( 'after_setup_theme', 'register_my_menus' );

/**
* 【 機能拡張 】
*  - サイドバーでウィジェットが使えるように有効化
*/
function widgetarea_init() {
register_sidebar(array(
    'name'=>'サイドバー',
    'id' => 'side-widget',
    'before_widget'=>'<div id="%1$s" class="%2$s sidebar-wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar-title">',
    'after_title' => '</h4>'
    ));
}
add_action( 'widgets_init', 'widgetarea_init' );

function widgetarea_init2() {
register_sidebar(array(
    'name'=>'トップページ',
    'id' => 'home-widget',
    'before_widget'=>'<div id="%1$s" class="%2$s sidebar-wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar-title">',
    'after_title' => '</h4>'
    ));
}
add_action( 'widgets_init', 'widgetarea_init2' );
/**
* 【 機能拡張 】
*  - 固定ページでショートコードを使う。
*  - [sample_text] <- をページ内に記載でfunctionを返す。
*/
function my_shortcode() {
  return '<p>実例サンプル</p>';
}
add_shortcode( 'sample_text', 'my_shortcode' );

/**
* 【 機能拡張 】
*  - 固定ページでPHPファイルを呼び出せるようにする。
*  - [myphp file='my-template'] <- my-template.php を呼び出す。
*/
function my_php_Include($params = array()) {
 extract(shortcode_atts(array('file' => 'default'), $params));
 ob_start();
 include(STYLESHEETPATH . "/php/$file.php");
 return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');

/**
* 【 機能拡張 】
*  - アップロード・ディレクトリへのパスを取得（固定ページ内）
*  - [uploads]でuploadsまでのパスを取得。
*/
add_shortcode('uploads', 'shortcode_up');
function shortcode_up() {
  $upload_dir = wp_upload_dir();
  return $upload_dir['baseurl'];
}

/**
* 【 機能拡張 】
*  - 固定ページ内にページング機能追加
*
* ▽ループ処理部分に以下を追記 -> * は削除する。
*$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
*$args = array(
*  'post_type' => 'post',
*  'posts_per_page' => 10,
*  'paged' => $paged,
*);
*
* ▽配置したい場所へ以下を記述 -> * は削除する。
* $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages; the_posts_pagination();
*
*/
function my_parse_query( $query ) {
  if(!isset($query->query_vars['paged']) && isset($query->query_vars['page']) ){
    $query->query_vars['paged'] = $query->query_vars['page'];
  }
}
add_action( 'parse_query', 'my_parse_query' );

/**
* 【 機能拡張設定 】
*  - Contact Form 7 の <textarea> にひらがなが含まれなければエラーにする
*/
add_filter('wpcf7_validate_textarea', 'wpcf7_validation_textarea_hiragana', 10, 2);
add_filter('wpcf7_validate_textarea*', 'wpcf7_validation_textarea_hiragana', 10, 2);
function wpcf7_validation_textarea_hiragana($result, $tag){
  $name = $tag['name'];
  $value = (isset($_POST[$name])) ? (string) $_POST[$name] : '';
  if ($value !== '' && !preg_match('/[ぁ-ん]/u', $value)) {
    $result['valid'] = false;
    $result['reason'] = array($name => 'この内容は送信できません。');
  }
  return $result;
}

/**
* 【 機能拡張設定 】
*  - 管理者以外には余計なメニューを表示させない
*/
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
  if( current_user_can( 'author' ) ){ //投稿者用設定
    remove_menu_page( 'index.php' ); //ダッシュボード
    //remove_menu_page( 'edit.php' ); //投稿メニュー
    //remove_menu_page( 'upload.php' ); //メディア
    //remove_menu_page( 'edit.php?post_type=page' ); //固定ページ
    remove_menu_page( 'edit-comments.php' ); //コメントメニュー
    //remove_menu_page( 'themes.php' ); //外観メニュー
    //remove_menu_page( 'plugins.php' ); //プラグインメニュー
    //remove_menu_page( 'tools.php' ); //ツールメニュー
    //remove_menu_page( 'options-general.php' ); //設定メニュー
    remove_menu_page('wpcf7'); //コンタクトフォーム
  }
  if( current_user_can( 'editor' ) ){ //編集者用設定
    remove_menu_page( 'index.php' ); //ダッシュボード
    //remove_menu_page( 'edit.php' ); //投稿メニュー
    //remove_menu_page( 'upload.php' ); //メディア
    //remove_menu_page( 'edit.php?post_type=page' ); //固定ページ
    remove_menu_page( 'edit-comments.php' ); //コメントメニュー
    remove_menu_page( 'themes.php' ); //外観メニュー
    remove_menu_page( 'plugins.php' ); //プラグインメニュー
    remove_menu_page( 'tools.php' ); //ツールメニュー
    remove_menu_page( 'options-general.php' ); //設定メニュー
    remove_menu_page('wpcf7'); //コンタクトフォーム
  }
}

/**
* 【 機能拡張設定 】
*  - 投稿編集画面で不要な項目を非表示にする
*/
function my_remove_meta_boxes() {
  remove_meta_box('postexcerpt','post','normal' );      // 抜粋
  remove_meta_box('trackbacksdiv','post','normal' );    // トラックバック
  //remove_meta_box('slugdiv','post','normal');           // スラッグ
  //remove_meta_box('postcustom','post','normal' );       // カスタムフィールド
  remove_meta_box('commentsdiv','post','normal' );      // コメント
  //remove_meta_box('submitdiv','post','normal' );        // 公開
  //remove_meta_box('categorydiv','post','normal');       // カテゴリー
  remove_meta_box('tagsdiv-post_tag','post','normal' ); // タグ
  remove_meta_box('tagsdiv-post_tag','page','normal' ); // タグ
  remove_meta_box('commentstatusdiv','post','normal' ); // ディスカッション
  remove_meta_box('commentstatusdiv','page','normal' ); // ディスカッション
  remove_meta_box('authordiv','post','normal' );        // 作成者
  remove_meta_box('authordiv','page','normal' );        // 作成者
  remove_meta_box('revisionsdiv','post','normal' );     // リビジョン
  remove_meta_box('revisionsdiv','page','normal' );     // リビジョン
  remove_meta_box('formatdiv','post','normal' );        // フォーマット
  remove_meta_box('pageparentdiv','post','normal' );    // 属性
}
add_action('admin_menu','my_remove_meta_boxes' );


/**
* 【 機能拡張設定 】
*  - SVG画像のデータを読み込ませる
*/
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/**
* 【 機能拡張設定 】
*  -「投稿」->「お知らせ」に変更
*/
function change_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'NEWS';
  $submenu['edit.php'][5][0] = 'NEWS一覧';
  $submenu['edit.php'][10][0] = '新しいNEWS';
  $submenu['edit.php'][16][0] = 'タグ';
}
function change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'NEWS';
  $labels->singular_name = 'NEWS';
  $labels->add_new = _x('追加', 'NEWS');
  $labels->add_new_item = 'NEWSの新規追加';
  $labels->edit_item = 'NEWSの編集';
  $labels->new_item = '新規NEWS';
  $labels->view_item = 'NEWSを表示';
  $labels->search_items = 'NEWSを検索';
  $labels->not_found = '記事が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


/**
* 【 機能拡張設定 】
*  -パンくずリスト
*/
function breadcrumb( $args = array() ){
	global $post;
	$str ='';
	$defaults = array(
		'id' => "breadcrumbs",
		'home' => "トップ",
		'search' => "で検索した結果",
		'tag' => "タグ",
		'author' => "投稿者",
		'notfound' => "404 Not found",
		'separator' => '&nbsp; &raquo; &nbsp;'
	);

	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );
		if( is_home() ) {
		echo  '<ol class="pank"><li>'. $home .'</li></ol>';
		}

		if( !is_home() && !is_admin() ){
			$str.= '<ol class="pank">';
			$str.= '<li><a href="'. home_url() .'/" itemprop="url">'. $home .'</a></li>';
			$my_taxonomy = get_query_var( 'taxonomy' );
			$cpt = get_query_var( 'post_type' );

		if( $my_taxonomy && is_tax( $my_taxonomy ) ) {
			$my_tax = get_queried_object();
			$post_types = get_taxonomy( $my_taxonomy )->object_type;
			$cpt = $post_types[0];
			$str.='<li><a href="' .get_post_type_archive_link( $cpt ).'" itemprop="url">'. get_post_type_object( $cpt )->label.'</a></li>';

		if( $my_tax -> parent != 0 ) {
			$ancestors = array_reverse( get_ancestors( $my_tax -> term_id, $my_tax->taxonomy ) );

			foreach( $ancestors as $ancestor ){
				$str.='<li><a href="'. get_term_link( $ancestor, $my_tax->taxonomy ) .'" itemprop="url">'. get_term( $ancestor, $my_tax->taxonomy )->name .'</a></li>';
			}
		}
			$str.='<li>'. $my_tax -> name . '</li>';
		}

		elseif( is_category() ) {
			$cat = get_queried_object();
			if( $cat -> parent != 0 ){
				$ancestors = array_reverse( get_ancestors( $cat -> cat_ID, 'category' ));
				foreach( $ancestors as $ancestor ){
					$str.='<li><a href="'. get_category_link( $ancestor ) .'" itemprop="url">'. get_cat_name( $ancestor ) .'</a></li>';
				}
			}
			$str.='<li>'. $cat -> name . '</li>';
		}

		elseif( is_post_type_archive() ) {
			$cpt = get_query_var( 'post_type' );
			$str.='<li>'. get_post_type_object( $cpt )->label . '</li>';
		}

		elseif( $cpt && is_singular( $cpt ) ){
			$taxes = get_object_taxonomies( $cpt );
			$mytax = $taxes[1];
//			$str.='<li><a href="' .get_post_type_archive_link( $cpt ).'" itemprop="url">'. get_post_type_object( $cpt )->label.'</a></li>';
			$taxes = get_the_terms( $post->ID, $mytax );
			$tax = get_youngest_tax( $taxes, $mytax );

			$cv_flg = 0;

			foreach( $taxes as $line ){
				if($line -> parent == 39 && $line -> parent !=1){
				$ancestors = array_reverse( get_ancestors(  $line -> term_id, $mytax ) );
				foreach( $ancestors as $ancestor ){

					if ( is_object_in_term($post->ID, '7hseries','7hseries') ){
						$str.='<li><a href="'.home_url().'/7hj_series/" itemprop="url">'. get_term( $ancestor, $mytax )->name . '</a></li>';
						$cv_flg = 1;
					}
					else{
						$str.='<li><a href="'.home_url().'/7hj_series/" itemprop="url">'. get_term( $ancestor, $mytax )->name . '</a></li>';
						$cv_flg = 1;
						//$str.='<li><a href="'. get_term_link( $ancestor, $mytax ).'" itemprop="url">'. get_term( $ancestor, $mytax )->name . '</a></li>';
					}
				}
				}
			}

			/*if( $tax -> parent != 1 ){
				$ancestors = array_reverse( get_ancestors( $tax -> term_id, $mytax ) );


				foreach( $ancestors as $ancestor ){

					if ( is_object_in_term($post->ID, '7hseries','7hseries') ){
						$str.='<li><a href="'.home_url().'/7hj_series/" itemprop="url">'. get_term( $ancestor, $mytax )->name . '</a></li>';
						$cv_flg = 1;
					}
					else{
						$str.='<li><a href="'.home_url().'/7hj_series/" itemprop="url">'. get_term( $ancestor, $mytax )->name . '</a></li>';
						$cv_flg = 1;
						//$str.='<li><a href="'. get_term_link( $ancestor, $mytax ).'" itemprop="url">'. get_term( $ancestor, $mytax )->name . '</a></li>';
					}
				}
			}*/


			if ( is_object_in_term($post->ID, '7hseries','others') ){
				$str.='<li><a href="'.home_url().'/others/" itemprop="url">DVD&amp;Others</a></li>';
				$cv_flg = 1;
			}
			elseif ( is_object_in_term($post->ID, '7hseries','business') ){
				$str.='<li><a href="'.home_url().'/business/" itemprop="url">ビジネス書</a></li>';
				$cv_flg = 1;
			}


			if(!$cv_flg){
				if ( is_object_in_term($post->ID, '7hseries','covies') ){
				$str.='<li><a href="'.home_url().'/covies/" itemprop="url">コヴィー博士の著作</a></li>';
				}
				elseif ( is_object_in_term($post->ID, '7hseries','pick_up') ){
				$str.='<li><a href="'.home_url().'/pick_up/" itemprop="url">おすすめ</a></li>';
				}
			}


			$str.= '<li>'. $post -> post_title .'</li>';
		}

		elseif( is_single() ){
			$categories = get_the_category( $post->ID );
			$cat = get_youngest_cat( $categories );
			if( $cat -> parent != 0 ){
				$ancestors = array_reverse( get_ancestors( $cat -> cat_ID, 'category' ) );
			foreach( $ancestors as $ancestor ){
				$str.='<li><a href="'. get_category_link( $ancestor ).'" itemprop="url">'. get_cat_name( $ancestor ). '</a></li>';
			}
		}
			$str.='<li><a href="'. get_category_link( $cat -> term_id ). '" itemprop="url">'. $cat-> cat_name . '</a></li>';
			$str.= '<li>'. $post -> post_title .'</li>';
        }

		elseif( is_page() ){
			if( $post -> post_parent != 0 ){
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				foreach( $ancestors as $ancestor ){
					$str.='<li><a href="'. get_permalink( $ancestor ).'" itemprop="url">'. get_the_title( $ancestor ) .'</a></li>';
				}
			}
			$str.= '<li>'. $post -> post_title .'</li>';
		}

		elseif( is_date() ){
			if( get_query_var( 'day' ) != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')). '" itemprop="url">' . get_query_var( 'year' ). '年</a></li>';
				$str.='<li><a href="'. get_month_link(get_query_var( 'year' ), get_query_var( 'monthnum' ) ). '" itemprop="url">'. get_query_var( 'monthnum' ) .'月</a></li>';
				$str.='<li>'. get_query_var('day'). '日</li>';
		}

		elseif( get_query_var('monthnum' ) != 0){
			$str.='<li><a href="'. get_year_link( get_query_var('year') ) .'" itemprop="url">'. get_query_var( 'year' ) .'年</a></li>';
			$str.='<li>'. get_query_var( 'monthnum' ). '月</li>';
		}
		else {
			$str.='<li>'. get_query_var( 'year' ) .'年</li>';
		}
		}

		elseif( is_search() ) {
			$str.='<li>「'. get_search_query() .'」'. $search .'</li>';
		}

		elseif( is_author() ){
			$str .='<li>'. $author .' : '. get_the_author_meta('display_name', get_query_var( 'author' )).'</li>';
		}

		elseif( is_tag() ){
			$str.='<li>'. $tag .' : '. single_tag_title( '' , false ). '</li>';
		}

		elseif( is_attachment() ){
			$str.= '<li>'. $post -> post_title .'</li>';
		}

		elseif( is_404() ){
			$str.='<li>'.$notfound.'</li>';
		}

		else{
			$str.='<li>'. wp_title( '', true ) .'</li>';
		}

			$str.='</ol>';
		}
	echo $str;
}

function get_youngest_cat( $categories ){
	global $post;
	if(count( $categories ) == 1 ){
		$youngest = $categories[0];
	}
	else{
		$count = 0;
		foreach( $categories as $category ){
			$children = get_term_children( $category -> term_id, 'category' );
			if($children){
				if ( $count < count( $children ) ){
					$count = count( $children );
					$lot_children = $children;
					foreach( $lot_children as $child ){
						if( in_category( $child, $post -> ID ) ){
							$youngest = get_category( $child );
						}
					}
				}
			}
			else{
				$youngest = $category;
			}
		}
	}
	return $youngest;
}

function get_youngest_tax( $taxes, $mytaxonomy ){
	global $post;
	if( count( $taxes ) == 1 ){
		$youngest = $taxes[ key( $taxes )];
	}
	else{
		$count = 0;
		foreach( $taxes as $tax ){
			$children = get_term_children( $tax -> term_id, $mytaxonomy );
			if($children){
				if ( $count < count($children) ){
					$count = count($children);
					$lot_children = $children;
					foreach($lot_children as $child){
						if( is_object_in_term( $post -> ID, $mytaxonomy ) ){
							$youngest = get_term($child, $mytaxonomy);
						}
					}
				}
			}
			else{
				$youngest = $tax;
			}
		}
	}
	return $youngest;
}

/**
* 【 機能拡張設定 】
*  -ページネーション
*/
function pagination($pages = '', $range = 1)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><ul class=\"pagination-box\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class=\"current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
         echo "</ul></div>\n";
     }
}



/**
* 【 機能拡張設定 】
*  - コンタクトフォームに各種表示追加
*
* ホスト名:[wpcf7.remote_host] (IP: [_remote_ip])
* 参照元:[wpcf7.remote_referer]
* ブラウザ:[wpcf7.remote_ua]
*/

add_filter('wpcf7_special_mail_tags', 'wpcf7_special_mail_tag_for_referer',10,2);
function wpcf7_special_mail_tag_for_referer($output, $name)
{
// Special [wpcf7.remote_referer] tag
if(!isset($re_referer)){ $re_referer = $_SERVER["HTTP_REFERER"]; }
if('wpcf7.remote_referer' == $name){ $output = $re_referer; }
return $output;
}
add_filter('wpcf7_special_mail_tags', 'wpcf7_special_mail_tag_for_remote_ua',10,2);
function wpcf7_special_mail_tag_for_remote_ua($output, $name)
{
// Special [wpcf7.remote_ua] tag
if(!isset($u_agent)){ $u_agent = $_SERVER['HTTP_USER_AGENT']; }
if('wpcf7.remote_ua' == $name){ $output = $u_agent; }
return $output;
}
add_filter('wpcf7_special_mail_tags', 'wpcf7_special_mail_tag_for_remote_host',10,2);
function wpcf7_special_mail_tag_for_remote_host($output, $name)
{
// Special [wpcf7.remote_host] tag
if(!isset($re_addr)){ $re_addr = $_SERVER['REMOTE_ADDR']; }
if('wpcf7.remote_host' == $name){ $output = gethostbyaddr($re_addr); }
return $output;
}

/**
 * 【 機能拡張設定 】
 * カスタムフィールドを検索対象に含めます。(「-キーワード」のようなNOT検索にも対応します)
*/
function posts_search_custom_fields( $orig_search, $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		// 4.4のWP_Query::parse_search()の処理を流用しています。(検索語の分割処理などはすでにquery_vars上にセット済のため省きます)
		global $wpdb;
		$q = $query->query_vars;
		$n = ! empty( $q['exact'] ) ? '' : '%';
		$searchand = '';

		foreach ( $q['search_terms'] as $term ) {
			$include = '-' !== substr( $term, 0, 1 );
			if ( $include ) {
				$like_op  = 'LIKE';
				$andor_op = 'OR';
			} else {
				$like_op  = 'NOT LIKE';
				$andor_op = 'AND';
				$term     = substr( $term, 1 );
			}
			$like = $n . $wpdb->esc_like( $term ) . $n;
			// カスタムフィールド用の検索条件を追加します。
			$search .= $wpdb->prepare( "{$searchand}(($wpdb->posts.post_title $like_op %s) $andor_op ($wpdb->posts.post_content $like_op %s) $andor_op (custom.meta_value $like_op %s))", $like, $like, $like );
			$searchand = ' AND ';
		}
		if ( ! empty( $search ) ) {
			$search = " AND ({$search}) ";
			if ( ! is_user_logged_in() )
				$search .= " AND ($wpdb->posts.post_password = '') ";
		}
		return $search;
	}
	else {
		return $orig_search;
	}
}
add_filter( 'posts_search', 'posts_search_custom_fields', 10, 2 );

/**
 * 【 機能拡張設定 】
 * カスタムフィールド検索用のJOINを行います。
*/
function posts_join_custom_fields( $join, $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		// group_concat()したmeta_valueをJOINすることでレコードの重複を除きつつ検索しやすくします。
		global $wpdb;
		$join .= " INNER JOIN ( ";
		$join .= " SELECT post_id, group_concat( meta_value separator ' ') AS meta_value FROM $wpdb->postmeta ";
		// $join .= " WHERE meta_key IN ( 'test' ) ";
		$join .= " GROUP BY post_id ";
		$join .= " ) AS custom ON ($wpdb->posts.ID = custom.post_id) ";
	}
	return $join;
}
add_filter( 'posts_join', 'posts_join_custom_fields', 10, 2 );


// カスタムフィールド追加
function custom_posts_column( $column_name, $post_id ) {
  if ( $column_name == 'flg_demae' || $column_name == 'demae_type') {
    $cf_flg_demae = get_post_meta( $post_id, $column_name, true );
	if(is_array($cf_flg_demae)){
		foreach($cf_flg_demae as $key=>$value){
			echo $value." ";
		}
	}else{
		echo ( $cf_flg_demae ) ? $cf_flg_demae : '－';
	}
  }
}
add_action( 'manage_posts_custom_column', 'custom_posts_column', 10, 2 );


?>
