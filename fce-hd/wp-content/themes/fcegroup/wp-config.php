<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'fcehd_gdu3a' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'fcehd_7als4' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'rd8f15bvt4' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'mysql7017.xserver.jp' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'II_Vw:%uvU46@gG*r Ux]UkoxEI}d?+~~uT1j-oZKNV:aI}/w_l6V~WBO^ B/9cO' );
define( 'SECURE_AUTH_KEY',  '%UA pm*XzA(S6}_y#N75$K2&[Eyf (7zCkH G2n,L#yD`I,@,~tdNXuC{lJn3~7*' );
define( 'LOGGED_IN_KEY',    ';^{,Iq{WE]PyD]S6UU~X}=C[Jl10k+HfpoyTKYx+NF4vuG)zh sY8`#tWn!/])_6' );
define( 'NONCE_KEY',        'S%1xLw:fGe%U#qNm$?g^.8WZ7_FaGz^bEK~Z+$?,{Q@tAThToZ4ZN_&9U:-R))R>' );
define( 'AUTH_SALT',        '-r2Y&8t_=GLKfn/[3C+Q$I@ejB}YTHEtvt([[f*m7-&AU@V7M[]8/FWK&6NZzop]' );
define( 'SECURE_AUTH_SALT', 'N-;S-ELGy!$d;69hrYeBgK@U7wnC@Io-<(c|rm]e.!pj.,cXo+~>V@?+NQ$3MUB^' );
define( 'LOGGED_IN_SALT',   '{BLovEz<W.Z?VI-W/;2YG1L2uSd~T}mv!yr2j+Z0DYpf0k80TeY+=XbAEi>$>b^{' );
define( 'NONCE_SALT',       ':vuPGBcCL]*RKgajDGm&PICjE)|m/Jr!+@i|N8Kow<O4`,CZ1`y*_?D}E<#@k)k{' );
define( 'WP_CACHE_KEY_SALT','C1[r{TA=K0rn}W@L%P]amXZQ2,7k%2AFLeD}*^nx ,~u*MFmnn)r9>-SFM=}q}=u' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
