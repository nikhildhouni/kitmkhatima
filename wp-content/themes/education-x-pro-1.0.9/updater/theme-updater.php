<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if (!class_exists('EDD_Theme_Updater_Admin')) {
	include (dirname(__FILE__).'/theme-updater-admin.php');
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://www.thememattic.com', // Site where EDD is hosted
		'item_name'      => 'Education X Pro', // Name of theme
		'theme_slug'     => 'education-x-pro', // Theme slug
		'version'        => '1.0.7', // The current version of this theme
		'author'         => 'Thememattic', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => 'https://thememattic.com/my-profile/'// Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __('Theme License', 'education-x-pro'),
		'enter-key'                 => __('Enter your theme license key.', 'education-x-pro'),
		'license-key'               => __('License Key', 'education-x-pro'),
		'license-action'            => __('License Action', 'education-x-pro'),
		'deactivate-license'        => __('Deactivate License', 'education-x-pro'),
		'activate-license'          => __('Activate License', 'education-x-pro'),
		'status-unknown'            => __('License status is unknown.', 'education-x-pro'),
		'renew'                     => __('Renew?', 'education-x-pro'),
		'unlimited'                 => __('unlimited', 'education-x-pro'),
		'license-key-is-active'     => __('License key is active.', 'education-x-pro'),
		'expires%s'                 => __('Expires %s.', 'education-x-pro'),
		'%1$s/%2$-sites'            => __('You have %1$s / %2$s sites activated.', 'education-x-pro'),
		'license-key-expired-%s'    => __('License key expired %s.', 'education-x-pro'),
		'license-key-expired'       => __('License key has expired.', 'education-x-pro'),
		'license-keys-do-not-match' => __('License keys do not match.', 'education-x-pro'),
		'license-is-inactive'       => __('License is inactive.', 'education-x-pro'),
		'license-key-is-disabled'   => __('License key is disabled.', 'education-x-pro'),
		'site-is-inactive'          => __('Site is inactive.', 'education-x-pro'),
		'license-status-unknown'    => __('License status is unknown.', 'education-x-pro'),
		'update-notice'             => __("Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'education-x-pro'),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4$s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'education-x-pro')
	)

);
