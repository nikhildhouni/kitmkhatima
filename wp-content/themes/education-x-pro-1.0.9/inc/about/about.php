<?php
/**
 * About setup
 *
 * @package Education X
 */

if ( ! function_exists( 'education_x_about_setup' ) ) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function education_x_about_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( ' First off, We’d like to extend a warm welcome and thank you for choosing %1$s. %1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. We would like to suggest you to use all our recommend plugins especially Education Connect to get full advantage of this theme. Again, Thanks for using our theme!', 'education-x-pro' ), 'Education X' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'education-x-pro' ),
				'support'         => esc_html__( 'Support', 'education-x-pro' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'education-x-pro' ),
				'demo-content'    => esc_html__( 'Demo Content', 'education-x-pro' ),
				),

			// Quick links.
			'quick_links' => array(
				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'education-x-pro' ),
					'url'  => 'https://thememattic.com/theme/education-x/',
					),
				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'education-x-pro' ),
					'url'  => 'https://thememattic.com/theme-demos/?demo=education-x',
					),
				'documentation_url' => array(
					'text'   => esc_html__( 'View Documentation', 'education-x-pro' ),
					'url'    => 'https://docs.thememattic.com/themes/education-x/',
					'button' => 'primary',
					),
				),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'education-x-pro' ),
					'button_text' => esc_html__( 'View Documentation', 'education-x-pro' ),
					'button_url'  => 'https://docs.thememattic.com/themes/education-x/',
					'button_type' => 'primary',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-admin-generic',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'education-x-pro' ),
					'button_text' => esc_html__( 'Static Front Page', 'education-x-pro' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'education-x-pro' ),
					'button_text' => esc_html__( 'Customize', 'education-x-pro' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'four' => array(
					'title'       => esc_html__( 'Widget Ready', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-admin-settings',
					'description' => esc_html__( 'Education X is widget based Theme. Education X has some pre designed custom additional layout.', 'education-x-pro' ),
					'button_text' => esc_html__( 'View Widgets', 'education-x-pro' ),
					'button_url'  => admin_url( 'widgets.php' ),
					'button_type' => 'secondary',
					),
				'five' => array(
					'title'       => esc_html__( 'Demo Content', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( '%1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'education-x-pro' ), esc_html__( 'One Click Demo Import', 'education-x-pro' ) ),
					'button_text' => esc_html__( 'Demo Content', 'education-x-pro' ),
					'button_url'  => admin_url( 'themes.php?page=education-x-about&tab=demo-content' ),
					'button_type' => 'secondary',
					),
				'six' => array(
					'title'       => esc_html__( 'Theme Preview', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized.', 'education-x-pro' ),
					'button_text' => esc_html__( 'View Demo', 'education-x-pro' ),
					'button_url'  => 'https://thememattic.com/theme-demos/?demo=education-x',
					'button_type' => 'secondary',
					'is_new_tab'  => true,
					),
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'education-x-pro' ),
					'button_text' => esc_html__( 'Contact Support', 'education-x-pro' ),
					'button_url'  => 'https://wordpress.org/support/theme/education-x/',
					'button_type' => 'secondary',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Theme Documentation', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'education-x-pro' ),
					'button_text' => esc_html__( 'View Documentation', 'education-x-pro' ),
					'button_url'  => 'https://docs.thememattic.com/themes/education-x/',
					'button_type' => 'secondary',
					'is_new_tab'  => true,
					),
				'three' => array(
					'title'       => esc_html__( 'Child Theme', 'education-x-pro' ),
					'icon'        => 'dashicons dashicons-admin-tools',
					'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself.', 'education-x-pro' ),
					'button_text' => esc_html__( 'Learn More', 'education-x-pro' ),
					'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
					'button_type' => 'secondary',
					'is_new_tab'  => true,
					),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable Contact Form 7 only if you are using it.', 'education-x-pro' ),
				),

			// Demo content.
			'demo_content' => array(
				'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see Import Demo Data menu under Appearance.', 'education-x-pro' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'education-x-pro' ) . '</a>' ),
				),

			// Upgrade to pro.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'You can upgrade to pro version of the theme for more exciting features.', 'education-x-pro' ),
				'button_text' => esc_html__( 'Upgrade to Pro','education-x-pro' ),
				'button_url'  => 'https://thememattic.com/theme/education-x/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		Education_X_About::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'education_x_about_setup' );
