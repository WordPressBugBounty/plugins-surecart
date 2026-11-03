<?php

namespace SureCart\Integrations\Elementor\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Saved items header icon widget.
 *
 * Renders the `surecart/saved-items-icon` block, so markup, count and the store-wide switch stay in one place.
 */
class SavedItemsIcon extends \Elementor\Widget_Base {
	/**
	 * Get widget name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'surecart-saved-items-icon';
	}

	/**
	 * Get widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Saved Items Icon', 'surecart' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-heart-o';
	}

	/**
	 * Get the widget keywords.
	 *
	 * @return array
	 */
	public function get_keywords() {
		return array( 'surecart', 'wishlist', 'saved', 'favorites', 'heart', 'header', 'menu' );
	}

	/**
	 * Get the widget categories.
	 *
	 * @return array
	 */
	public function get_categories() {
		return array( 'surecart-elementor-elements' );
	}

	/**
	 * Register the widget controls.
	 *
	 * @return void
	 */
	protected function register_controls() {
		$selector = '{{WRAPPER}} .wp-block-surecart-saved-items-icon';

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Content', 'surecart' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'show_count',
			array(
				'label'        => esc_html__( 'Show Count', 'surecart' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'description'  => esc_html__( 'Hidden while the list is empty.', 'surecart' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			array(
				'label' => esc_html__( 'Icon', 'surecart' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'icon_color',
			array(
				'label'     => esc_html__( 'Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array( $selector => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'icon_hover_color',
			array(
				'label'     => esc_html__( 'Hover Color', 'surecart' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array( $selector . ':hover' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_responsive_control(
			'icon_size',
			array(
				'label'      => esc_html__( 'Size', 'surecart' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem' ),
				'range'      => array(
					'px' => array(
						'min' => 6,
						'max' => 100,
					),
				),
				'selectors'  => array( $selector . ' svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};' ),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget.
	 *
	 * @return void
	 */
	protected function render(): void {
		$settings = $this->get_settings_for_display();
		$attrs    = array( 'show_count' => 'yes' === ( $settings['show_count'] ?? 'yes' ) );

		echo do_blocks( '<!-- wp:surecart/saved-items-icon ' . wp_json_encode( $attrs ) . ' /-->' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
