<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', '' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', '' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9<U36E,^nsk|Y|yp2UZn;cvo}FZ2[U0{YKH!&2zbuA6svYfw[sYhh+m&kqa3=.pD' );
define( 'SECURE_AUTH_KEY',  '2AAEYdD_k=.,_ouIkY())pUU#?zq27WOzhEd$u[Wx.FuuKE/9AX6nF?2sIv95*j=' );
define( 'LOGGED_IN_KEY',    ')joc{4=z8.B^NzQZ2PE`k5RhG#NbONfiQ&RjF2SMf~3a<r.(/H),)*0[%z3VAeF:' );
define( 'NONCE_KEY',        '6]loWM_?E%wVR{a%fc~>]cf5IcdpUyI]xvmfP82`5M_gsBFi4TE76g] Z|@z%nfM' );
define( 'AUTH_SALT',        '61p[C:G:9>CWY_+6Z1Ir??Gy(=YZ3?c+}*JiN_D2xI& 1B.@> rS4TlhcHlZe:;$' );
define( 'SECURE_AUTH_SALT', 'gDoFZbq=z6KmBj65S}(0j[lRl Ve@-.yhK<KGhOQ.-Rn^f3Z|[y@sd[}HGr`U&((' );
define( 'LOGGED_IN_SALT',   '8LBqsC1^vF:w<{O[}$SGq8d29u1qQ>_ReEX{KMb`Fo[qwxh9Q/G?bv==G{WCA<F/' );
define( 'NONCE_SALT',       '^5;WrIem)6/2<G}M`hWj9_X_%PBN_go<CoosabJutK54zY$S?f%nG10om}K`>Xsk' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
