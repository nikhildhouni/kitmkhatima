<?php
class Education_Connect_Setting_Page {
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {
		$this->options = get_option('education_connect_setting_option');
		if ($this->options === false) {
			$this->options = array(
				'enable_subject_post_type'     => true,
				'subject_post_type_description'     => '',
				'enable_event_post_type'       => true,
				'event_post_type_description'       => '',
				'enable_team_post_type'        => true,
				'team_post_type_description'        => '',
				'enable_testimonial_post_type' => true,
				'testimonial_post_type_description' => '',
			);
			update_option('education_connect_setting_option', $this->options, true);
		}
		add_action('admin_menu', array($this, 'education_connect_add_plugin_page'));
		add_action('admin_init', array($this, 'education_connect_page_init'));
	}

	/**
	 * Add options page
	 */
	public function education_connect_add_plugin_page() {
		// This page will be under "Settings"
		add_options_page(
			__('Settings Admin', 'education-connect'),
			__('Education Connect Settings', 'education-connect'),
			'manage_options',
			'education-connect-admin',
			array($this, 'education_connect_create_admin_page')
		);
	}

	/**
	 * Options page callback
	 */
	public function education_connect_create_admin_page() {
		// Set class property
		$options = get_option('education_connect_setting_option');
		if (!empty($options)) {
			$this->options = $options;
		}
		?>
		        <div class="wrap">
		            <h1><?php _e('Education Connect Settings', 'education-connect');?></h1>
		            <form method="post" action="options.php">
		<?php
		// This prints out all hidden setting fields
		settings_fields('education_connect_option_group');
		do_settings_sections('my-setting-admin');
		submit_button();
		?>
		</form>
		        </div>
		<?php
	}

	/**
	 * Register and add settings
	 */
	public function education_connect_page_init() {
		register_setting(
			'education_connect_option_group',
			'education_connect_setting_option',
			array($this, 'education_connect_sanitize')
		);

		add_settings_section(
			'education_connect_settings_id',
			__('EC: Settings', 'education-connect'),
			array($this, 'education_connect_print_section_info'),
			'my-setting-admin'
		);

		add_settings_field(
			'enable_subject_post_type',
			__('Enable Subject Post Type', 'education-connect'),
			array($this, 'enable_subject_post_type_callback'),
			'my-setting-admin',
			'education_connect_settings_id'
		);

		add_settings_field(
			'subject_post_type_description',
			__('Subject Post Type Description', 'education-connect'),
			array($this, 'subject_post_type_description_callback'),
			'my-setting-admin',
			'education_connect_settings_id'
		);

		add_settings_field(
			'enable_event_post_type',
			__('Enable Event Post Type', 'education-connect'),
			array($this, 'enable_event_post_type_callback'),
			'my-setting-admin',
			'education_connect_settings_id'
		);

		add_settings_field(
			'event_post_type_description',
			__('Event Post Type Description', 'education-connect'),
			array($this, 'event_post_type_description_callback'),
			'my-setting-admin',
			'education_connect_settings_id'
		);

		add_settings_field(
			'enable_team_post_type',
			__('Enable Team Post Type', 'education-connect'),
			array($this, 'enable_team_post_type_callback'),
			'my-setting-admin',
			'education_connect_settings_id'
		);

		add_settings_field(
			'team_post_type_description',
			__('Team Post Type Description', 'education-connect'),
			array($this, 'team_post_type_description_callback'),
			'my-setting-admin',
			'education_connect_settings_id'
		);

		add_settings_field(
			'enable_testimonial_post_type',
			__('Enable Testimonial Post Type', 'education-connect'),
			array($this, 'enable_testimonial_post_type_callback'),
			'my-setting-admin',
			'education_connect_settings_id'
		);

		add_settings_field(
			'testimonial_post_type_description',
			__('Testimonial Post Type Description', 'education-connect'),
			array($this, 'testimonial_post_type_description_callback'),
			'my-setting-admin',
			'education_connect_settings_id'
		);

	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public function education_connect_sanitize($input) {
		$new_input = array();

		if (isset($input['enable_subject_post_type'])) {
			$new_input['enable_subject_post_type'] = true;
		}

		if (!empty($input['subject_post_type_description'])) {
			$new_input['subject_post_type_description'] = $input['subject_post_type_description'];
		}

		if (isset($input['enable_event_post_type'])) {
			$new_input['enable_event_post_type'] = true;
		}

		if (!empty($input['event_post_type_description'])) {
			$new_input['event_post_type_description'] = $input['event_post_type_description'];
		}

		if (isset($input['enable_team_post_type'])) {
			$new_input['enable_team_post_type'] = true;
		}

		if (!empty($input['team_post_type_description'])) {
			$new_input['team_post_type_description'] = $input['team_post_type_description'];
		}

		if (isset($input['enable_testimonial_post_type'])) {
			$new_input['enable_testimonial_post_type'] = true;
		}

		if (!empty($input['testimonial_post_type_description'])) {
			$new_input['testimonial_post_type_description'] = $input['testimonial_post_type_description'];
		}

		return $new_input;
	}

	/**
	 * Print the Section text
	 */
	public function education_connect_print_section_info() {
		_e('Please check the checkbox for the Post Types you need:', 'education-connect');
	}

	/**
	 * Get the settings option subject
	 */
	public function enable_subject_post_type_callback() {
		?>
		        <input type="checkbox" id="enable_subject_post_type" name="education_connect_setting_option[enable_subject_post_type]" <?php isset($this->options['enable_subject_post_type'])?checked($this->options['enable_subject_post_type']):'';?>/>
		<?php
	}

	/**
	 * Get the settings option subject
	 */
	public function subject_post_type_description_callback() {
		   $subject_post_type_description = !empty($this->options['subject_post_type_description'])? ($this->options['subject_post_type_description']):' ';
		?>
		        <textarea id="subject_post_type_description" name="education_connect_setting_option[subject_post_type_description]" rows="4" cols="50" ><?php echo esc_html($subject_post_type_description);?></textarea>

		<?php
	}

	/**
	 * Get the settings option subject
	 */
	public function enable_event_post_type_callback() {
		?>
		        <input type="checkbox" id="enable_event_post_type" name="education_connect_setting_option[enable_event_post_type]" <?php isset($this->options['enable_event_post_type'])?checked($this->options['enable_event_post_type']):'';?>/>
		<?php
	}


	/**
	 * Get the settings option subject
	 */
	public function event_post_type_description_callback() {
		   $event_post_type_description = !empty($this->options['event_post_type_description'])? ($this->options['event_post_type_description']):' ';
		?>
		        <textarea id="event_post_type_description" name="education_connect_setting_option[event_post_type_description]" rows="4" cols="50"><?php echo esc_html($event_post_type_description);?></textarea>

		<?php
	}
	/**
	 * Get the settings option subject
	 */
	public function enable_team_post_type_callback() {
		?>
		        <input type="checkbox" id="enable_team_post_type" name="education_connect_setting_option[enable_team_post_type]" <?php isset($this->options['enable_team_post_type'])?checked($this->options['enable_team_post_type']):'';?>/>
		<?php
	}
	
	/**
	 * Get the settings option subject
	 */
	public function team_post_type_description_callback() {
		   $team_post_type_description = !empty($this->options['team_post_type_description'])? ($this->options['team_post_type_description']):'';

		?>
		        <textarea id="team_post_type_description" name="education_connect_setting_option[team_post_type_description]" rows="4" cols="50"><?php //echo esc_html($team_post_type_description);?></textarea>

		<?php
	}
	
	/**
	 * Get the settings option subject
	 */
	public function enable_testimonial_post_type_callback() {
		?>
		        <input type="checkbox" id="enable_testimonial_post_type" name="education_connect_setting_option[enable_testimonial_post_type]" <?php isset($this->options['enable_testimonial_post_type'])?checked($this->options['enable_testimonial_post_type']):'';?>/>
		<?php
	}
	/**
	 * Get the settings option subject
	 */
	public function testimonial_post_type_description_callback() {
		   $testimonial_post_type_description = !empty($this->options['testimonial_post_type_description'])? ($this->options['testimonial_post_type_description']):'';
		   
		?>
		        <textarea id="testimonial_post_type_description" name="education_connect_setting_option[testimonial_post_type_description]" rows="4" cols="50"><?php echo esc_html($testimonial_post_type_description);?></textarea>

		<?php
	}
	

}

if (is_admin()) {
	new Education_Connect_Setting_Page();
}
